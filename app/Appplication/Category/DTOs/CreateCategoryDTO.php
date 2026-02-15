<?php

namespace App\Appplication\Category\DTOs;

class CreateCategoryDTO
{
    public string $name;
    public string $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
