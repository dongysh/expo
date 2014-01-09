<?

function creat_json($data) {
	return json_encode($data);
}

function json($data = array(), $zip = FALSE) {
	header("Content-type: application/json");
	$json = creat_json($data);
	if($zip) {
		header("Content-Encoding: gzip");
		$json = gzencode($json);
	}
	echo $json;
	exit();
}

