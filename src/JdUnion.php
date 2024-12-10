<?php

declare(strict_types=1);

namespace Ydg\JdUnionOpenSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property Order\Order $order
 * @property Promotion\Promotion $promotion
 */
class JdUnion extends ServiceContainer
{
    protected $providers = [
        Order\ServiceProvider::class,
        Promotion\ServiceProvider::class,
    ];
}