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

class View {

    function generate($content_view, $template_view, $data = null) {
        require('mvc/views/' . $template_view);
        // or die('Cannot include '.$template_view. '! #'.$content_view);
    }

    static function include_view() {
        require 'mvc/views/' . $content_view;
    }

}
