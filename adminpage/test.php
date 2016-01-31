<?php
	//"26/09/2015"
	$d = new DateTime();
	$s = \DateTime::createFromFormat('d/m/Y', "21/09/2015");
	$e = \DateTime::createFromFormat('d/m/Y', "30/09/2015");
	$date = $d->format('d/m/Y');
	$start = $s->format('d/m/Y');
	$end = $e->format('d/m/Y');
	//print $date->format('m-d-Y');

	/*if($date->format('m-d-Y') < $converted->format('m-d-Y')){
		print 'Sakto';
	}
	else{
		print 'Sayup';
	}*/
	if ($date >= $end) {
		print $date.' '.$start.' '.$end;
	} else { 
		print 'Sayup';
	}
?>
