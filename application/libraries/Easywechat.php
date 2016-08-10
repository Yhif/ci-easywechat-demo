<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once BASEPATH.'../vendor/autoload.php';

use EasyWeChat\Foundation\Application;

class Easywechat {

	public function server($options)
	{
		$app = new Application($options);

		$server = $app->server;

		// $server->setMessageHandler(function ($message) {
		//     // $message->FromUserName // 用户的 openid
		//     // $message->MsgType // 消息类型：event, text....
		//     return "您好！欢迎关注我!";
		// });

		$response = $server->serve();
		$response->send(); // Laravel 里请使用：return $response;

	}
}
