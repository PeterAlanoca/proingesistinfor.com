<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('service_model');
	}

	function index() {
		$data = $this->service_model->data();
		print_r($data);
	}

	function login(){
		$email = $this->input->get('email');
		$password = $this->input->get('password');
		if (($email != null || $email != '') && ($password != null || $password != '')) {
			$datauser = array(
				'email' => $email,
				'password' => $password
			);
			$data = $this->service_model->login($datauser);
			if ($data != null || $data != '') {
				$data = array(
					'state' => 1,
					'user' => $data['user'],
					'contact' => $data['contact']);
				print_r(json_encode($data));
			} else {
				print_r(json_encode(array('state' => 0)));
			}
		} else {
			print_r(json_encode(array('state' => 0)));
		}
	}

	function insertData(){
		$datauser = array(
			'username' => $this->input->get('username'),
			'password' => $this->input->get('password'),
			'name' => $this->input->get('name')
		);

		$this->service_model->insertData($datauser);
	}
}
