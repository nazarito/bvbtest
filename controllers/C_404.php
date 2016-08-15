<?php
  class C_404 extends Controller {
   function action_index() {

        $this->view->showPage('layout/tpl_404_page',array("layout" => $this->layout));
   }
  }
?>