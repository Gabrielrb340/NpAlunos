<?php

namespace App\Models\Repository;

use App\Models\Entidades\Usuario;
use App\Models\Repository;

class UsuarioRepository extends RepositoryBase
{
    public function verificaEmail($email)
    {
        try {
            $conect = $this->getConexao();
            $stmt=$conect->query("select * from professor where email=:email");
            $stmt->execute(['email'=>$email]);
        
            return $stmt->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Usuario $usuario) {
        // try {
        //     $nome      = $usuario->getNome();
        //     $email     = $usuario->getEmail();
        //     return $this->insert(
        //         'usuario',
        //         ":nome,:email",
        //         [
        //             ':nome'=>$nome,
        //             ':email'=>$email
        //         ]
        //     );

        // }catch (\Exception $e){
        //     throw new \Exception("Erro na gravação de dados.", 500);
        // }
      //TODO Melhorar função
        try {
          $con = $this->getConexao();
            $sql = "insert into professor 
            (nom_professor,des_senha,des_email,num_cpf,num_telefone,id_setor) 
            values (?,?,?,?,?,?)";
            $stm = $con->prepare($sql);
            $stm->bindValue(1,$usuario->getNome());
            $stm->bindValue(2,$usuario->getSenha());
            $stm->bindValue(3,$usuario->getEmail());
            $stm->bindValue(4,$usuario->getCPF());
            $stm->bindValue(5,$usuario->getTel());
            //TODO Setor é primary key da tabela SETOR
            $stm->bindValue(6,$usuario->getSetor());
            $stm->execute();
            return true;
        } catch (\Throwable $th) {
             throw $th;
        }
      
    }
    /*for($i=0; $row = $query->fetch(); $i++){
        echo $i." - ".$row['name']."<br/>";*/
    public function checklogin(Usuario $usuario){
       try {
           //TODO WHERE ATIVO = 1

           /*$query = ("SELECT EMAIL, SENHA, ATIVO FROM PROFESSOR WHERE ATIVO = 1 AND EMAIL=:$email AND SENHA=:$senha");
           
           $connect = $this->getConexao();
           $stm = $connect->$query($query);
           $stm->execute(['EMAIL'=>$usuario->email]); 
           $stm->execute(['SENHA'=>$usuario->senha]); 
           return $stm->fetch();*/
          $con = $this->getConexao();
        //   $senha = md5($usuario->getSenha());
          $sql = "select nom_professor from professor where des_email='".$usuario->getEmail()."' and des_senha='".$usuario->getSenha()."'";
          $stm = $con->query($sql);
        //   $stm->bindValue(1,$usuario->getEmail());
        // $stm->bindValue(2,md5($usuario->getSenha()));
        //  $stm->execute(['email'=>$usuario->getEmail(),'senha'=>md5($usuario->getSenha())]);
        //  $stm->execute([md5($usuario->getSenha())]);


        //   $stm->execute();
          return $stm->fetch();
          
       } catch (\Throwable $th) {
           throw $th;
       }

    }

}