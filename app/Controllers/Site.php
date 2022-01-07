<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Site extends BaseController
{
	public function loadRecord()
	{
		$request = service('request');
		$searchData = $request->getGet(); // OR $this->request->getGet();

		$search = "";
		if (isset($searchData) && isset($searchData['search'])) {
			$search = $searchData['search'];
		}

		// Get data 
		$users = new User();

		if ($search == '') {
			$paginateData = $users->paginate(3);
		} else {
			$paginateData = $users->select('*')
				->orLike('record_misdiagnosis', $search)
				->orLike('record_symptoms', $search)    			
				->paginate(3);
		}

		$data = [
			'users' => $paginateData,
			'pager' => $users->pager,
			'search' => $search
		];

		return view('users', $data);
	}
}