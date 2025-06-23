<?php

namespace App\Controller;

use Core\Abstract\AbstractController;
use Core\Road\Attribute\Route;

class HomeController extends AbstractController
{

    #[Route('/', name: 'Home')]
    public function index(): mixed
    {
        self::setHeader('title', 'Accueil');
        return self::rendererViews('home/index.php', [
            'controller_name' => 'HomeController@index'
        ]);
    }

    #[Route('/test', name: 'Test')]
    public function test(): mixed
    {
        self::setHeader('title', 'Test', 'sayHello');
        return self::rendererViews('home/test.php', [
            'controller_name' => 'HomeController@test'
        ]);
    }
}
