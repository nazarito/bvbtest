<?php 

class Route
{
	static function start()
	{


        $routes2 = explode('?',$_SERVER['REQUEST_URI']);
        $rout = explode('/',$routes2[0]);

		// получаем имя контроллера
		if ( !empty($rout[1]) )
		{	
			$c_name = ucfirst($rout[1]);
		}
                else {
                    $c_name = 'Main';
                }
	
		// получаем имя экшена
		if ( !empty($rout[2]) )
		{
			$a_name = $rout[2];
		}
                else {
                       $a_name = 'index';
                }
        if ( !empty($routes2[1]) )
        {
            $get_name = $routes2[1];
        }
        else {
            $get_name = '';
        }

		// добавляем префиксы
		$model_name = 'M_'.$c_name;
		$controller_name = 'C_'.$c_name;
		$action_name = 'Action_'.$a_name;


                $model_file = $model_name.'.php';
		$model_path = "models/".$model_file;
		if(file_exists($model_path))
		{
			include $model_path;
		}

		// подцепляем файл с классом контроллера
		$controller_file = $controller_name.'.php';
		$controller_path = "controllers/".$controller_file;

		if(!file_exists($controller_path))
		{
		        header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');
		}
		else
		{
			include $controller_path;
		}
		
		// создаем контроллер
                
		$controller = new $controller_name;
		$action = $action_name;
		
		if(!method_exists($controller, $action))
		{
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');
		}
		else
		{
		        $controller->$action($get_name);
		}
	
	
    }
}

?>