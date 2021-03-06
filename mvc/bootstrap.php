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

/* TODO Later..
  define('ROOTPATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
  spl_autoload_register('autoload');
  function autoload($name)
  {
  $file = ROOTPATH . 'mvc/controllers/' . $name . '.php';
  if (file_exists($file))
  require_once($file);
  }
 */
require_once 'core/functions.php';
require_once 'core/input.php'; //class later TODO
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

require_once 'core/db.php';
DB::connect();

require_once 'core/user.php';
User::authorize();

require_once 'core/route.php';
Route::start();

