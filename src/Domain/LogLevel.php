<?php
declare(strict_types=1);

namespace Domain;

use MyCLabs\Enum\Enum;

/**
 * @method static self EMERGENCY()
 * @method static self ALERT()
 * @method static self CRITICAL()
 * @method static self ERROR()
 * @method static self WARNING()
 * @method static self NOTICE()
 * @method static self INFO()
 * @method static self DEBUG()
 */
final class LogLevel extends Enum
{
    private const EMERGENCY = 'emergency';
    private const ALERT     = 'alert';
    private const CRITICAL  = 'critical';
    private const ERROR     = 'error';
    private const WARNING   = 'warning';
    private const NOTICE    = 'notice';
    private const INFO      = 'info';
    private const DEBUG     = 'debug';
}
