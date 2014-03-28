<?php 
	$this->pagination->create_links();
	echo ! empty($pagination) ? '<p id="pagination">' . $pagination . '</p>' : ''; 
	echo '<br />';
  	echo ! empty($table) ? $table : ''; 
	echo '<br />';

if ( ! empty($link))
{
	echo '<p id="bottom_link">';
	foreach($link as $links)
	{
		echo $links . ' ';
	}
	echo '</p>';
}
?>
