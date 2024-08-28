<?php

declare(strict_types= 1);

namespace App\Models;

class User
{
    public $id;
    public $name;
    public $idade;
    public $email;

    public function __construct(int $id, string $name, int $idade, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->idade = $idade;
        $this->email = $email;
    }
}