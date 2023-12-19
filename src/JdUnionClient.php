<?php

declare(strict_types=1);

namespace Ydg\JdUnionOpenSdk;

use Psr\Http\Message\ResponseInterface;
use Ydg\FoudationSdk\FoundationApi;
use Ydg\FoudationSdk\Traits\HasAttributes;

class JdUnionClient extends FoundationApi
{
    use HasAttributes;

    protected $baseUri = 'http://api.jd.com/routerjson';

    public function request($method, $params, $version = '1.0')
    {
        $appConfig = $this->toArray();

        $apiParams['method'] = $method;
        $apiParams['app_key'] = $appConfig['app_key'];
        $apiParams['timestamp'] = date('Y-m-d H:i:s');
        $apiParams['format'] = 'json';
        $apiParams['v'] = $version;
        $apiParams['sign_method'] = 'md5';
        if (isset($appConfig['access_token'])) {
            $apiParams['access_token'] = $appConfig['access_token'];
        }
        $apiParams['360buy_param_json'] = json_encode($params);
        $apiParams['sign'] = $this->sign($apiParams, $appConfig['app_secure']);

        $response = $this->getHttpClient()->request('post', $this->baseUri, ['query' => $apiParams]);

        $responseContent = $this->handleResponse($response);

        if (isset($responseContent['error_response'])) {
            return $responseContent;
        }

        $responseNode = $this->getResponseNode($method);

        return $responseContent[$responseNode] ?? $responseContent;
    }

    /**
     * 获取签名
     *
     * @param array $params
     * @param string $appSecret
     *
     * @return string
     */
    private function sign(array $params, string $appSecret): string
    {
        ksort($params);
        $signString = '';
        foreach ($params as $key => $value) {
            $signString = $signString . $key . $value;
        }
        return strtoupper(md5($appSecret . $signString . $appSecret));
    }

    /**
     * 响应处理
     *
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function handleResponse(ResponseInterface $response): array
    {
        $responseContent = $response->getBody()->getContents();

        return json_decode($responseContent, true);
    }

    /**
     * 获取响应体
     *
     * @param $method
     *
     * @return array|string|string[]
     */
    protected function getResponseNode($method)
    {
        return str_replace(".", "_", $method . "_responce");
    }

    /**
     * 处理查询请求结果
     *
     * @param $result
     *
     * @return array
     */
    protected function handlerQueryResult($result): array
    {
        if (isset($result['error_response'])) {
            return $result;
        }
        return json_decode($result['queryResult'], true);
    }
}