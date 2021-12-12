<?php namespace App\Controllers;

class Auth extends \IonAuth\Controllers\Auth
{

    /**
     * This is replacing functionality in app/ThirdParty/IonAuth/Controllers/Auth.php etc
     * and references the template at app/views/auth_internetics
     *  
     */


protected function renderPage(string $view, $data = null, bool $returnHtml = true): string
	{
		$viewdata = $data ?: $this->data;

		$viewHtml = view($view, $viewdata);
		
		

		if ($returnHtml)
		
		{

//		return $viewHtml;
//		echo $viewHtml;

		$this->data['htmltoshow'] = $viewHtml;

//		print_r($data['htmltoshow']);
//		print_r($this->data);

			return view('auth_internetics/template', $this->data);
		}
		else
		{
			echo $viewHtml;
		}
	}

		
    





}

