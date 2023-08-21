<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('Database');
		$data['blogs'] = $this->Database->getBlogs();
		$data['Category'] = $this->Database->getCategory();
		$this->load->view('layout/main',$data);
	}
	
	public function login(){
		
		$this->load->view('layout/login');
	}

	public function user(){

		$this->load->model('Database');
		$data['users'] = $this->Database->getUsers();
		$this->load->view('layout/admin',$data);
	}

	public function blogs(){
		$this->load->model('Database');
		$data['blogs'] = $this->Database->getBlogs();
		$data['Category'] = $this->Database->getCategory();
		$this->load->view('layout/blogs',$data);
	}

	// public function blogsByCategory(){
	// 	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cate'])) {
	// 		$cate = $_POST['cate'];
	// 		$this->load->model('Database');
	// 		$data['Category'] = $this->Database->getCategory();
	// 		$data['blogs'] = $this->Database->getBlogsByCategory($cate);
	// 		$this->load->view('layout/main',$data);
	// 	}
	// }

	public function category(){
		$this->load->model('Database');
		$data['Category'] = $this->Database->getCategory();
		$this->load->view('layout/Categories',$data);
	}

}
?>