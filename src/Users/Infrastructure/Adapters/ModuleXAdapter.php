<?php

namespace App\Users\Infrastructure\Adapters;

use App\ModuleX\Infastructure\API\API;

class ModuleXAdapter
{
    public function __construct(private readonly API $moduleXApi)
    {
    }

    public function getSomeDate(): array
    {
        $this->moduleXApi->getSomeData();
        // mapping

        return [];
    }
}