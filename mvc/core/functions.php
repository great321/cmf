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

function get_homeurl() {
    //todo defined or config
    return 'http://' . $_SERVER['SERVER_NAME'];
}

function change_location($url) {
    header('Location: ' . $url);
}

function print_username() {
    if (User::$username) {
        echo User::$username;
    }
}

function display_unixtime($time){
    //TODO m.d.Y or Y.m.d
    //TODO time shift
    return date("H:i d.m.Y", $time);
}