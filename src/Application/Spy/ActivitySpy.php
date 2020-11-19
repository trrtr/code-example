<?php
declare(strict_types=1);

namespace App\Spy;

interface ActivitySpy
{
    public function spy(ActivityReport $report): void;
}
