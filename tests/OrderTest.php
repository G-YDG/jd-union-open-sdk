<?php

class OrderTest extends AbstractTest
{
    public function testRowQuery()
    {
        $response = $this->getApp()->order->rowQuery([
            'pageIndex' => 1,
            'pageSize' => 20,
            'type' => 1,
            'startTime' => date('Y-m-d H:i:s', time() - 300),
            'endTime' => date('Y-m-d H:i:s', time()),
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
