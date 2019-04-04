<?php

namespace App\Controllers;

use App\Models\Entidades\Usuario;
use App\Lib\Sessao;


class LoginController extends Controller
{
    public function index()
    {
        $this->render('login/Login');
    }
    public function login(){
        
        $Usuario = new Usuario();
        $Usuario->setEmail($_POST['email']);
        $Usuario->setSenha($_POST['senha']);

        Sessao::gravaFormulario($_POST);
        $Usuario->login($Usuario);
        

        if(){
        setcookie('email', $_POST['email'])
        setcookie('senha', $_post['senha'])
        }



        



    }




}