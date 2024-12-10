<?php

class PromotionTest extends AbstractTest
{
    public function testByUnionIdGet()
    {
        $response = $this->getApp()->promotion->byUnionIdGet([
            'materialId' => 'https://3.cn/29-4adE8',
            'unionId' => '2025193757',
            'subUnionId' => 'open_234979',
            'sceneId' => 1,
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
