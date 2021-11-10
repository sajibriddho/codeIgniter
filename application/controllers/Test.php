<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	public function index()
	{
		$this->load->model("T_test");
		$this->load->view('test/test');
	}
}
