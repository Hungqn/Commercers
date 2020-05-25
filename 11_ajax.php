<?php
$file = "countries.csv";

$query = $_POST['query'];

$result = [];

if (($handle = fopen($file, "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 0, ',')) !== FALSE) {
		if ((strpos($data[0], $query) !== false) || strpos($data[1], $query) !== false) {
			$str = str_replace($query,'<b style="color: red">'.$query.'</b>',$data[0]).', ';
			$str .= str_replace($query,'<b style="color: red">'.$query.'</b>',$data[1]);
			$result['html'][] = $str;
		}
	}
	fclose($handle);
}

if(!empty($result['html'])){
    $result['error'] = false;
} else {
    $result['error'] = true;
}

echo json_encode($result);