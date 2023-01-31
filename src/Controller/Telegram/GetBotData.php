<?php

namespace App\Controller\Telegram;

use Borsaco\TelegramBotApiBundle\Service\Bot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\Objects\User;

/**
 * @Route("/telegram")
 */
class GetBotData extends AbstractController
{
    private Bot $bot;

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
    }

    /**
     * @Route("/get-data")
     *
     * @return Response
     */
    public function getTGChatData():Response
    {
        $tmpdata = json_decode(file_get_contents("php://input"),true);

        $arrdataapi = print_r($tmpdata, true);

        file_put_contents('apidata.txt', "Данные от бота: $arrdataapi", FILE_APPEND);


        return JsonResponse::fromJsonString("202");
    }

    /**
     * @Route("/test")
     */
    public function telegramData():Response
    {
        return JsonResponse::fromJsonString("200");
    }

    /**
     * @Route("/test-bot")
     * @return Response
     * @throws TelegramSDKException
     */
    public function index(): Response
    {
        $helpBot = $this->bot->getBot('help_ukrainian_bot');
        return JsonResponse::fromJsonString($helpBot->getMe());
    }
}
