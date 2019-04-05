<?php

namespace App\Models\Entidades;

use App\Models\Repository\UsuarioRepository as AppUsuarioRepository;
use App\Lib\Sessao;



class Usuario
{
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $cpf;
    private $setor;
    private $tel;


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

    public function getSenha()
    {
        return $this->senha;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getSetor()
    {
        return $this->setor;
    }

    public function setSetor($setor)
    {
        $this->setor = $setor;
    }
    public function getCPF()
    {
        return $this->cpf;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    public function toString(){
        return $nome."\n ".$senha."\n ".$setor."\n ".$tel."\n ".$cpf."\n ".$email;
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
            $result = $check->checklogin($Usuario);

            if ($result) {
                Sessao::retornaMensagem("Login efetuado com sucesso");
                return true;
            }
            else{
                Sessao::retornaMensagem("Senha ou usuário inválido");
                return false;
            }
        }
    }

    public function salvar(){
        $repository = new AppUsuarioRepository();
        return $repository->salvar($this);
    }
}
