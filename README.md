# jd-union-open-sdk
let php developer easier to access jd union open api

Install the latest version with

```bash
$ composer require ydg/d-union-open-sdk
```

## Basic Usage

```php
<?php

use Ydg\JdUnionOpenSdk\JdUnion;

$app = new JdUnion([
    'app_key' => 'your app_key',
    'app_secure' => 'your app_secure',
]);
$app->order->orderRowQuery([
    'pageIndex' => 1,
    'pageSize' => 20,
    'type' => 1,
    'startTime' => date('Y-m-d H:i:s', time() - 300),
    'endTime' => date('Y-m-d H:i:s', time()),
]);
```