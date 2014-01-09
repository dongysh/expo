<?
if(!isset($seo['title']) || $seo['title'] == '') {
	$seo['title'] = 'global-expo';
}
if(!isset($seo['keywords']) || $seo['keywords'] == '') {
	$seo['keywords'] = 'global-expo';
}
if(!isset($seo['description']) || $seo['description'] == '') {
	$seo['description'] = 'global-expo';
}
?>
<title><?=$seo['title']?></title>
<meta name="keywords" content="<?=$seo['keywords']?>" />
<meta name="description" content="<?=$seo['description']?>" />