<?
// function code($path, $font, $num = 4) {
	// $code_num = random_string('alpha', $num);
	// $code_num = strtoupper($code_num);
	// $vals = array(
		// 'word' => $code_num,
		// 'img_path' => $path,
		// 'img_url' => base_url().'webroot/user_upload/code/',
		// 'font_path' => $font,
		// 'img_width' => 150,
		// 'img_height' => 32,
		// 'expiration' => 300
	// );
	// $cap = create_captcha($vals);
	// return array(
		// 'img' => $cap['image'],
		// 'code' => $code_num
	// );
// }

function code($path, $num = 4) {
	$code_num = random_string('alpha', $num);
	$code_num = strtoupper($code_num);
	$vals = array(
		'word' => $code_num,
		'img_path' => $path,
		'img_url' => base_url().'webroot/user_upload/code/',
		'img_width' => 150,
		'img_height' => 32,
		'expiration' => 300
	);
	$cap = create_captcha($vals);
	return array(
		'img' => $cap['image'],
		'code' => $code_num
	);
}
