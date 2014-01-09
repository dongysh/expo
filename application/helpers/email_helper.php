<?php

function sendEmails($mail_to, $mail_subject, $mail_message, $mail_from, $mail_name='')
{
    $CI = & get_instance();
    $CI->load->library('email');
    $config['protocol'] = 'sendmail';
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
    $CI->email->initialize($config);
    
    $CI->email->from($mail_from, $mail_name);
    $CI->email->to($mail_to);
    $CI->email->subject($mail_subject);
    $CI->email->message($mail_message);
    $CI->email->send();
    $CI->email->clear();
}

?>