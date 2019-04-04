<?php


use App\Models\Entidades\Usuario;
use App\Models\Repository\RepositoryBase;
namespace App\Models\Repository\UsuarioRepository{
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
        try {
            $sql = "insert into testes (nome, email) values (?,?)";
            $stm = $con->prepare($sql);
            $stm->bindValue(1,$nome);
            $stm->bindValue(2,$email);
        } catch (\Throwable $th) {
            //throw $th;
        }
      
    }

    public function checklogin(Usuario $usuario){
       try {
           $query = ("SELECT EMAIL, SENHA, ATIVO FROM PROFESSOR WHERE ATIVO = 1 AND EMAIL=:$email AND SENHA=:$senha");
           
           $connect = $this->getConexao();
           $stm = $connect->$query($query);
           $stm->execute(['EMAIL'=>$usuario->email]); 
           $stm->execute(['SENHA'=>$usuario->senha]); 
           return $stm->fetch();
        
       } catch (\Throwable $th) {
           //throw $th;
       }

    }
}
}