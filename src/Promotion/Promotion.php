<?php

declare(strict_types=1);

namespace Ydg\JdUnionOpenSdk\Promotion;

use Ydg\JdUnionOpenSdk\JdUnionClient;

class Promotion extends JdUnionClient
{
    /**
     * 网站/APP/流量媒体获取推广链接（https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.promotion.common.get）
     *
     * @param array $params
     *
     * @return array|null

     */
    public function commonGet(array $params): ?array
    {
        return $this->handlerGetResult(
            $this->request('jd.union.open.promotion.common.get', ['promotionCodeReq' => $params])
        );
    }

    /**
     * 社交媒体获取推广链接（https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.promotion.bysubunionid.get）
     *
     * @param array $params
     *
     * @return array|null

     */
    public function bySubUnionIdGet(array $params): ?array
    {
        return $this->handlerGetResult(
            $this->request('jd.union.open.promotion.bysubunionid.get', ['promotionCodeReq' => $params])
        );
    }

    /**
     * 工具商获取推广链接（https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.promotion.byunionid.get）
     *
     * @param array $params
     *
     * @return array|null

     */
    public function byUnionIdGet(array $params): ?array
    {
        return $this->handlerGetResult(
            $this->request('jd.union.open.promotion.byunionid.get', ['promotionCodeReq' => $params])
        );
    }
}