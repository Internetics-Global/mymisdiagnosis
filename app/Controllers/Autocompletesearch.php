<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;





class AutocompleteSearch extends BaseController
{

public function __construct()
    {
	    helper(['form', 'url']);
    }




public function index() {
	    
	   helper(['form', 'url']);
	   return view('autocomplete');
    }
    public function getTerm() {
 
	   $data = [];
	   $db      = \Config\Database::connect();
	   $builder = $db->table('record_database');   
	   $query = $builder->like('record_misdiagnosis', $this->request->getVar('term'))
				->select('record_id, record_misdiagnosis')
				->limit(10)->get();
	   $data = $query->getResult();
 
	   echo json_encode($data);
    }
  
}




