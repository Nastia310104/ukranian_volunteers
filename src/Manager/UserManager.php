<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\Persistence\AbstractManagerRegistry;
use Doctrine\Persistence\ManagerRegistry;
use Sonata\Doctrine\Model\BaseManager;

class UserManager extends BaseManager
{
    /**
     * @inheritDoc
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->class = User::class;
        $this->registry = $registry;
    }

    /**
     * @param string $name
     * @param string $username
     * @param string $telegramId
     * @param string $chatId
     * @param string|null $phoneNumber
     * @param bool|null $isReceiver
     * @param string|null $address
     *
     * @return User
     */
    public function registerUser(
        string $name,
        string $username,
        string $telegramId,
        string $chatId,
        ?string $phoneNumber=null,
        ?bool $isReceiver=true,
        ?string $address=null
    ): User
    {
        ($user = new User)
            ->setName($name)
            ->setTelegramUserId($telegramId)
            ->setTelegramChatId($chatId)
            ->setUsername($username)
            ->setAddress($address)
            ->setPhoneNumber($phoneNumber)
            ->setReceiver($isReceiver)
        ;

        $this->save($user);
        return $user;
    }
}
