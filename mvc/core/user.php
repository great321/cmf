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

class User{
    public static $id = false;
    public static $password = false;
    public static $login = false;
    public static $data = array();
    
    static function authorize(){
        if ( isset($_SESSION['user_id']) && isset($_SESSION['user_password']))
        {
            User::$id = abs(intval($_SESSION['user_id']));
            User::$password = $_SESSION['user_password'];
        }
        elseif( isset($_COOKIE['user_id']) && isset ($_COOKIE['user_password']))
        {
            User::$id = abs(intval(base64_decode(trim($_COOKIE['user_id']))));
            $_SESSION['user_id'] = User::$id;
            User::$password = md5(trim($_COOKIE['user_password']));
            $_SESSION['user_password'] = User::$password;
        }
        
        if(User::$id && User::$password){
            //TODO DB class.
            $query = mysql_query(
                    "SELECT * FROM `cmf_users` WHERE `id` = '".User::$id."'");
            if (mysql_num_rows($query) ){
                User::$data = mysql_fetch_assoc($query);
                
                if( User::$password == User::$data['password'] )
                {
                   User::$login = User::$data['name']; 
                }
                else
                {
                 User::unauthorize();  
                }
            }
        }
        
    }
    
    static function unauthorize(){
        User::$id = false;
        User::$data = array();
        User::$login = false;
        unset($_SESSION['user_id']);
        unset($_SESSION['user_password']);
        setcookie('user_id','');
        setcookie('user_password','');
    }
}