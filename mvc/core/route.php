<?php

/* 
 * Copyright (C) 2015 user
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class Route
{
    
    static function start(){
        $controller_name = 'Main';
        $action_name = 'index';
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        
        if (!empty($routes[1])){
            $controller_name = $routes[1];
        }
        if (!empty($routes[2])){
            $action_name = $routes[2];
        }
        
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;
        
        $model_file = strtolower($model_name).'.php';
        $model_path = 'mvc/models/'.$model_file;
        
        if(file_exists($model_path))
        {
            include 'mvc/models/'.$model_file;
        }

        $controller_file = strtolower($controller_name).'.php';
        $controller_path = 'mvc/controllers/'.$controller_file;

        if(file_exists($controller_path))
        {
            include 'mvc/controllers/'.$controller_file;
        }
        else
        {
            die("Warning. Not found $controller_path");
            //Route::ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            $controller->$action();
            //echo'Hello';
            
        }
        else
        {
            die("Not found method $controller $action");
            //Route::ErrorPage404();
        }
                 
               
	
	}

	static function ErrorPage404(){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
        }
    
}