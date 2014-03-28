<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url().'images/fav_icon.png';?>" />
<style type="text/css">@import url("<?php echo base_url() . 'css/layout.css'; ?>");</style>
<!-- <style type="text/css">@import url("<?php echo base_url() . 'css/screen.css'; ?>");</style> -->
<title><?php echo isset($title) ? $title : ''; ?></title>
</head>

<body id="<?php echo isset($title) ? $title : ''; ?>">
<!-- ####################################################################################################### -->
<div class="wrapper col2">

  <div id="header">
    <div class="fl_left">
      <h1><a href="#">Grand Duta </a></h1>
      <p>Sistem Informasi Penagihan IPKL</p>
    </div>
    <div class="fl_right"> <a href="#"><img src="<?php echo base_url().'/asset/images/demo/468x60.gif'?>" alt="" /></a> </div>
    <br class="clear" />
  </div>
</div> 	
<!-- ####################################################################################################### -->	

<div class="wrapper col3">
	<div id="topnav">
		 <?php $this->load->view($menu_utama);?>
	</div>
</div> 
<div class="clear"></div> 
<!-- ####################################################################################################### -->

<div class="wrapper col5">
  <div id="container">
  
		<!--Start of left content-->  
    	<div id="content">
    	<img src="<?php echo base_url().'css/images/bullet1.gif';?>" alt="" title="" />
		<?php echo $h2_title;	echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';?>
        <?php $this->load->view($main_view); ?>  

		</div>
		<!--end of left content--> 
		
		<div id="column">
      		<div class="holder">
        	<h2>Flash Info</h2>
        		<ul id="latestnews">
 		            <p>
 						Hari ini Pukul 15.00 kita akan melaksanakan meeting untuk membahas progress tindaklanjut surat masuk.
 					</p> 
        		</ul>
      		</div>
      		<br>
      		<div class="holder">
        	<h2>Sub Menu</h2>
        		<ul id="menukanan">
					<?php $this->load->view($left_view);?>
        		</ul>
      		</div>
      		<br>
      		<div class="holder">
        	<h2>Profil Pengguna</h2>
        		<ul id="latestnews">
             		<center><?php echo 'Nama Pengguna : ' . $user .''; ?></center>
             		<center><?php echo 'Posisi Pengguna : ' . $posisi .''; ?></center>
             		<center><?php echo 'Tanggal :' . $tgl.''; ?></center>
             		<center><?php echo 'Loket :' . $loket.''; ?></center>
        		</ul>
      		</div>
    	</div>    
	    <br class="clear" />
	</div>
</div>
<!-- ####################################################################################################### -->

<div class="wrapper col7">
	<div id="copyright">
    	<p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">Trias Bratakusuma</a></p>
    	<p class="fl_right">Powered by <a href="http://www.randsoft.com/" title="Randsoft Ciptatama">Randsoft Corp.</a></p>
    	<br class="clear" />
	</div>
</div>
</body>
</html>