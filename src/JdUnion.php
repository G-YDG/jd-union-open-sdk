<?php

declare(strict_types=1);

namespace Ydg\JdUnionOpenSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property Order\Order $order
 */
class JdUnion extends ServiceContainer
{
    protected $providers = [
        Order\ServiceProvider::class,
    ];
}