<?php

namespace App\Domain\Category\Entities;

class Category
{
    public function __construct(
        public ?int $id = null,
        public string $name,
        public string $description,
    ) {}

    //Rich business logic can be added here, such as validation, computed properties, etc.

}
