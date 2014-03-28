<?php
/**
 * Login Class
 *
 * @author	Trias Bratakusuma <bratatkr@gmail.com>
 */
class Login extends CI_Controller {
	/**
	 * Constructor
	 */
	function login()
	{
		parent::__Construct();
		$this->load->model('Login_model', '', TRUE);
		$this->load->helper('datecbo');
	}
	
	/**
	 * Memeriksa user state, jika dalam keadaan login akan menampilkan halaman absen,
	 * jika tidak akan meload halaman login
	 */
	function index()
	{
		if ($this->session->userdata('login') == TRUE)
		{
			redirect('home');
		}
		else
		{
			//$posisi = $this->Login_model->get_posisi_all()->result();
			//echo($posisi);			
			//$data['options_posisi'][0]='..:: Pilih Posisi ::..';
			
			//foreach($posisi as $row)
			//	{
					//echo($row->posisi);
			$data['options_posisi'] = $this->Login_model->getPosisi();
//			echo($data['options_posisi'][0]);
//			echo($data['options_posisi'][1]);
//			echo($data['options_posisi'][2]);
//			echo($data['options_posisi'][3]);
					//$data['options_posisi'][$row->idposisi]=$row->posisi;
			//	}
			$this->load->view('login/login_view',$data);
		}
	}
	
	/**
	 * Memproses login
	 */
	function process_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$posisi= $this->input->post('options_posisi');
			
			$loket = $this->Login_model->getLoket($username);
			if($loket->num_rows()>0){
				$lokethasil=$loket->row();
				$dataloket = $lokethasil->loket;
			}
			
			//echo $lokethasil->loket;
			
			if ($this->Login_model->check_user($username, $password,$posisi) == TRUE)
			{
				$data = array('username' => $username,'posisi'=> $posisi, 'loket' => $dataloket,'login' => TRUE);
				$this->session->set_userdata($data);
				redirect('home');
			}
			else
			{
				$this->session->set_flashdata('message', 'Maaf, username dan atau password Anda salah');
				redirect('login/index');
			}
		}
		else
		{
			$this->load->view('login/login_view');
		}
	}
	
	/**
	 * Memproses logout
	 */
	function process_logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
// END Login Class

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */