<?php
/**
 * About Us Class
 *
 * @author	Trias Bratakusuma <bratatkr@gmail.com>
 */
class Aboutus extends CI_Controller {
	/**
	 * Constructor
	 */
	function aboutus()
	{
		parent::__Construct();
		$this->load->model('Home_model', '', TRUE);
	}
	
	var $title = 'Tentang Kami';
	
	/**
	 * Memeriksa user state, jika dalam keadaan login akan menjalankan fungsi main()
	 * jika tidak akan meredirect ke halaman login
	 */
	function index()
	{
		if ($this->session->userdata('login') == TRUE)
		{
			$this->main();
		}
		else
		{
			redirect('login');
		}
	}
	
	/**
	 * Menampilkan halaman utama rekap absen
	 */
	function main()
	{
		$data['title'] = $this->title;
		$data['h2_title'] = 'Tentang Kami';
		
		$posisi = $this->session->userdata('posisi');

			Switch($posisi){
				case "Operator Loket":
					//echo "No BPS";
					$data['menu_utama'] = 'menuutamaloket.php';
					break;
				case "Administrator":	
					//echo "Tahun";
					$data['menu_utama'] = 'menuutamaadmin.php';
					break;
				case "Cicilan":
					//echo "No BPS dan Tahun";
					$data['menu_utama'] = 'menuutamacicilan.php';
					break;
				case "Operator Stand Meter":
					//echo "No BPS";
					$data['menu_utama'] = 'menuutamaopsm.php';
					break;
				case "Pembatalan":	
					//echo "Tahun";
					$data['menu_utama'] = 'menuutamapembatalan.php';
					break;
				case "Supervisor":
					//echo "No BPS dan Tahun";
					$data['menu_utama'] = 'menuutamaspv.php';
					break;
				case "Services":
					//echo "No BPS";
					$data['menu_utama'] = 'menuutamaservices.php';
					break;
				case "Yan-Gan":	
					//echo "Tahun";
					$data['menu_utama'] = 'menuutamayg.php';
					break;
			}		

		$data['main_view'] = 'home/tentangkami';
		$data['left_view'] = 'menuhome.php';
		$data['user'] = $this->session->userdata('username');
		$data['posisi'] = $this->session->userdata('posisi');
		$data['tgl'] = date('j'.'/'.'m'.'/'.'Y');
		IF($this->session->userdata('posisi') == "Operator Loket"){
			$data['loket'] = $this->session->userdata('loket');
		} 
		else
		{
			$data['loket'] = "Aplikasi Non Loket";	
		}
				
		$this->load->view('template', $data);
	}
}
