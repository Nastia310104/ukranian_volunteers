<?php

namespace App\Entity;

use App\Interfaces\IdInterface;
use App\Traits\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Pallet implements IdInterface
{
    use IdTrait;

    public function __construct()
    {
        $this->boxes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getId();
    }

    /**
     * @var User|null
     */
    public ?User $receiver;

    /**
     * @var Collection|ArrayCollection
     */
    public Collection|ArrayCollection $boxes;

    /**
     * @var Shipment
     */
    public Shipment $shipment;

    /**
     * @return User
     */
    public function getReceiver(): User
    {
        return $this->receiver;
    }

    /**
     * @param User|null $receiver
     */
    public function setReceiver(?User $receiver): void
    {
        $this->receiver = $receiver;
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

    /**
     * @return Shipment
     */
    public function getShipment(): Shipment
    {
        return $this->shipment;
    }

    /**
     * @param Shipment $shipment
     */
    public function setShipment(Shipment $shipment): void
    {
        $this->shipment = $shipment;
    }
}