<?php

declare(strict_types=1);

namespace Ydg\JdUnionOpenSdk\Order;

use Ydg\JdUnionOpenSdk\JdUnionClient;

class Order extends JdUnionClient
{
    /**
     * 订单行查询接口
     *
     * @param array $params
     *
     * @return array|null
     */
    public function orderRowQuery(array $params): ?array
    {
        return $this->rowQuery($params);
    }

    /**
     * 订单行查询接口（https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.order.row.query）
     *
     * @param array $params
     *
     * @return array|null
     */
    public function rowQuery(array $params): ?array
    {
        return $this->handlerQueryResult(
            $this->request('jd.union.open.order.row.query', ['orderReq' => $params])
        );
    }

    /**
     * 工具商订单行查询接口（https://union.jd.com/openplatform/api/v2?apiName=jd.union.open.order.agent.query）
     *
     * @param array $params
     *
     * @return array|null
     */
    public function agentQuery(array $params): ?array
    {
        return $this->handlerQueryResult(
            $this->request('jd.union.open.order.agent.query', ['orderReq' => $params])
        );
    }
}