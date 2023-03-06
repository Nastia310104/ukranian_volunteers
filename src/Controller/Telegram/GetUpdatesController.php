<?php

namespace App\Controller\Telegram;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\RunningMode\Polling;
use SergiX44\Nutgram\Telegram\Types\Common\Update;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetUpdatesController extends AbstractController
{
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
            dd($update);
        }

        $bot->run();
    }
}