<?php

use PHPUnit\Framework\TestCase;
use Ydg\JdUnionOpenSdk\JdUnion;

abstract class AbstractTest extends TestCase
{
    protected static $app;

    public function getApp(): JdUnion
    {
        if (!(self::$app instanceof JdUnion)) {
            self::$app = new JdUnion($this->getConfig());
        }
        return self::$app;
    }

    public function getConfig(): array
    {
        return [
            'app_key' => getenv('APP_KEY'),
            'app_secure' => getenv('APP_SECURE'),
        ];
    }

    public function assertIsSuccessResponse($response)
    {
        $this->assertIsArray($response);
        $this->assertArrayNotHasKey('error_response', $response);
    }
}
