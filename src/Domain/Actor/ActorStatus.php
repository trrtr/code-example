<?php
declare(strict_types=1);

namespace Domain\Actor;

use MyCLabs\Enum\Enum;

/**
 * @method static self ACTIVE()
 * @method static self RESERVED()
 */
final class ActorStatus extends Enum
{
    private const ACTIVE = 'active';

    private const RESERVED = 'reserved';
}
