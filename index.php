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





class homepage extends page
{
  public function get()
  {
    $form = '<form method="post" enctype="multipart/form-data">';
    $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
    $form .= '<input type="submit" value="Upload" name="submit">';
    $form .= '</form>';
    
    $this->html .='<h1>Form Upload</h1>';
    $this->html .=$form;
  }



  public function post()
  {
    $name = $_FILES['fileToUpload']['name'];
    $temp_name = $_FILES['fileToUpload']['tmp_name'];

      
      if(isset($name))
      {
	$location = '/afs/cad.njit.edu/u/p/g/pg395/public_html/Project1/Upload';
	$upload_file_path = $location . $name;



	$table = new htmlTable();


	   if(move_uploaded_file($temp_name, $upload_file_path))
	   {
	     $table->print_table($upload_file_path);
	   }

	   else
	   {
	     echo 'Please select a file to be uploaded.';
	   }
      }
  }
}





class htmlTable extends page
{
  protected funtion print_header($cell)
  {
     $this->html .= "<th>";
     $this->html .= htmlspecialchars($cell);
     $this->html .= "</th>";
  }


  protected function print_row($cell)
  {
     $this->html .= "<td>";
     $this->html .= htmlspecialchars($cell);
     $this->html .= "</td>";
  }



  protected function print_line_by_line($f, $flag)
  {
   while(($line = fgetcsv($f)) !==false)
   {
     $this->html .= "<tr>";

       foreach($line as $cell)
       {
	 if($flag)
	 {
 	    $this->print_header($cell);
	 }

	 else
         {
	   $this->print_row($cell);
	 }
       }

       $flag = false;
       $this->html .= "</tr>";
   }
  }




  public function print_table($path)
  {
    $this->html .= '<html><body><table border = "1">';

     if(file_exists($path))
     {
       $f = fopen($path, "r");

       $flag = true;
       this->print_line_by_line($f, $flag);

       fclose($f);
     }

     $this->html .= "\n</table></body></html>";
  }
}
?>
