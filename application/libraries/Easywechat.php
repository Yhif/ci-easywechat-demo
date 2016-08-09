<?php defined('BASEPATH') or exit('No direct script access allowed');

require BASEPATH.'../vendor/autoload.php';

use EasyWeChat\Foundation\Application;

class Easywechat {

	public function server($options)
	{
		$app = new Application($options);
		$response = $app->server->serve();
		// 将响应输出
		return $response->send();
	}
}
