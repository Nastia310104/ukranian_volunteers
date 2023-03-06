<?php

namespace App\Manager;

use App\Controller\Telegram\GetBotData;
use Borsaco\TelegramBotApiBundle\Service\Bot;
use Doctrine\Persistence\AbstractManagerRegistry;
use Doctrine\Persistence\ManagerRegistry;
use Sonata\Doctrine\Model\BaseManager;
use Telegram\Bot\Exceptions\TelegramSDKException;

class TelegramBotManager extends BaseManager
{
    /**
     * @param Bot $bot
     * @param ManagerRegistry $registry
     */
    public function __construct(Bot $bot, ManagerRegistry $registry)
    {
        $this->bot = $bot;
        $this->class = GetBotData::class;
    }

    /**
     * @var Bot
     */
    private Bot $bot;

    public function setBotActions(string $chatId): TelegramBotManager
    {
        $this->bot->getBot('help_ukrainian_bot')
            ->addCommand("/hi")
        ;

        return $this;
    }

    /**
     * @param string $chatId
     * @return TelegramBotManager
     * @throws TelegramSDKException
     */
    public function sendGreetMessage(string $chatId): TelegramBotManager
    {
        $this->bot->getBot('help_ukrainian_bot')
            ->sendMessage([
                "chat_id" => $chatId,
                "text" =>
                    "Hi! Looks like we didn't meet each other before!
                Let me introduce myself: I'm HelperBot that collect data about volunteers and humanitarian aid that they send or receive.
                I'll be glad to help you too!
                "
            ])
        ;

        return $this;
    }

}