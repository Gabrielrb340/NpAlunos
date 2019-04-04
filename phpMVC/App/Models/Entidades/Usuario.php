<?php

namespace App\Models\Entidades;

use App\Models\Repository\UsuarioRepository;
use App\Lib\Sessao;
use App\Models\Repository\UsuarioRepository\UsuarioRepository as AppUsuarioRepository;



class Usuario
{
    private $id;
    private $nome;
    private $senha;
    private $email;

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

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
    public function verificarEmail($email)
    {
        $repository = new AppUsuarioRepository();
        $result = $repository->verificaEmail($email);
        if (sizeOf($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function login(Usuario $Usuario)
    {

        if (!is_null($Usuario->senha) && !is_null($Usuario->email)) {

            $check = new AppUsuarioRepository();
            $resut = $check->checklogin($Usuario);

            if (sizeof($resut) > 1) {
                Sessao::retornaMensagem("Login efetuado com sucesso");

            }
            else{
                Sessao::retornaMensagem("Senha ou usuário inválido");
            }
        }
    }
}
