<?php declare(strict_types=1);

namespace App\Contract;

interface Parser
{
    public function parse(string $link): void;
}
