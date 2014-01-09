<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 多语言支持
 * Created by PhpStorm.
 * User: henry
 * Date: 11/15/13
 * Time: 3:49 PM
 */

function getLocale() {
    $CI =& get_instance();
    $cookie_locale = $CI->input->cookie('locale', TRUE);
    $current_locale = $CI->config->item('default_locale');
    if (in_array($cookie_locale, $CI->config->item('acceptable_languages'))) {
        $current_locale = $cookie_locale;
    } else if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $language_parse);
        if (count($language_parse[1])) {
            foreach ($language_parse[1] as $language) {
                foreach ($CI->config->item('acceptable_languages') as $acceptable_language => $locale) {
                    if (strpos($language, $acceptable_language) === 0) {
                        $current_locale = $locale;
                    }
                }
            }
        }
    }

    define('PACKAGE', 'messages');
    putenv('LANG='.$current_locale);
    setlocale(LC_ALL, $current_locale);
    bindtextdomain(PACKAGE, $CI->config->item('locale_path'));
    textdomain(PACKAGE);

    return $current_locale;
}