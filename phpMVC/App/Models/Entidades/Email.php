<?php
namespace App\Models\Entidades;
require_once __DIR__.'/../../../vendor/autoload.php';
require_once __DIR__.('/../../../vendor/swiftmailer/swiftmailer/lib/swift_required.php');
// include_once __DIR__.('/../../../vendor/swiftmailer/swiftmailer/lib/classes/swift/SmtpTransport.php');


class Email
{

    //deixei os nomes em ingles porque em portugues tava esquesito
    private $To;
    private $From;
    private $Corpo;
    //construtores obs acho que essa porra de php não tem sobrecarga
    public function __construct()
    { }
    public function __EmailBuilder($to, $from, $corpo)
    {
        $this->To = $to;
        $this->From = $from;
        $this->Corpo = $corpo;
    }
    //gets e sets
    public function getCorpo()
    {
        return $this->Corpo;
    }
    public function setCorpo($Corpo)
    {
        $this->Corpo = $Corpo;

        return $this;
    }
    public function getFrom()
    {
        return $this->From;
    }
    public function getTo()
    {
        return $this->To;
    }
    ///fim gets e sets

    public function EnviarEmail()
    {

        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
            ->setUsername('email')
            ->setPassword('senha');

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Are you using Lipd Gel?'))
            ->setFrom(['npalunos@gmail.com' => 'NpAlunos'])
            ->setTo(['Lenovob430@gmail.com', 'JordanEduardocl@gmail.com' => 'NpAlunos'])
            ->setBody('Testando Teste teste');

        // Send the message
        $result = $mailer->send($message);
    }
    public function EnviarEsqueciMinhaSenha(){
            //verificaremail
            //caso houver no banco enviar link para resetar senha
            //caso contrario retornar mensagem
        
    }
}
        ?>