<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        //load user model
        $this->load->model('user');
    }

    public function user_get($id = 0)
    {
        $filterData = array();
        $filterData['search'] = !empty($this->get('search')) ? $this->get('search') : '';
        $filterData['gender'] = !empty($this->get('gender')) ? $this->get('gender') : '';
        $filterData['limit'] = !empty($this->get('limit')) ? $this->get('limit') : 0;
        $page = !empty($this->get('page')) ? $this->get('page') : 1;
        if (!empty($filterData['limit']))
            $filterData['start'] = ($page - 1) * $filterData['limit'];
        //returns all rows if the id parameter doesn't exist,
        //otherwise single row will be returned
        $users = $this->user->getRows($id, $filterData);

        //check if the user data exists
        if (!empty($users)) {
            //set the response and exit
            $this->response($users, REST_Controller::HTTP_OK);
        } else {
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No user were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function user_post()
    {
        $userData = array();
        $userData['first_name'] = $this->post('first_name');
        $userData['last_name'] = $this->post('last_name');
        $userData['email'] = $this->post('email');
        $userData['gender'] = $this->post('gender');
        $userData['ip_address'] = $this->post('ip_address');
        $userData['genres'] = $this->post('genres');
        $userData['misc'] = !empty($this->post('misc')) ? $this->post('misc') : '';

        if (!empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['gender']) && !empty($userData['ip_address']) && !empty($userData['genres']) && isset($userData['misc'])) {
            if ($this->user->checkUser($userData['email']) == FALSE) {
                $insert = $this->user->insert($userData);

                //check if the user data inserted
                if ($insert) {
                    //set the response and exit
                    $this->response([
                        'status' => TRUE,
                        'message' => 'User has been added successfully.'
                    ], REST_Controller::HTTP_OK);
                } else {
                    //set the response and exit
                    $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                //set the response and exit
                $this->response("Email address already exist please check it.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            //set the response and exit
            $this->response("Provide complete user information to create.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_put()
    {
        $userData = array();
        $id = $this->put('id');
        $userData['first_name'] = $this->put('first_name');
        $userData['last_name'] = $this->put('last_name');
        $userData['email'] = $this->put('email');
        $userData['gender'] = $this->put('gender');
        $userData['ip_address'] = $this->put('ip_address');
        $userData['genres'] = $this->put('genres');
        $userData['misc'] = !empty($this->put('misc')) ? $this->put('misc') : '';

        if (!empty($userData['first_name']) && !empty($userData['last_name']) && !empty($userData['email']) && !empty($userData['gender']) && !empty($userData['ip_address']) && !empty($userData['genres']) && isset($userData['misc'])) {
            //update user data
            $update = $this->user->update($userData, $id);

            //check if the user data updated
            if ($update) {
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been updated successfully.'
                ], REST_Controller::HTTP_OK);
            } else {
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            //set the response and exit
            $this->response("Provide complete user information to update.", REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function user_delete($id)
    {
        //check whether post id is not empty
        if ($id) {
            //delete post
            $delete = $this->user->delete($id);

            if ($delete) {
                //set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'User has been removed successfully.'
                ], REST_Controller::HTTP_OK);
            } else {
                //set the response and exit
                $this->response("Some problems occurred, please try again.", REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            //set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No user were found.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
