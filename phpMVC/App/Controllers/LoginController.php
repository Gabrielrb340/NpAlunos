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
       
        if(isset($_POST['act']) && $_POST['act'] == "logar"){
    
            $senha  = $_POST['senha'];
            $lembrar  = $_POST['lembrar'];
            $email   = $_POST['email'];
            $tempo = time() + 3600;
            
            if(isset($_COOKIE['senha'])){
            
                if(!isset($lembrar)){
                    unset($_COOKIE['senha']);
                    unset($_COOKIE['email']);
                }
            
            }else{
            
                if(isset($lem_senha)){
                    setcookie("senha", $senha, $tempo);
                    setcookie("email", $email, $tempo);

                }
            
            }
        
        }
        
       

        if($Usuario->login($Usuario)){
            $this->redirect('/home/index');
        }else{
            Sessao::gravaMensagem("Não á um usuário logado");
            $this->render('login/Login');
        }

    }




}