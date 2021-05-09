<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		//load database in autoload libraries 
		parent::__construct();
		$this->load->model('User');
	}
	public function index()
	{
		$this->load->library('pagination');

		$userModel = new User;

		$config['base_url'] = base_url() . 'users/index';

		$config['total_rows'] = $userModel->countRows();

		$config['per_page'] = 5;

		$config['uri_segment'] = 3;

		$config['full_tag_open'] = '<ul class="pagination">';

		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['first_tag_open'] = '<li>';

		$config['first_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';

		$config['prev_tag_open'] = '<li class="prev">';

		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';

		$config['next_tag_open'] = '<li>';

		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li>';

		$config['last_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';

		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';

		$config['num_tag_close'] = '</li>';



		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$this->pagination->initialize($config);

		$data['links'] = $this->pagination->create_links();
		$filterData['limit'] = $config['per_page'];
		$filterData['start'] = $page;

		$data['data'] = $userModel->getRows('', $filterData);
		$this->load->view('layout/header');
		$this->load->view('users/list', $data);
		$this->load->view('layout/footer');
	}
	public function create()
	{
		$this->load->view('layout/header');
		$this->load->view('users/create');
		$this->load->view('layout/footer');
	}
	/**
	 * Store Data from this method.
	 *
	 * @return Response
	 */
	public function store()
	{
		$userModel = new User;
		if ($userModel->checkUser($_REQUEST['email']) == FALSE) {
			$userModel->insert($_REQUEST);
		}
		redirect(base_url('users'));
	}
	/**
	 * Edit Data from this method.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$userModel = new User;
		$user = $userModel->getRows($id);
		$this->load->view('layout/header');
		$this->load->view('users/edit', array('user' => $user));
		$this->load->view('layout/footer');
	}
	/**
	 * Update Data from this method.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$userModel = new User;
		$userModel->update($_REQUEST, $id);
		redirect(base_url('users'));
	}
	/**
	 * Delete Data from this method.
	 *
	 * @return Response
	 */
	public function delete($id)
	{
		$userModel = new User;
		$userModel->delete($id);
		redirect(base_url('users'));
	}
}
