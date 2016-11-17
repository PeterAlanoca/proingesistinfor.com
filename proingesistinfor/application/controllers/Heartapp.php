<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Heartapp extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('heartapp_model');
    $this->load->library("googlemaps");
  }

  function index($msg = 1) {
    $data['msg'] = $msg;
    if ($this->unlogged()) {
      $this->load->view('heartapp/heartapp', $data);
    } else {
      redirect('heartapp/panel');

    }
  }

  function registro() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = array(
      'username' => $this->input->post('username'),
      'password' => $password,
      'firstname' => $this->input->post('firstname'),
      'lastname' => $this->input->post('lastname'),
      'photo' =>$this->upload_image('photo'),
      'cover' => $this->upload_image('cover'),
      'email' => $email,
      'cellphone' => $this->input->post('cellphone'),
      'country' => 'Bolivia',
      'city' => $this->input->post('city'),
      'code_qr' => $this->code_qr($email.','.$password)
    );
    $contacts = array(
      0 => array(
        'name' => $this->input->post('nr1'),
        'cellphone' => $this->input->post('phone1') 
      ),
      1 => array(
        'name' => $this->input->post('nr2'),
        'cellphone' => $this->input->post('phone2')
      ),
      2 => array(
        'name' => $this->input->post('nr3'),
        'cellphone' => $this->input->post('phone3') 
      ),
      3 => array(
        'name' => $this->input->post('nr4'),
        'cellphone' => $this->input->post('phone4')  
      )
    );
    $data = array('user' => $user, 'contacts' => $contacts);
    $this->heartapp_model->insertData($data);
    
    $result = $this->heartapp_model->getUser($email, $password);
    $user = $result['user'];
    if ($user != null) {
      if (($user->email == $email) && ($user->password == $password)) {
        $result['logged_in'] = true;
        $this->session->set_userdata('userdata', $result);
        if($this->loggedIn()){
          redirect('heartapp/panel');
        }
      } 
      else {
        $this->index(0);
      }
    }
    else {
      $this->index(0);
    }    
  }

  function panel() {
    if ($this->loggedIn()) {
      $userdata = $this->session->userdata('userdata');
      $userdata = $this->heartapp_model->getUserId($userdata['user']->id);
      $location = $this->heartapp_model->getLastData($userdata['user']->id);  
      $data['user'] = $userdata['user'];
      $data['contacts'] = $userdata['contacts'];
      $data['title'] = 'Panel';
      $data['section'] = $this->uri->segment(2);
      $data['pulse'] = $location['pulse'];
      $data['map'] = $this->create_mapa($location['location'][0]->latitude, $location['location'][0]->longitude);
      $data['view'] = $this->load->view('heartapp/panel', $data, true);   
      $this->view($data);
    }
  }

  function profile(){
    if ($this->loggedIn()) {
      $userdata = $this->session->userdata('userdata');
      $userdata = $this->heartapp_model->getUserId($userdata['user']->id);  
      $data['user'] = $userdata['user'];
      $data['contacts'] = $userdata['contacts'];
      $data['title'] = 'Perfil';
      $data['section'] = $this->uri->segment(2);
      $data['view'] = $this->load->view('heartapp/profile', $data, true);   
      $this->view($data);
    }
  }

  function profile_update(){
    if ($this->loggedIn()) {
      $userdata = $this->session->userdata('userdata');
      $id = $userdata['user']->id;
      $user = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'), 
        'firstname' => $this->input->post('firstname'), 
        'lastname' => $this->input->post('lastname'), 
        'email' => $this->input->post('email'), 
        'cellphone' => $this->input->post('cellphone'), 
        'city' => $this->input->post('city')
      );
      $this->heartapp_model->updateUser($id, $user);
      redirect('heartapp/perfil');
    }
  }

  function report(){
    if ($this->loggedIn()) {
      $userdata = $this->session->userdata('userdata');
      $userdata = $this->heartapp_model->getUserId($userdata['user']->id); 

      $row = $this->heartapp_model->getRowLocation($userdata['user']->id);
      $this->paginar($row, 3, "heartapp/reporte/", 30);

      $report = $this->heartapp_model->report($userdata['user']->id); 


      $data['user'] = $userdata['user'];
      $data['contacts'] = $userdata['contacts'];
      $data['report'] = $report;
      $data['title'] = 'Reporte';
      $data['section'] = $this->uri->segment(2);
      $data['view'] = $this->load->view('heartapp/report', $data, true);   
      $this->view($data);
    }
  }

  function pulse(){
    if ($this->loggedIn()) {
      $userdata = $this->session->userdata('userdata');
      $userdata = $this->heartapp_model->getUserId($userdata['user']->id);  
      $data['user'] = $userdata['user'];
      $data['contacts'] = $userdata['contacts'];
      $data['title'] = 'Pulso cardiaco';
      $data['section'] = $this->uri->segment(2);
      $data['view'] = $this->load->view('heartapp/pulse', $data, true);   
      $this->view($data);
    }
  }

  function get_pulse() {
    if ($this->loggedIn()) {
      $userdata = $this->session->userdata('userdata');
      $data = $this->heartapp_model->getPulse($userdata['user']->id);
      print_r(json_encode($data[0]));
    }
  }

  function map(){
    if ($this->loggedIn()) {
      $userdata = $this->session->userdata('userdata');
      $userdata = $this->heartapp_model->getUserId($userdata['user']->id);
      $location = $this->heartapp_model->getLastData($userdata['user']->id);  
      $data['user'] = $userdata['user'];
      $data['contacts'] = $userdata['contacts'];
      $data['title'] = 'Mapa de ubicación';
      $data['section'] = $this->uri->segment(2);
      $data['map'] = $this->create_mapa($location['location'][0]->latitude, $location['location'][0]->longitude);
      $data['view'] = $this->load->view('heartapp/map', $data, true);   
      $this->view($data);
    }
  }

  function validate(){
    $email = $this->input->post('emaillogin');
    $password = $this->input->post('passwordlogin');
    $result = $this->heartapp_model->getUser($email, $password);
    $user = $result['user'];
    if ($user != null) {
      if (($user->email == $email) && ($user->password == $password)) {
        $result['logged_in'] = true;
        $this->session->set_userdata('userdata', $result);
        if($this->loggedIn()){
          redirect('heartapp/panel');
        }
      } 
      else {
        $this->index(0);
      }
    }
    else {
      $this->index(0);
    }
  }

  function loggedIn(){
    $user_data = $this->session->userdata('userdata');
    if($user_data['logged_in'] && $user_data['user']!=null){
      return true;
    } else {
      redirect(base_url());
      return false;
    }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }

  function unlogged(){
    $user_data = $this->session->userdata('userdata');
    if($user_data['logged_in']==false && $user_data['user']==null){
      return TRUE;
    } else {
      redirect('heartapp/panel');
    }
  }

  function view($data) {
    $this->load->view('heartapp/head', $data);
    $this->load->view('heartapp/content', $data);
    $this->load->view('heartapp/footer', $data);       
  }

  function create_mapa($latitude, $longitude){
    $address = $this->getaddress($latitude, $longitude);
    $position = "".$latitude.', '. $longitude."";
    $config = array();
    $config['apiKey'] = 'AIzaSyCodEBbpjp-f6sCuU7EzjQWy2b7iUzxDqs';    
    $config['center'] = $position;
    $config['zoom'] = '17';
    $config["onload"] = 'window.setTimeout("google.maps.event.trigger(marker_0, \'click\');",300);';
    $this->googlemaps->initialize($config);
    $markers['position'] = $position;
    $markers['infowindow_content']  = $address; 
    $marker['animation']='BOUNCE';
    $this->googlemaps->add_marker($markers);
    $map = $this->googlemaps->create_map();       
    return $map;
  }

 
  function getaddress($lat,$lng){
    $userdata = $this->session->userdata('userdata');
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if ($status=="OK") { 
      $text = $data->results[0]->formatted_address;
      list($street, $city, $country) = explode(',', $text);
      $country = '<center><h3 style="margin:1px" class="text-success"><i class="fa fa-flag"></i>  '.$country.'</h3></center>';
      $city = '<center><h3 style="margin:1px" class="text-info"><i class="glyphicon glyphicon-map-marker"></i> '.$city.'</h3></center>';
      $street = '<center><h4 style="margin:1px" class="text-danger"><i class="glyphicon glyphicon-home"></i> '.$street.'</h4></center>';
      $cellphone = '<center><h3 style="margin:1px" class="text-warning"><i class="glyphicon glyphicon-earphone"></i> '.$userdata['user']->cellphone.'</h3></center>';
      $data = $country.$city.$street.$cellphone;
      return $data;
    } else {
      return false;
    }
  }

  function upload_image($image){
    $path = 'images/profile';
    $name = 'PROFILE';
    if ($image=='cover') {
      $path = 'images/cover';
      $name = 'COVER';
    }
    $date = str_replace(' ', '', $this->heartapp_model->getDate());
    $date = str_replace(':', '', $date);
    $date = str_replace('-', '', $date);
    $config['upload_path'] = $path;
    $config['file_name'] = $name.'-'.$date;
    $config['allowed_types'] = "*";
    $config['max_size'] = "50000";
    $config['max_width'] = "2000";
    $config['max_height'] = "2000";
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($image)) {
        $data['uploadError'] = $this->upload->display_errors();
        //echo $this->upload->display_errors();
        return ;
    }      
    $finfo = $this->upload->data();
    return $finfo['file_name'];
  }

  function code_qr($text){
    $date = str_replace(' ', '', $this->heartapp_model->getDate());
    $date = str_replace(':', '', $date);
    $date = str_replace('-', '', $date);
    $name = 'CODEQR'.$date.'.png';
    $this->load->library('ciqrcode');
    $params['data'] = $text;
    $params['level'] = 'H';
    $params['size'] = 15;
    $params['savename'] = FCPATH.'images/code_qr/'.$name;
    $this->ciqrcode->generate($params); 
    return $name;
  }

  function paginar($filas, $segment, $url, $por_pagina){
    $this->load->library('pagination'); //Cargamos la librería de paginación
    $config['base_url'] = base_url().$url; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
    $config['per_page'] = $por_pagina; //Número de registros mostrados por páginas
    $config['num_links'] = 5; //Número de links mostrados en la paginación
    $config['first_link'] = 'Primera';//primer link
    $config['last_link'] = 'Última';//último link
    $config["uri_segment"] = $segment;//el segmento de la paginación
    $config['next_link'] = 'Siguiente';//siguiente link
    $config['prev_link'] = 'Anterior';
    $config['total_rows'] =$filas;//anterior link
    $this->pagination->initialize($config);
  }
}