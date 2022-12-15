<?php

namespace App\Entity;

use App\Interfaces\IdInterface;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Box implements IdInterface
{
    use IdTrait;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getId();
    }

    /**
     * @var Collection|ArrayCollection
     */
    public Collection|ArrayCollection $categories;

    /**
     * @var Pallet
     */
    public Pallet $pallet;

    /**
     * @var Receiver
     */
    public Receiver $receiver;

    /**
     * @return ArrayCollection|Collection
     */
    public function getCategories(): ArrayCollection|Collection
    {
        return $this->categories;
    }

    /**
     * @param ArrayCollection|Collection $categories
     */
    public function setCategories(ArrayCollection|Collection $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @param Category $category
     * @return Collection
     */
    public function addCategory(Category $category): Collection
    {
        $this->categories->add($category);

        return $this->categories;
    }

    /**
     * @param Category $category
     * @return void
     */
    public function removeCategory(Category $category): void
    {
        $this->categories->remove($category);
    }

    /**
     * @return Pallet
     */
    public function getPallet(): Pallet
    {
        return $this->pallet;
    }

    /**
     * @param Pallet $pallet
     */
    public function setPallet(Pallet $pallet): void
    {
        $this->pallet = $pallet;
    }

    /**
     * @return Receiver
     */
    public function getReceiver(): Receiver
    {
        return $this->receiver;
    }

    /**
     * @param Receiver $receiver
     */
    public function setReceiver(Receiver $receiver): void
    {
        $this->receiver = $receiver;
    }
}