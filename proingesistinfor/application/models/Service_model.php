<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

	function data(){
        $query = $this->db->get('user');
        return $this->getResultArray($query);
    }

    function login($datauser){
    	$email = $datauser['email'];
    	$password = $datauser['password'];
    	$query = $this->db->query('select * from user where email = "'.$email.'" and password = "'.$password.'" limit 1');
		if ($query->num_rows() > 0) {
            $data['user'] = $query->row();
            $data['contact'] = $this->getContact($query->row()->id);
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

    function insertData($location){
        $location['date'] = $this->getDate();
        $this->db->insert('location', $location);
    }

    function getDate() {
        $query = $this->db->query("select NOW()");
        if($query->num_rows()>0) {
            foreach ($query->result_array() as $row){
                $dato = $row['NOW()'];
            }
        return($dato);
        }
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
