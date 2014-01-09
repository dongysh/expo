<?
function img_src($file_name) {
	$img_src_code = 'src="'.base_url().'webroot/images/'.$file_name.'"';
	echo $img_src_code;
}

function	 js($file_name) {
	$js_code = '<script type="text/javascript" src="'.base_url().'webroot/javascripts/'.$file_name.'.js"></script>';
	echo $js_code;
}

function css($file_name) {
	$css_code = '<link rel="stylesheet" type="text/css" href="'.base_url().'webroot/stylesheets/'.$file_name.'.css" />';
	echo $css_code;
}
