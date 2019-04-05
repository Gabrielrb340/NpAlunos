<?php

namespace App\Controllers;

use App\Models\Entidades\Email;


class HomeController extends Controller
{
    public function index()
    {
        /// precisa ser mudado para pagina home , e validado caso usario nao estiver logado no session retorna a pagina de login
        $this->render('home/home');
    }
}