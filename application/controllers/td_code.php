<?
/**
 * 
 */
class Td_code extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function show() {
		header("Content-type: image/png");
		$value = $this->input->get('value', TRUE);
		include_once('./webroot/phpqrcode/phpqrcode.php');
		// 纠错级别：L、M、Q、H
		$errorCorrectionLevel = 'L';
		$matrixPointSize = 5;
        if($this->input->get('size', TRUE))
        {
            $matrixPointSize = $this->input->get('size', TRUE);
        }
		$margin = 1;
		QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, $margin);
		exit();
	}
}
