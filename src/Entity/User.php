<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sonata\UserBundle\Entity\BaseUser;

class User extends BaseUser
{
    /**
     * @var string
     */
    public string $name = "N/A";

    /**
     * @var string
     */
    public string $phoneNumber = "N/A";

    /**
     * @var string
     */
    public string $telegramUserId = "N/A";

    /**
     * @var bool
     */
    public bool $receiver = true;

    /**
     * @var string|null
     */
    public ?string $comment = null;

    /**
     * @var string
     */
    public string $address = "N/A";

    /**
     * @var Collection|ArrayCollection
     */
    public Collection|ArrayCollection $boxes;

    /**
     * @var Collection|ArrayCollection
     */
    public Collection|ArrayCollection $pallets;

    public function __construct()
    {
        $this->boxes = new ArrayCollection();
        $this->pallets = new ArrayCollection();
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
    public function getTelegramUserId(): string
    {
        return $this->telegramUserId;
    }

    /**
     * @param string $telegramUserId
     */
    public function setTelegramUserId(string $telegramUserId): void
    {
        $this->telegramUserId = $telegramUserId;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return bool
     */
    public function isReceiver(): bool
    {
        return $this->receiver;
    }

    /**
     * @param bool $receiver
     */
    public function setReceiver(bool $receiver): void
    {
        $this->receiver = $receiver;
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

    /**
     * @return ArrayCollection|Collection
     */
    public function getPallets(): ArrayCollection|Collection
    {
        return $this->pallets;
    }

    /**
     * @param ArrayCollection|Collection $pallets
     */
    public function setPallets(ArrayCollection|Collection $pallets): void
    {
        $this->pallets = $pallets;
    }

    /**
     * @param Pallet $pallet
     * @return Collection
     */
    public function addPallet(Pallet $pallet): Collection
    {
        $this->pallets->add($pallet);

        return $this->pallets;
    }

    /**
     * @param Pallet $pallet
     * @return void
     */
    public function removePallet(Pallet $pallet): void
    {
        $this->pallets->remove($pallet);
    }
}
