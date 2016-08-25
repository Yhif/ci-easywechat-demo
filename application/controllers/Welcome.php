<?php defined('BASEPATH') OR exit('No direct script access allowed');

use EasyWeChat\Foundation\Application;

class Welcome extends CI_Controller {

	private static $options = [
	    'debug'  => true,
	    'app_id' => 'wx12ffc15640d65980',
	    'secret' => 'bb863fb05ab69b9622e534697d120d78',
	    'token'  => 'partybool_wechat',
	    'aes_key' => 'u4ZdS06uF5ELEvvzpFshXxqM9PBzhABtxjlyoOW4HMv', // 可选
	    'log' => [
	        'level' => 'debug',
	        'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
	    ]
	];

	private static $app;

	public function __construct()
	{
		parent::__construct();
		self::$app = new Application(self::$options);
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function server()
	{
		
		$server = self::$app->server;

		$server->setMessageHandler(function ($message) {
		    // $message->FromUserName // 用户的 openid
		    // $message->MsgType // 消息类型：event, text....
		    switch ($message->MsgType) {
		    	case 'event':
		    		if ($message->Event == 'subscribe')
		    			$msg = '终于等到你，还好我没放弃。';
		    		break;
		    	case 'text':
		    		$msg = '消息已收到。';
		    		break;
		    	case 'image':
		    		$msg = '照骗已收到。';
		    		break;
		    	case 'voice':
		    		$msg = '中国好声音。';
		    		break;
		    	case 'video':
		    		$msg = '大视频已收到。';
		    		break;
		    	case 'shortvideo':
		    		$msg = '小丫小呀小视频。';
		    		break;
		    	case 'location':
		    		$msg = '我已经知道你在哪，马上去找你哦。';
		    		break;
		    	case 'link':
		    		$msg = '链接已收到。';
		    		break;
		    	default:
		    		$msg = '消息已收到，谢谢反馈。';
		    		break;
		    }

		    return $msg;
		});

		$response = $server->serve();
		$response->send(); // Laravel 里请使用：return $response;
	}

	public function set_menu()
	{
		$menu = self::$app->menu;

		$buttons = [
		    [
		        "type" => "click",
		        "name" => "今日歌曲",
		        "key"  => "V1001_TODAY_MUSIC"
		    ],
		    [
		        "name"       => "菜单",
		        "sub_button" => [
		            [
		                "type" => "view",
		                "name" => "搜索",
		                "url"  => "http://www.soso.com/"
		            ],
		            [
		                "type" => "view",
		                "name" => "视频",
		                "url"  => "http://v.qq.com/"
		            ],
		            [
		                "type" => "click",
		                "name" => "赞一下我们",
		                "key" => "V1001_GOOD"
		            ],
		        ],
		    ],
		];

		$menu->add($buttons);
	}

	public function article()
	{

		$data['articles'] = Article::where('id', '>', 0)->get();

		// $data['article'] = Article::first();

		$this->load->view('articles', $data);
	}
}
