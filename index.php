<?php
ini_set('display errors', 'On');

error_reporting(E_ALL);


class Manage
{
public static function autoload($class)
  {
    include $class . '.php';
  }
}  



spl_autoload_register(array('Manage', 'autoload'));


$obj = new main();




class main
{
    public function__constrct()
      {
        $pageRequest = 'homepage';


	  if (isset($_REQUEST['page']))
	    {
		$pageRequest = $_REQUEST['page'];
	    }


	     $page = new $pageRequest;


	        if ($_SERVER['REQUEST_METHOD'] == 'GET')
		  {
			$page->get();
		  }
		else
		  {
			page->post();
		  }
      }
}




abstract class page
{
   protected $html;


      public function__construct()
      {
        $this->html .= '<html>';
	$this->html .= '<link rel="stylesheet" href="styles.css">';
	$this->html .= '<body>';
      }




      public function__destruct()
      {
	$this->html .= '</body</html>>';
	stringFunctions::printThis($this->html);
      }



      public function get()
      {
	echo 'Default get message';
      }




      public function post()
      {
	print_r($_POST);
      }
}
?>
