<?php
namespace machine\api;
use machine\src\clientController\clientController;
use machine\src\controller\ProductController;

include_once(dirname(__DIR__).'/machine/bootstrap.php');

class Api
{
    public $act = ''; // сущности
    public $method = '';// название методы для выполнения
    public $url = '';
    public $action = ''; // PUT POST GET DELETE
    public $requestUri = [];
    public $requestParams = [];

    public function __construct()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
        //создадим массив параметров, который будет разделён /
        $this->requestUri = explode( '/',$_SERVER['REQUEST_URI'],'/');// request_uri- индентификатор ресурса, $_SERVER-информация о среде исполнения
        $this->requestParams=$_REQUEST;// массив который содержит http запросы
        //Определим метод запроса
        $this->action=$_SERVER['REQUEST_METHOD'];
        if ($this->action=='POST') {
            if ($_SERVER['REQUEST_METHOD']=='DELETE') {
                $this->action='DELETE';
            } else if ($_SERVER['REQUEST_METHOD']=='PUT') {
                $this->action='PUT';
            } else {
                throw new Exception("Unexpected Header");
            }
        }
    }

    public function run(){
        if (array_shift($this->requestUri)=='php://input'|| array_shift($this->requestUri) !== $this->act) {
            throw new RuntimeException('API Not Found', 404);
        }
        $this->method=$this->getMethod();//определяю метод для обработки
        if (method_exists($this, $this->method)) {
            return $this->{$this->method}();
        } else {
            throw new RuntimeException('Invalid Method', 405);
        }
    }
    public function response($data,$status=500) {
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data);
    }


}
/*
 //Ещё один апи
$url = 'php://input';
$res = file_get_contents($url);

$data = json_decode($res);
array_merge($_REQUEST,$data);
if ($_REQUEST['act']==='Clinet'){
    $cout=new clientController();

}
if ($_REQUEST['act']==='Product'){
    $cout=new ProductController();
}
if ($_REQUEST['act']==='Specialist'){
    $cout=new SpecialistController();
}
*/
