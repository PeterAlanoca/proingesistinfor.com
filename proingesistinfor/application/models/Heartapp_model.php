<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Heartapp_model extends CI_Model {

  function getDate() {
    $query = $this->db->query("select NOW()");
    if($query->num_rows()>0) {
      foreach ($query->result_array() as $row){
        $dato = $row['NOW()'];
      }
    return($dato);
    }
  }

  function insertData($data) {
    $id_user = $this->insertUserID($data['user']);
    for ($i=0; $i < count($data['contacts']); $i++) { 
      $contact = $data['contacts'][$i];
      $contact['id_user'] = $id_user;
      $this->insertContact($contact);
    }
  }

  function insertContact($contact) {
    $this->db->insert('contact', $contact);
  }

  function insertUserID($user) {
    $this->db->insert('user', $user);
    $query = $this->db->query('select id from user order by id desc limit 1');
    $id = $this->getResultArray($query);
    return $id[0]->id;
  }

  function getLastData($id) {
    $query = $this->db->query('select latitude, longitude from location where id_user = '.$id.' order by id desc limit 1');
    $location = $this->getResultArray($query);
    $query = $this->db->query('select pulse, date from location where id_user = '.$id.' order by id desc limit 10');
    $pulse = $this->getResultArray($query);
    $data = array('location' => $location, 'pulse' => $pulse);
    return $data;
  }

  function getRowLocation($id) {
    $query = $this->db->query("select * from location where id_user = ".$id);
    return $this->getResultRows($query);  
  }

  function report($id) {
    $aux = $this->uri->segment(3);
    if ($aux=="") {$aux = 0;}
    $query = $this->db->query("select * from location where id_user = ".$id." order by date desc limit ".$aux.", 30;");
    return $this->getResultArray($query); 
  }

  function getPulse($id) {
    $query = $this->db->query('select * from location where id_user = '.$id.' order by id desc limit 1');
    return $this->getResultArray($query);
  }

  function getUser($email = "", $password = ""){
    $query = $this->db->query('select * from user where email = "'.$email.'" and password = "'.$password.'" limit 1');
    if ($query->num_rows() > 0) {
      $data['user'] = $query->row();
      return $data;
    } else {
      return null;
    }
  }

  function updateUser($id, $user){
    $this->db->where('id', $id);
    $this->db->update('user', $user); 
  }

  function getUserId($id){
    $query = $this->db->query('select * from user where id = '.$id.' limit 1');
    if ($query->num_rows() > 0) {
      $data['user'] = $query->row();
      $data['contacts'] = $this->getContact($query->row()->id);
      return $data;
    } else {
      return null;
    }
  }

  function getContact($id){
    $this->db->where('id_user', $id);
    $query = $this->db->get('contact');
    return $this->getResultArray($query);
  }

  function getResultArray($query){
    if ($query->num_rows() > 0) {   
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return($data);
    }
  }

  function getResultRows($query){
    if($query->num_rows()>0) {
      return $query->num_rows();
    }
  }

} 