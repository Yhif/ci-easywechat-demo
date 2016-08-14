<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Eloquent Class
 */
class Eloquent {

	public function __construct()
	{
		// 载入数据库配置文件
		require_once APPPATH . 'config/database.php';

		// Eloquent ORM
		$capsule = new Capsule;

		$capsule->addConnection($db['eloquent']);

		$capsule->bootEloquent();
	}
}
