<?php
	if(file_exists('users.xml'))
	{
		$xml=simplexml_load_file('users.xml');
	}else
	{
		exit('Could not load the file...');
	}

	echo '<pre>';
	print_r($xml);
	echo $xml->normal->name[3].' '.$xml->normal->pass[3];

?>