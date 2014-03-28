<?php
/**
 * Info_model Class
 *
 * @author	Trias Bratakusuma <bratatkr@gmail.com>
 */
class Info_model extends CI_Model {
	/**
	 * Constructor
	 */
	function Info_model()
	{
		parent::__Construct();
	}
	
	// Inisialisasi nama tabel absen
	var $table = 'tagihan';
	
	function get_tagihan_info($nosl,$tahun)
	{
		$sql = "select T.idtagihan, P.idipkl, P.nama, P.blok, P.nokav, P.kdgol, T.tahun, T.bulan, T.tagihan, T.loket, T.tanggalbayar from tbl_tagihan T Join tbl_pelanggan P on T.idipkl = P.idipkl where T.idipkl = '$nosl' and T.tahun = '$tahun'";
			
		return $this->db->query($sql);
	}
	
	function get_pelanggan_by_nama($kriteria)
	{
		$kriterianama = '%' . $kriteria . '%';
	
		$sql = "SELECT
				idipkl,
				nama,
				blok,
				nokav,
				kdgol,
				nohp,
				email,
				status
				FROM
				tbl_pelanggan
				WHERE
				nama LIKE '$kriterianama'
				order by nama asc";
			
		return $this->db->query($sql);
	}
	
	function get_pelanggan_by_nama_pag($kriteria,$perPage,$uri) 
	{ 

		$this->db->like('pelnamapelanggan',$kriteria);
		$getData = $this->db->get('pelanggan',$perPage, $uri);
		return $getData;
	}
	
	function get_pelanggan_by_alamat($kriteria)
	{
		$kriterianama = '%' . $kriteria . '%';
	
		$sql = "SELECT
				idipkl,
				nama,
				blok,
				nokav,
				kdgol,
				nohp,
				email,
				status
				FROM
				tbl_pelanggan
				WHERE
				blok LIKE '$kriterianama' OR nokav LIKE '$kriterianama'
				order by nama asc";
			
		return $this->db->query($sql);
	}
	
	function get_transaksilunas($nosl)
	{
		$sql = "SELECT
				tagihan.TagihanTanggalBayar
				FROM
				tagihan
				WHERE
				tagihan.TagihanNoSambungan = '$nosl'
				AND
				tagihan.TagihanStatus = 'lunas'
				order by tagihan.TagihanBulanTagihan asc";
			
		return $this->db->query($sql);
	}
	
	function upd_lunas($nosl)
	{
		$sql = "UPDATE tagihan
					SET tagihanstatus = 'lunas',
					TagihanTanggalBayar = now()
					WHERE 
					TagihanNoSambungan = '$nosl'";
			
		return $this->db->query($sql);
	}
	
	function get_detilplg($nosl)
	{
	$sql = "select PelNoSambungan, PelNamaPelanggan,PelAlamatPelanggan, PelKDWilayah,PelKDGolongan,PelTglPasang,PelDiameterPipa,PelKDWM,PeNoWaterMeter,PelStatus from pelanggan where pelnosambungan = '" . $nosl . "'";
	
	return $this->db->query($sql);
	}
}
// END Absen_model Class

/* End of file absen_model.php */
/* Location: ./system/application/models/absen_model.php */