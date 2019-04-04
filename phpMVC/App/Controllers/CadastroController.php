<?php

namespace App\Controllers;

use App\Models\Entidades\Usuario;
use App\Lib\Sessao;


class CadastroController extends Controller
{
    //gambiarra caso n ache o metodos sempre acha esse index favor colocar em todo controller 
    // esta configurado no app.php
    public function index()
    {
        $this->render('cadastro/Cadastro');
    }
    public function cadastrar(){
        $Usuario = new Usuario();
        $Usuario->setNome($_POST['nome']);
        $Usuario->setEmail($_POST['email']);
        $Usuario->setSenha(md5($_POST['pass']));
        $Usuario->setCpf($_POST['cpf']);
        $Usuario->setCelular($_POST['tel']);
        $Usuario->setSetor($_POST['setor']);


        Sessao::gravaFormulario($_POST);

        $valido=$Usuario->verificarEmaileCpf($_POST['email'],$_POST['cpf']);

        if($valido){
            Sessao::gravaMensagem("Email existente ou CPF ja existente");
            $this->index();
            Sessao::gravaFormulario($_POST);

        }else {
            if($Usuario->Cadastrar($Usuario)&&$valido){
            }
        }
    }
///teste
}