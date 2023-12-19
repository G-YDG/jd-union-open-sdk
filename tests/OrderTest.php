<?php

class OrderTest extends AbstractTest
{
    public function testOrderRowQuery()
    {
        $response = $this->getApp()->order->orderRowQuery([
            'pageIndex' => 1,
            'pageSize' => 20,
            'type' => 1,
            'startTime' => date('Y-m-d H:i:s', time() - 300),
            'endTime' => date('Y-m-d H:i:s', time()),
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
