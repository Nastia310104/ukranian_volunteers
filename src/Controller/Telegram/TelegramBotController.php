<?php

namespace App\Controller\Telegram;

use App\Manager\UserManager;
use App\Traits\UserManagerInjectionTrait;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\RunningMode\Polling;
use SergiX44\Nutgram\Telegram\Types\Common\Update;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TelegramBotController extends AbstractController
{
    use UserManagerInjectionTrait;

    private Nutgram $bot;

    public function __construct(UserManager $userManager, Nutgram $bot)
    {
        $this->setUserManager($userManager);

        $this->bot = $bot;
    }

    /**
     * @Route("/get-updates")
     *
     * @return void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getBotUpdates(): void
    {
        ($bot = new Nutgram($_ENV['HELP_UKRAINIAN_IN_OSWEGO_BOT_TOKEN']))
            ->setRunningMode(Polling::class);

        $updates = $bot->getUpdates();

        /** @var Update $update */
        foreach ($updates as $update) {
            if (!($user = $this->userManager->findOneBy(["telegramUserId" => $update->getUser()->id]))) {
                $this->sendGreetMessage($update->getChat()->id);

                $telegramUser= $update->getUser();
                $this->userManager->registerUser(
                    $telegramUser->first_name,
                    $telegramUser->username,
                    $telegramUser->id,
                    $update->getChat()->id,
                );
            }
        }
        dd($updates);
        $bot->run();
    }

    public function sendGreetMessage(string $chat_id)
    {
        $this->bot->sendMessage(
            "Hi! Looks like we didn't meet each other before!
            Let me introduce myself: I'm HelperBot that collect data about volunteers and humanitarian aid that they send or receive.
            I'll be glad to help you too!
            ", [
            "chat_id" => $chat_id,
            "reply_markup" => ReplyKeyboardMarkup::make()->addRow(
                KeyboardButton::make("Create box"),
                KeyboardButton::make("Continue box filling"),
            )
        ]);

        return ;
    }
}