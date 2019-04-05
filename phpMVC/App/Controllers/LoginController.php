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
        $Usuario->setSenha(md5($_POST['senha']));

        Sessao::gravaFormulario($_POST);
        $Usuario->login($Usuario);
        

       
       // setcookie('email', $_POST['email'])
        //setcookie('senha', $_post['senha'])
        



        


        if($Usuario->login($Usuario)){
            $this->redirect('/Home/Home');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
            $this->index();
        }

    }
    public function logar(){
        $Usuario = new Usuario();
        $Usuario->setEmail($_POST['email']);
        $Usuario->setSenha($_POST['senha']);

        Sessao::gravaFormulario($_POST);
        $Usuario->login($Usuario);

        if($Usuario->login($Usuario)){
            $this->redirect('/Home/Home');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
            $this->index();
        }

    }



}