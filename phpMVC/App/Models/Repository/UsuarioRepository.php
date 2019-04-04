<?php
namespace App\Models\Repository\UsuarioRepository;
    use App\Models\Entidades\Usuario;
// use App\Repository\RepositoryBase;
use App\Lib\Conexao;
use App\Lib\Sessao;
class UsuarioRepository
{
        private $conexao;

    public function __construct()
    {
            $this->conexao = Conexao::getConnection();

    }
    public function verificaEmaileCpf($email, $cpf)
    {
        try {
            // $conect = $this->getConexao();
            $cpfreplace= str_replace('-','',$cpf);
            $stmt= $this->conexao->prepare("select * from professor where des_email 
            = '$email' or num_cpf= '$cpfreplace' " );
            // $stmt->bindValue(':email', $email, $this->conexao::PARAM_STR);
            $stmt->execute();
            $resultadoteste= $stmt->fetchall();
            return $resultadoteste;
        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Usuario $usuario) {
        try {
            $sql = "insert into professor (nom_professor, num_telefone,num_cpf,des_senha,idsetor,des_email) values (?,?,?,?,?,?)";
            $stm = $this->conexao->prepare($sql);
            $cpfreplace= str_replace('-','',$usuario->getCpf());

            $stm->bindValue(1,$usuario->getNome());
            $stm->bindValue(2,$usuario->getCelular());
            $stm->bindValue(3,$cpfreplace);
            $stm->bindValue(4,$usuario->getSenha());
            $stm->bindValue(5,$usuario->getSetor());
            $stm->bindValue(6,$usuario->getEmail());

            $stm->execute();
            Sessao::gravaMensagem('Usuario Salvo Com sucesso!');
        } catch (PDOException $e) {
            throw new Exception("Erro no banco", $e);
            Sessao::gravaMensagem("Houve um erro inesperado tente novamente!");
            
        }
      
    }

    public function checklogin(Usuario $usuario){
       try {
           $query = ("SELECT EMAIL, SENHA, ATIVO FROM PROFESSOR WHERE ATIVO = 1 AND EMAIL=:$email AND SENHA=:$senha");
           
           $stm = $this->conexao->$query($query);
           $stm->execute(['EMAIL'=>$usuario->email]); 
           $stm->execute(['SENHA'=>$usuario->senha]); 
           return $stm->fetch();
        
       } catch (\Throwable $th) {
           //throw $th;
       }

    }
}
