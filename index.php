<?php
ini_set('display_errors', 1);
session_start();
require_once 'core/Controller.php';

require_once 'core/View.php';

require_once 'core/Route.php';
Route::start();

?>