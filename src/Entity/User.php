<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sonata\UserBundle\Entity\BaseUser;

class User extends BaseUser
{
    /**
     * @var string|null
     */
    public ?string $name = null;

    /**
     * @var string|null
     */
    public ?string $phoneNumber = null;

    /**
     * @var string|null
     */
    public ?string $telegramUserId = null;

    public ?string $telegramChatId = null;

    /**
     * @var bool
     */
    public bool $receiver = true;

    /**
     * @var string|null
     */
    public ?string $comment = null;

    /**
     * @var string|null
     */
    public ?string $address = null;

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
     * @param string|null $name
     * @return User
     */
    public function setName(?string $name): User
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     * @return User
     */
    public function setPhoneNumber(?string $phoneNumber): User
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getTelegramUserId(): string
    {
        return $this->telegramUserId;
    }

    /**
     * @param string|null $telegramUserId
     * @return User
     */
    public function setTelegramUserId(?string $telegramUserId): User
    {
        $this->telegramUserId = $telegramUserId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTelegramChatId(): ?string
    {
        return $this->telegramChatId;
    }

    /**
     * @param string|null $telegramChatId
     * @return User
     */
    public function setTelegramChatId(?string $telegramChatId): User
    {
        $this->telegramChatId = $telegramChatId;

        return $this;
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
     * @return User
     */
    public function setComment(?string $comment): User
    {
        $this->comment = $comment;

        return $this;
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
     * @return User
     */
    public function setReceiver(bool $receiver): User
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return User
     */
    public function setAddress(?string $address): User
    {
        $this->address = $address;

        return $this;
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
     * @return User
     */
    public function setBoxes(ArrayCollection|Collection $boxes): User
    {
        $this->boxes = $boxes;

        return $this;
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
     * @return User
     */
    public function setPallets(ArrayCollection|Collection $pallets): User
    {
        $this->pallets = $pallets;

        return $this;
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
     * @return User
     */
    public function removePallet(Pallet $pallet): User
    {
        $this->pallets->remove($pallet);

        return $this;
    }
}
