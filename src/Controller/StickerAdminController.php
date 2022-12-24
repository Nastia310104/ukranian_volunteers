<?php

namespace App\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Response;

class StickerAdminController extends CRUDController
{
    public function generateAction($id): Response
    {
        $object = $this->admin->getSubject();
        $class = $this->admin->getClassnameLabel();

        return $this->render('/CRUD/sticker_page.html.twig', [
            'object' => $object,
            'class' => $class,
        ]);
    }
}