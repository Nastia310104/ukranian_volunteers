<?php

namespace App\Controller\Telegram;

use App\Manager\TelegramBotManager;
use App\Manager\UserManager;
use App\Traits\UserManagerInjectionTrait;
use Borsaco\TelegramBotApiBundle\Service\Bot;
use PHPUnit\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Objects\Update;
use Telegram\Bot\Objects\User;

/**
 * @Route("/telegram")
 */
class GetBotData extends AbstractController
{
    use UserManagerInjectionTrait;

    private Bot $bot;

    public UserManager $userManager;

    public TelegramBotManager $botManager;

    public static ?string $updateId = "";

    public function __construct(Bot $bot, UserManager $userManager, TelegramBotManager $botManager)
    {
        $this->bot = $bot;
        $this->userManager = $userManager;
        $this->botManager = $botManager;
    }

    public function writeLogFile($data)
    {
        $fileName = $this->getParameter('kernel.project_dir')."/logs/".date("m.d.Y").".txt";

        file_put_contents($fileName, date("m-d-Y H:i:s").print_r($data, true)."\r\n", FILE_APPEND);
    }

    /**
     * @Route("/get-updates")
     * @return Response
     * @throws TelegramSDKException
     */
    public function getUpdates(): Response
    {
        $bot = $this->bot->getBot('help_ukrainian_bot');

        $updates = $bot->getUpdates(['offset' => self::$updateId]);

        foreach ($updates as $update) {
            $this->writeLogFile(json_encode($update, JSON_PRETTY_PRINT));

            $telegramUser = $this->getTelegramUser($update);

                if (!($user = $this->userManager->findOneBy(['telegramUserId' => $telegramUser->get("id")]))) {
                    $this->userManager->registerUser($telegramUser->get("first_name"), $telegramUser->get("username"), $telegramUser->get("id"), $chat_id = $this->getChatId($update));

                    $this->botManager->sendGreetMessage($chat_id)->setBotActions($chat_id);
                }

            self::$updateId = $update->get("update_id");
        }

        dd(self::$updateId);

        return JsonResponse::fromJsonString(self::$updateId);
    }

    public function getTelegramUser(Update $update): User
    {
        return  $update->getMessage()->get("from");
    }

    public function getChatId(Update $update): string
    {
        return $update->getChat()->get("id");
    }
}
