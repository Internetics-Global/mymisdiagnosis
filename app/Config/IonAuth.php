<?php namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{

    public $siteTitle                = 'myMisdiagnosis.com';       // Site Title, example.com
    public $adminEmail               = 'comms@mymisdiagnosis.com'; // Admin Email, admin@example.com

    public $identity                 = 'email';             // You can use any unique column in your table as identity column.
    public $emailActivation          = true;               // Email Activation for registration
    
    
    
    
     
    public $useCiEmail  = true; // Send Email using the builtin CI email class, if false it will return the code 
    public $emailConfig = [
        'mailtype' => 'html',
    ];
    
}




 