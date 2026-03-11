<?php

namespace App\Domain\Products\Entities;

class Product
{
    private int $id;
    private string $name;
    private int $category_id;
    private float $cost_price;
    private float $sel_price;
    private int $stock;
    private int $min_stock;
    private string $image_path;

    public function __construct(int $id, int $category_id, string $name, float $cost_price, float $sel_price, int $stock, int $min_stock, string $image_path)
    {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->cost_price = $cost_price;
        $this->sel_price = $sel_price;
        $this->stock = $stock;
        $this->min_stock = $min_stock;
        $this->image_path = $image_path;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory_id(): int
    {
        return $this->category_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCost_price(): float
    {
        return $this->cost_price;
    }

    public function getSell_price(): float
    {
        return $this->sel_price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getMin_stock(): int
    {
        return $this->min_stock;
    }

    public function getImage_path(): string
    {
        return $this->image_path;
    }

}
