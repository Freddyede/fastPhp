<?php

namespace App\Controller;

use Core\Abstract\AbstractController;
use Core\Road\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'Contact')]
    public function index(): void
    {
        self::setHeader('title', 'Contact');
        self::rendererViews('contact/index.php', [
            'controller_name' => 'ContactController@index'
        ]);
    }
}
