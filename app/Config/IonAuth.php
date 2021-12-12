<?php namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{
    public $useCiEmail  = false; // Send Email using the builtin CI email class, if false it will return the code and the identity
    public $emailConfig = [
        'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mymisdiagnosis@gmail.com',
            'smtp_pass' => 'lCgLqHrqv6hA',
            'mailtype' => 'html',
            'charset' => 'UTF-8'
    ];
}