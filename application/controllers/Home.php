<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$this->checkLogin();
		$data = array(
			'page_title' => 'Codeigniter | Home',
			'userDealers' => $this->Home_model->getUserDetailByCond(array('userType' => 1))
		);

		$this->load->view('template/header', $data);
		$this->load->view('pages/index', $data);
		$this->load->view('template/footer');
	}

	public function reistration()
	{
		$data = array(
			'page_title' => 'Codeigniter | Regstration'
		);

		$this->load->view('pages/registration', $data);
	}

	public function submitForm()
	{
		$this->form_validation->set_rules('firstName', 'First name', 'required');
		$this->form_validation->set_rules('lastName', 'Last name', 'required');
		$this->form_validation->set_rules('emailAddress', 'Email', 'trim|required|valid_email|is_unique[usertbl.userEmailAddress]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('userType', 'User Type', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->reistration();
		} else {
			$formData = array(
				'userFirstName' => $this->input->post('firstName'),
				'userLastName' => $this->input->post('lastName'),
				'userEmailAddress' => $this->input->post('emailAddress'),
				'userPassword' => $this->input->post('password'),
				'userType' => $this->input->post('userType')
			);
			$saveId = $this->Home_model->saveFromData($formData);
			$sessionData = array(
				'userId' => $saveId,
				'userType' => $this->input->post('userType'),
			);
			$this->session->set_userdata('codeigniter', $sessionData);
			if ($this->input->post('userType') == 1) {
				redirect(base_url('edit-dealer-info'));
			} else {
				redirect(base_url());
			}
		}
	}

	public function login()
	{
		$data = array(
			'page_title' => 'Codeigniter | Login'
		);

		$this->load->view('pages/login', $data);
	}

	public function loginUser()
	{
		$this->form_validation->set_rules('emailAddress', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			redirect(base_url('login'));
		} else {
			$userDetails = $this->Home_model->getUserDetailByCond(array('userEmailAddress' => $_POST['emailAddress']));
			if ($userDetails) {
				if ($userDetails[0]->userPassword == $_POST['password']) {
					$userType = $userDetails[0]->userType;
					$sessionData = array(
						'userId' => $userDetails[0]->id,
						'userType' => $userType,
					);
					$this->session->set_userdata('codeigniter', $sessionData);
					redirect(base_url(''));
				} else {
					$this->session->set_flashdata('result', 'passworrd not found !!!');
					redirect(base_url('login'));
				}
			} else {
				$this->session->set_flashdata('result', 'User not found !!!');
				redirect(base_url('login'));
			}
		}
	}

	public function editDealerInfo()
	{
		$data = array(
			'page_title' => 'Codeigniter | Edit Dealer Info'
		);

		$this->load->view('pages/editDealerInfo', $data);
	}

	public function updateDealerInfo()
	{
		$this->form_validation->set_rules('userCity', 'city name', 'trim|required');
		$this->form_validation->set_rules('userState', 'state name', 'trim|required');
		$this->form_validation->set_rules('userZip', 'zip code', 'trim|required|numeric|max_length[6]|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			redirect(base_url('edit-dealer-info'));
		} else {
			$userId = $this->session->userdata('codeigniter')['userId'];
			$formData = array(
				'userCity' => $_POST['userCity'],
				'userState' => $_POST['userState'],
				'userZip' => $_POST['userZip'],
			);
			$this->Home_model->updateUserByCond(array('id' => $userId), $formData);
			redirect(base_url(''));
		}
	}

	public function editDealer($param)
	{
		$data = array(
			'page_title' => 'Codeigniter | Edit Dealer Info',
			'userDealer' => $this->Home_model->getUserDetailByCond(array('id' => $param))[0]
		);

		$this->load->view('pages/editDealer', $data);
	}

	public function updateDealer($param)
	{
		$this->form_validation->set_rules('userCity', 'city name', 'trim|required');
		$this->form_validation->set_rules('userState', 'state name', 'trim|required');
		$this->form_validation->set_rules('userZip', 'zip code', 'trim|required|numeric|max_length[6]|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			redirect(base_url('edit-dealer-info'));
		} else {
			$formData = array(
				'userCity' => $_POST['userCity'],
				'userState' => $_POST['userState'],
				'userZip' => $_POST['userZip'],
			);
			$this->Home_model->updateUserByCond(array('id' => $param), $formData);
			redirect(base_url(''));
		}
	}

	public function checkLogin()
	{
		if (!$this->session->has_userdata('codeigniter')) {
			redirect(base_url('login'));
		}
	}

	public function logout()
	{
		if ($this->session->has_userdata('codeigniter')) {
			$this->session->unset_userdata('codeigniter');
		}
		redirect(base_url('login'));
	}

	public function searchDealer()
	{
		if (isset($_POST['searchDealer'])) {
			$like = $_POST['searchDealer'];
			$data = array(
				'page_title' => 'Codeigniter | Home',
				'userDealers' => $this->Home_model->getDealerLike($like)
			);

			$this->load->view('template/header', $data);
			$this->load->view('pages/index', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url());
		}
	}
}
