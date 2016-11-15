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

  function getUser($email = "", $password = ""){
    $query = $this->db->query('select * from user where email = "'.$email.'" and password = "'.$password.'" limit 1');
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
}