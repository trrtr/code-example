<?php
declare(strict_types=1);

namespace Domain\Ticket;

use MyCLabs\Enum\Enum;

/**
 * @method static self AVAILABLE()
 * @method static self RESERVED()
 */
final class TicketStatus extends Enum
{
    private const AVAILABLE = 'available';

    private const RESERVED = 'reserved';
}
