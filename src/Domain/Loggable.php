<?php
declare(strict_types=1);

namespace Domain;

interface Loggable
{
    public function level(): LogLevel;

    public function message(): string;

    public function params(): array;
}
