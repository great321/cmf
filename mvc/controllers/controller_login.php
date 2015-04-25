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

class Controller_Login extends Controller {

    private $input;
    private $submit;

    function __construct() {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function action_index() {
        $this->input();
        $this->model->set_input($this->input);
        $this->model->set_submit($this->submit);
        $data = $this->model->get_data();
        if ($data['success'])
            change_location(get_homeurl());
        else
            $this->view->generate('login_view.php', 'template_view.php', $data);
    }

    function input() {
        $this->input['username'] = Input::get_post('username');
        $this->input['password'] = Input::get_post('password');
        $this->submit = isset($_POST['submit']) ? true : false;
    }

}
