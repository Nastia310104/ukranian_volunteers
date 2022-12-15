<?php

namespace App\Entity;

use App\Interfaces\IdInterface;
use App\Traits\IdTrait;

class Category implements IdInterface
{
    use IdTrait;

    /**
     * @var string
     */
    public string $categoryName;

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function setCategoryName(string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }
}