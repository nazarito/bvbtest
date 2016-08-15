<?php

class View
{


    function __construct()
    {

    }

    function showPage($content, $data)
    {


        if ($data) {

            extract($data);
        }

        include 'views/layout/tpl_content.php';


    }



}

?>