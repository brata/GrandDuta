<?php
/**
 * Login_model Class
 *
 * @author	Awan Pribadi Basuki <awan_pribadi@yahoo.com>
 */
class Login_model extends CI_Model {
	/**
	 * Constructor
	 */
	function Login_model()
	{
		parent::__Construct();
	}
	
	// Inisialisasi nama tabel user
	var $table = 's_user';
	
	/**
	 * Cek tabel user, apakah ada user dengan username dan password tertentu
	 */
function check_user($username, $password, $posisi)
	{
		$query = $this->db->get_where($this->table, array('usrNama' => $username, 'usrPassword' => $password, 'namaGroup'=> $posisi), 1, 0);
		
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
//	function get_posisi_all()
//	{
//		$sql = "select * from tbl_posisi";
//		return 	$this->db->query($sql);
//	}
	
	function getPosisi()
	{
		$result = array();

		$sql = "select distinct(namaGroup) from s_user";
		$array_keys_values = $this->db->query($sql);

        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Posisi-';
            $result[$row->namaGroup]= $row->namaGroup;
        }
        
        return $result;
	}
	
	function getLoket($username)
	{
		//$result = array();

		$sql = "select usrProfil from s_user where usrNama = '" . $username ."'";
		return $this->db->query($sql);
        
	}
}
// END Login_model Class

/* End of file login_model.php */ 
/* Location: ./system/application/model/login_model.php */