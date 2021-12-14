<?php namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{
    public $useCiEmail  = true; // Send Email using the builtin CI email class, if false it will return the code 
    public $siteTitle                = 'myMisdiagnosis.com';       // Site Title, example.com
    public $adminEmail               = 'comms@mymisdiagnosis.com'; // Admin Email, admin@example.com

    
}




 