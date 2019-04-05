<?php

namespace App;

use App\Controllers\HomeController;
use Exception;

class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public  $controllerName;

    public function __construct()
    {
        /*caminho global do css como usar? 
        <link href="<?php echo CSSGloval;?>/Nomearquivo.css" rel="stylesheet" type="text/css">

        */
        define('CSSGLOBAL' ,'../../../phpMVC/public/css');
        /// caminho  pasta main do projeto OBS contando que esteja dentro de c/xamp/hdocs
        // nsei no mac configura ai
        define("ROOT" , $_SERVER['DOCUMENT_ROOT'].'/phpMVC/PhpMVC');//so pra desenvolvimento provavel
        define('HOME' ,"../../../phpMVC");
        // quase a mesma coisa do de cima
        define('PROTOCOLO', stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://');
        define('APP_HOST'       , PROTOCOLO.$_SERVER['HTTP_HOST'] . "/phpMVC");
        define('PATH'           , realpath('./'));
        define('TITLE'          , "NPAluno");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root");
        define('DB_PASSWORD'    , "");
        define('DB_NAME'        , "npaluno");
        // se n funcionar mysql poe PDO
        define('DB_DRIVER'      , "mysql");

        $this->url();
    }
    ///inicia projeto
    public function run()
    {
        /// indetifica o controller
        if ($this->controller) {
            $this->controllerName = ucwords($this->controller) . 'Controller';
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);/*formata o controller permitindo apenas letras se achar algo que nao seja
            letras tira e colaca ""(nada)*/
        } else {
            $this->controllerName = "HomeController";
        }
     
        $this->controllerFile   = $this->controllerName . '.php';/* basicamente vai buscar o nome do controller e concatenar com .php assim 
        por exemplo BanirController ira se tornar BanirController.php .. ou seja referencia um arquivo .php
        da aplicação
         */  
   
        $this->action = preg_replace('/[^a-zA-Z]/i', '', $this->action);/*formata a action do controller permitindo apenas letras se achar algo que nao seja
        letras tira e colaca ""(nada)
*/
        //casp controler não existir instancia o home controller(ele chama a tela de login)
        if (!$this->controller) {
            $this->controller = new HomeController($this);
            $this->controller->index;
        }
        /// caso por um milagre ou um erro grostesco não encontre a pagina ele da throw erro 404 not found
        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new Exception("Página não encontrada.", 404);
        }
        /* entra no controller dentro da pasta controller com o controllername
        criado acima (  $this->controllerFile   = $this->controllerName . '.php';)
        */
        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        /// instancia a class e do controller se o nome da class
        $objetoController = new $nomeClasse($this);
        ///caso não encontre a classe mete um erro 500 na cara
        if (!class_exists($nomeClasse)) {
            throw new Exception("Erro na aplicação", 500);
        }
        /// caso a classe seja instaciada com sucesso busca o metodo dentro dele(action)+ os parametros do mesmo
        if (method_exists($objetoController, $this->action)) {
            $objetoController->{$this->action}($this->params);
            /// exemplo UsuarioController->salvar(nomeusuario)
            return;
        } 
        /*caso não caso nao exista o classe/metodo ele chama o metodo index que deve estar presente em todas as 
        classes por seguraça #gambiarr
        a*/
        else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        }
        // caso falhe tudo da erro 500
        else {
            throw new Exception("Erro", 500);
        }
        /// caso nao entre em nenhuma condição da erro generico 404
        throw new Exception("Página não encontrada.", 404);
    }
    //usado para criar uma url sem paramentros mais amigavel usando o .htacess
    // fonte: devmedia
    public function url () {

        if ( isset( $_GET['url'] ) ) {

            $path = $_GET['url'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL); 

            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );
            $this->action      = $this->verificaArray( $path, 1 );

            if ( $this->verificaArray( $path, 2 ) ) {
                unset( $path[0] );
                unset( $path[1] );
                $this->params = array_values( $path );
            }
        }
    }
    //gets para acessar variaveis encapsuladas
    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getParams()
    {
        return $this->params;
    }

    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
}