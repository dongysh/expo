<?
function industry_link($title) {
	$seo_link = trim($title);
	$seo_link = str_replace(' & ', '-', $seo_link); 
	$seo_link = str_replace(', ', '-', $seo_link);
	$seo_link = str_replace(',', '-', $seo_link);
	$seo_link = str_replace(' ', '-', $seo_link);
	$seo_link = str_replace('\'', '', $seo_link);
	$seo_link = str_replace('/', '-', $seo_link);
	$seo_link = str_replace('%', '-', $seo_link);
	$seo_link = strtolower($seo_link);
	return $seo_link;
}
