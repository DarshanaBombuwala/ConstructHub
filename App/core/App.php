<?php



class App
{


    protected $controller = 'Error_controller';
    protected $method = 'index';
    public static $page = 'Error_controller';

    function __construct()
    {
        $arr = $this->getURL();

        $controller_page =  "../App/controllers/" . ucfirst($arr[0]) . ".php";

        if (file_exists($controller_page)) {
            require $controller_page;
            $this->controller = $arr[0];
            self::$page = $arr[0];
            unset($arr[0]);
        } else {

            require "../App/controllers/" . $this->controller . ".php";
        }

        $mycontroller = new $this->controller();
        $mymethod = $arr[1] ?? $this->method;

        if (!empty($arr[1])) {
            if (method_exists($mycontroller, strtolower($mymethod))) {
                $this->method = strtolower($mymethod);
                unset($arr[1]);
            }
        }

        $arr = array_values($arr);
        call_user_func_array([$mycontroller, $this->method], $arr);
    }

    private function getURL()
    {

        $url = $_GET['url'] ?? 'homepage';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", $url);
        return $arr;
    }
}
