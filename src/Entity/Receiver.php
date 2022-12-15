<?php

namespace App\Entity;

use App\Interfaces\IdInterface;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Receiver implements IdInterface
{
    use IdTrait;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $phoneNumber;

    /**
     * @var string
     */
    public string $address;

    /**
     * @var Collection|ArrayCollection
     */
    public Collection|ArrayCollection $boxes;

    public function __construct()
    {
        $this->boxes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getBoxes(): ArrayCollection|Collection
    {
        return $this->boxes;
    }

    /**
     * @param ArrayCollection|Collection $boxes
     */
    public function setBoxes(ArrayCollection|Collection $boxes): void
    {
        $this->boxes = $boxes;
    }

    /**
     * @param Box $box
     * @return Collection
     */
    public function addBox(Box $box): Collection
    {
        $this->boxes->add($box);

        return $this->boxes;
    }

    /**
     * @param Box $box
     * @return void
     */
    public function removeBox(Box $box): void
    {
        $this->boxes->remove($box);
    }
}
