<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$options = [
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

		// 加载类
        $this->load->library('easywechat');

        echo $this->easywechat->server($options);

	}
}
