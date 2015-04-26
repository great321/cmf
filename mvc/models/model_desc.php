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

class Model_Desc extends Model {

    public $input;
    public $success = false;
    public $errors = array();
    public $messages = array();
    public $submit = false;

    function get_data() {
        if ($this->submit) {
            $this->check();
        }

        $message = '';
        if ($this->success == false) $message = $this->input['message'];
        
        $this->messages = $this->get_data_messages();
        
        return array(
            'message' => $message,
            'success' => $this->success,
            'errors' => $this->errors,
            'messages' => $this->messages
        );
    }

    function check() {
        $message = $this->input['message'];
        
        if (USER::$username == false){
            $this->error('Log in, please.');
        }
        elseif (empty($message)) {
            $this->error('You have not entered message');
        } elseif (mb_strlen($message) < 2 || mb_strlen($message) > 10000) {
            $this->error('Wrong message lenght. Min. 2, Max. 10000');
        }
        //TODO pregmatch check.

        //TODO captcha
        if (!$this->get_error_count()) {
                $this->success = true;
                $this->insert_message($message);
        }
    }
    
    function error($error) {
        $this->errors[] = $error;
    }

    function get_error_count() {
        return count($this->errors);
    }

    function set_input($input) {
        $this->input = $input;
    }

    function set_submit($submit) {
        $this->submit = $submit;
    }
    
    //TODO DB
    static function get_data_messages(){
        $messages = array();
        
        $query = "SELECT * FROM `cmf_desc` ORDER BY `time` DESC";
        $request = mysql_query($query);
        if (mysql_num_rows($request)) {
            while( $msg = mysql_fetch_assoc($request) ){
               $username = User::get_name_of_id($msg['user_id']); 
               $time = display_unixtime($msg['time']);
               $text = $msg['text'];
                $messages[] = array(
                   'username' => $username,
                   'time' => $time,
                   'text' => $text
               ); 
            }
        }
        return $messages;
    }
    

    function insert_message($message) {
        //TODO use Mysql UNIXTIME (not var).
        $time = time();
        $user_id = mysql_real_escape_string(User::$id);
        $message = mysql_real_escape_string($message);
        $ip = mysql_real_escape_string(User::get_ip());
        
        mysql_query("INSERT INTO `cmf_desc` SET
            `time` = '" . $time . "',
            `user_id` = '" . $user_id . "',
            `text` = '" . $message . "',
            `ip` = '" . $ip . "'
        ") or die(__LINE__ . ': ' . mysql_error()); //TODO 
    }
}