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

//TODO *** code to class.

class Model_Registration extends Model {

    public $input;
    public $success = false;
    public $errors = array();
    public $submit = false;

    function get_data() {
        if ($this->submit) {
            $this->check();
        }

        return array(
            'username' => $this->input['username'],
            'password' => $this->input['password'],
            'success' => $this->success,
            'errors' => $this->errors
        );
    }

    function check() {
        $username = $this->input['username'];
        $password = $this->input['password'];

        if (empty($username)) {
            $this->error('You have not entered username');
        } elseif (mb_strlen($username) < 2 || mb_strlen($username) > 15) {
            $this->error('Wrong username lenght. Min. 2, Max. 15');
        }
        //TODO pregmatch check.
        if (empty($password)) {
            $this->error('You have not entered password');
        } elseif (mb_strlen($password) < 6 || mb_strlen($username) > 10) {
            $this->error('Wrong password lenght. Min. 6, Max. 10');
        }

        //TODO captcha
        if (!$this->get_error_count()) {
            $user_data_db = User::get_data_username($username);
            if (!$user_data_db) {
                $this->success = true;
                User::insert_new_user($username, $password);
            } else
                $this->error('Username occupied.');
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

}
