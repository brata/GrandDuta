<?php
	//echo ! empty($h2_title) ? '<h2>' . $h2_title . '</h2>': '';
	echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
	echo "<br>";
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">@import url("<?php echo base_url() . 'css/formulir.css'; ?>");</style>
</head>
<br>
<div id="stylized" class="myform">
<form id="form" name="transaksi_form" method="post" action="<?php echo $form_action; ?>">
<label>No. Sambungan
<span class="small">Isikan Nomor SL</span>
</label>
<input type="text" name="nosl" id="nosl" value="<?php echo set_value('nosl'); ?>" size="20"/>

<button type="submit">Cek Tagihan</button>
<div class="spacer"></div>

</form>
</div>
<p>
  <?php echo ! empty($pagination) ? '<p id="pagination">' . $pagination . '</p>' : ''; ?>
  
  <?php echo '<br />';?>
  <?php echo ! empty($table) ? $table : ''; ?>
  <?php echo '<br />';?>
  <?php
if ( ! empty($link))
{
	echo '<p id="bottom_link">';
	foreach($link as $links)
	{
		echo $links . ' ';
	}
	echo '</p>';
}
?></p>
