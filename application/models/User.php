<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        //load database library
        $this->load->database();
    }

    /*
     * Fetch user data
     */
    function getRows($id = "", $filterData = array())
    {
        extract($filterData);
        if (!empty($id)) {
            $query = $this->db->select('`id`, `first_name`, `last_name`, `email`, `gender`, `ip_address`, `genres`, `misc`')->get_where('users', array('id' => $id));
            return $query->row_array();
        } else {

            $this->db->select('`id`, `first_name`, `last_name`, `email`, `gender`, `ip_address`, `genres`, `misc`');
            if (!empty($gender))
                $this->db->where('gender', $gender);
            if (!empty($search))
                $this->db->where("(first_name='$search' OR `email`='$search' OR ip_address='$search')");
            if (!empty($limit))
                $this->db->limit($limit, $start);

            $query = $this->db->get('users');
            return $query->result_array();
        }
    }

    function countRows()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function checkUser($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->num_rows();
    }


    /*
     * Insert user data
     */
    public function insert($data = array())
    {
        try {
            $insert = $this->db->insert('users', $data);
            if ($insert) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /*
     * Update user data
     */
    public function update($data, $id)
    {
        if (!empty($data) && !empty($id)) {
            $update = $this->db->update('users', $data, array('id' => $id));
            return $update ? true : false;
        } else {
            return false;
        }
    }

    /*
     * Delete user data
     */
    public function delete($id)
    {
        $delete = $this->db->delete('users', array('id' => $id));
        return $delete ? true : false;
    }
}
