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
     *
     * @example params['pageIndex'] [必填]页码
     * @example params['pageSize'] [必填]每页包含条数，上限为500
     * @example params['type'] [必填]订单时间查询类型(1：下单时间，2：完成时间（购买用户确认收货时间），3：更新时间
     * @example params['startTime'] [必填]开始时间 格式yyyy-MM-dd HH:mm:ss，与endTime间隔不超过1小时
     * @example params['endTime'] [必填]结束时间 格式yyyy-MM-dd HH:mm:ss，与startTime间隔不超过1小时
     * @example params['childUnionId'] [非必填]子推客unionID，传入该值可查询子推客的订单，注意不可和key同时传入。（需联系运营开通PID权限才能拿到数据）
     * @example params['key'] [非必填]工具商传入推客的授权key，可帮助该推客查询订单，注意不可和childUnionid同时传入。（需联系运营开通工具商权限才能拿到数据）
     * @example params['fields'] [非必填]支持出参数据筛选，逗号','分隔，目前可用：goodsInfo（商品信息）,categoryInfo(类目信息）
     * @example params['orderId'] [非必填]订单号，当orderId不为空时，其他参数非必填
     */
    public function orderRowQuery(array $params): array
    {
        return $this->handlerQueryResult(
            $this->request('jd.union.open.order.row.query', ['orderReq' => $params])
        );
    }
}