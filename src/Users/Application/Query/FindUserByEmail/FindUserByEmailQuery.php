<?php

namespace App\Users\Application\Query\FindUserByEmail;

use App\Shared\Application\Query\QueryInterface;

readonly class FindUserByEmailQuery implements QueryInterface
{
    public function __construct(public string $email)
    {
    }
}