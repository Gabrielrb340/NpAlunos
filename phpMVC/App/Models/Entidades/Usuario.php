<?php

namespace App\Models\Entidades;

use App\Lib\Sessao;
use App\Models\Repository\UsuarioRepository\UsuarioRepository;
// use App\Models\Repository\UsuarioRepository\UsuarioRepository as AppUsuarioRepository;

include APP_HOST."/App/Models/Repository/UsuarioRepository.php";


class Usuario
{
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $celular;
    private $cpf;
    private $setor;

    public function getId()
    {
        return $this->id;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }
 
    public function getSenha()
    {
        return $this->senha;
    }
  
    public function getCpf()
    {
        return $this->cpf;
    }

    

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }


    public function getSetor()
    {
        return $this->setor;
    }

    public function setSetor($setor)
    {
        $this->setor = $setor;

        return $this;
    }

///Metodos da classe
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
    public function verificarEmaileCpf($email,$cpf)
    {
        
        $repository = new UsuarioRepository();
        $result = $repository->verificaEmaileCpf($email,$cpf);
        if (sizeOf($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function login(Usuario $Usuario)
    {

        if (!is_null($Usuario->senha) && !is_null($Usuario->email)) {

            $check = new UsuarioRepository();
            $resut = $check->checklogin($Usuario);

            if (sizeof($resut) > 1) {
                Sessao::retornaMensagem("Login efetuado com sucesso");

            }
            else{
                Sessao::retornaMensagem("Senha ou usuário inválido");
            }
        }
    }
    public function Cadastrar(Usuario $user){
        $repository = new UsuarioRepository();
        $repository->salvar($user);
    }
    


  
}
