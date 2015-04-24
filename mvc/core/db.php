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

class DB {

    public $count = 0;

    static function connect() {
        $configpath = 'mvc/config/db.ini';
        $db = parse_ini_file($configpath);

        $db['host'] = isset($db['host']) ? $db['host'] : 'localhost';
        $db['name'] = isset($db['name']) ? $db['name'] : '';
        $db['user'] = isset($db['user']) ? $db['user'] : '';
        $db['pass'] = isset($db['pass']) ? $db['pass'] : '';

        $connect = mysql_connect($db['host'], $db['user'], $db['pass'])
                or die('Cannot connect to database');
        mysql_select_db($db['name'])
                or die('Database does not exist');
        mysql_query("SET NAMES 'utf8'", $connect);
    }

}
