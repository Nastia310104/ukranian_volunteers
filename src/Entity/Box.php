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

    /**
     * @var Collection|ArrayCollection
     */
    public Collection|ArrayCollection $categories;

    /**
     * @var Pallet
     */
    public Pallet $pallet;

    /**
     * @var User
     */
    public User $receiver;

    /**
     * @return ArrayCollection|Collection
     */
    public function getCategories(): ArrayCollection|Collection
    {
        return $this->categories;
    }

    public function __toString(): string
    {
        return $this->getId();
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
     * @return User
     */
    public function getReceiver(): User
    {
        return $this->receiver;
    }

    /**
     * @param User $receiver
     */
    public function setReceiver(User $receiver): void
    {
        $this->receiver = $receiver;
    }
}