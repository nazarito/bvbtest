<?php

  class C_Main extends Controller {
      public $data;
      public $res;
      public $res2;
      public $er;
      public $rd;
      public $red;
   function __construct()
	{
		$this->view = new View();
	}

   function action_index()
	{


		$this->view->showPage('main/tpl_index',array());
                
	}

  }
?>