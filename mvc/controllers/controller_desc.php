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

class Controller_Desc extends Controller {

    public $input;
    public $submit;

    function __construct() {
        $this->model = new Model_Desc();
        $this->view = new View();
    }

    function action_index() {
        $this->input();
        $this->model->set_input($this->input);
        $this->model->set_submit($this->submit);
        $data = $this->model->get_data();
        $this->view->generate('desc_view.php', 'template_view.php', $data);
    }

    function input() {
        $this->input['message'] = Input::get_post('message');
        $this->submit = isset($_POST['submit']) ? true : false;
    }

}
