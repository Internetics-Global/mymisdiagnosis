<?php namespace App\Controllers;

use App\Libraries\GroceryCrud;

use App\Libraries\InterneticsLibrary;

use App\Models\InterneticsModel;

class Auth extends \IonAuth\Controllers\Auth
{

    /**
     * This is replacing functionality in app/ThirdParty/IonAuth/Controllers/Auth.php etc
     * and references the template at app/views/auth_internetics
     *  
     */
protected $viewsFolder = 'Views\auth';

public function index()
{
	if (! $this->ionAuth->loggedIn())
	{
		// redirect them to the login page
		return redirect()->to('/auth/login');
	}
	else if (! $this->ionAuth->isAdmin()) // remove this elseif if you want to enable this for non-admins
	{
		// redirect them to the home page because they must be an administrator to view this
		//show_error('You must be an administrator to view this page.');
		throw new \Exception('You must be an administrator to view this page.');
	}
	else
	{
		$this->data['title'] = lang('Auth.index_heading');

		// set the flash data error message if there is one
		$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : $this->session->getFlashdata('message');
		//list the users
		$this->data['users'] = $this->ionAuth->users()->result();
		foreach ($this->data['users'] as $k => $user)
		{
			$this->data['users'][$k]->groups = $this->ionAuth->getUsersGroups($user->id)->getResult();
		}
		return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'index', $this->data);
	}
}





public function login()
{
	$this->data['title'] = lang('Auth.login_heading');

	// validate form input
	$this->validation->setRule('identity', str_replace(':', '', lang('Auth.login_identity_label')), 'required');
	$this->validation->setRule('password', str_replace(':', '', lang('Auth.login_password_label')), 'required');

	if ($this->request->getPost() && $this->validation->withRequest($this->request)->run())
	{
		// check to see if the user is logging in
		// check for "remember me"
		$remember = (bool)$this->request->getVar('remember');

		if ($this->ionAuth->login($this->request->getVar('identity'), $this->request->getVar('password'), $remember))
		{
			//if the login is successful
			//redirect them back to the home page
			$this->session->setFlashdata('message', $this->ionAuth->messages());
			return redirect()->to('/')->withCookies();
		}
		else
		{
			// if the login was un-successful
			// redirect them back to the login page
			$this->session->setFlashdata('message', $this->ionAuth->errors($this->validationListTemplate));
			// use redirects instead of loading views for compatibility with MY_Controller libraries
			return redirect()->back()->withInput();
		}
	}
	else
	{
		// the user is not logging in so display the login page
		// set the flash data error message if there is one
		$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : $this->session->getFlashdata('message');

		$this->data['identity'] = [
			'name'  => 'identity',
			'id'    => 'identity',
			'type'  => 'text',
			'value' => set_value('identity'),
			'class' => 'form-control',
		];

		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class' => 'form-control',
		];

		return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'login', $this->data);
	}
}




public function register_user()
{
	$this->data['title'] = lang('Auth.create_user_heading');



	$tables                        = $this->configIonAuth->tables;
	$identityColumn                = $this->configIonAuth->identity;
	$this->data['identity_column'] = $identityColumn;

	// validate form input
	$this->validation->setRule('first_name', lang('Auth.create_user_validation_fname_label'), 'trim|required');
	$this->validation->setRule('last_name', lang('Auth.create_user_validation_lname_label'), 'trim|required');
	if ($identityColumn !== 'email')
	{
		$this->validation->setRule('identity', lang('Auth.create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identityColumn . ']');
		$this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email');
	}
	else
	{
		$this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
	}
	
	$this->validation->setRule('phone', lang('Auth.create_user_validation_phone_label'), 'trim');
	$this->validation->setRule('company', lang('Auth.create_user_validation_company_label'), 'required|trim|is_unique[' . $tables['users'] . '.company]');
	$this->validation->setRule('password', lang('Auth.create_user_validation_password_label'), 'required|min_length[' . $this->configIonAuth->minPasswordLength . ']|matches[password_confirm]');
	$this->validation->setRule('password_confirm', lang('Auth.create_user_validation_password_confirm_label'), 'required');

	if ($this->request->getPost() && $this->validation->withRequest($this->request)->run())
	{
		$email    = strtolower($this->request->getPost('email'));
		$identity = ($identityColumn === 'email') ? $email : $this->request->getPost('identity');
		$password = $this->request->getPost('password');

		$additionalData = [
			'first_name' => $this->request->getPost('first_name'),
			'last_name'  => $this->request->getPost('last_name'),
			'company'    => $this->request->getPost('company'),
			'phone'      => $this->request->getPost('phone'),
			'user_folder'      => $this->request->getPost('user_folder'),
		];
	}
	if ($this->request->getPost() && $this->validation->withRequest($this->request)->run() && $this->ionAuth->register($identity, $password, $email, $additionalData))
	{
		// check to see if we are creating the user
		// redirect them back to the admin page
		$this->session->setFlashdata('message', $this->ionAuth->messages());
		return redirect()->to('/auth/register_user');
	}
	else
	{
		// display the create user form
		// set the flash data error message if there is one
		$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : ($this->ionAuth->errors($this->validationListTemplate) ? $this->ionAuth->errors($this->validationListTemplate) : $this->session->getFlashdata('message'));

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => set_value('first_name'),
			'class' => 'form-control',
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => set_value('last_name'),
			'class' => 'form-control',
		];
		$this->data['identity'] = [
			'name'  => 'identity',
			'id'    => 'identity',
			'type'  => 'text',
			'value' => set_value('identity'),
			'class' => 'form-control',
		];
		$this->data['email'] = [
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'email',
			'value' => set_value('email'),
			'class' => 'form-control',
		];
		$this->data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => set_value('company'),
			'class' => 'form-control',
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => set_value('phone'),
			'class' => 'form-control',
		];
		$this->data['password'] = [
			'name'  => 'password',
			'id'    => 'password',
			'type'  => 'password',
			'value' => set_value('password'),
			'class' => 'form-control',
		];
		$this->data['password_confirm'] = [
			'name'  => 'password_confirm',
			'id'    => 'password_confirm',
			'type'  => 'password',
			'value' => set_value('password_confirm'),
			'class' => 'form-control',
		];
		$this->data['user_folder'] = [
			'name'  => 'user_folder',
			'id'    => 'user_folder',
			'type'  => 'text',
			'value' => set_value('user_folder'),
			'class' => 'form-control',
		];
$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : $this->session->getFlashdata('message');
		return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'register_user', $this->data);
		
		
		
		
	
		
		
		
		
		
		
		
		
		
		
		
	}
}



/**
	 * Create a new user
	 *
	 * @return string|\CodeIgniter\HTTP\RedirectResponse
	 */
	public function create_user()
	{
		$this->data['title'] = lang('Auth.create_user_heading');

		if (! $this->ionAuth->loggedIn() || ! $this->ionAuth->isAdmin())
		{
			return redirect()->to('/auth');
		}

		$tables                        = $this->configIonAuth->tables;
		$identityColumn                = $this->configIonAuth->identity;
		$this->data['identity_column'] = $identityColumn;

		// validate form input
		$this->validation->setRule('first_name', lang('Auth.create_user_validation_fname_label'), 'trim|required');
		$this->validation->setRule('last_name', lang('Auth.create_user_validation_lname_label'), 'trim|required');
		if ($identityColumn !== 'email')
		{
			$this->validation->setRule('identity', lang('Auth.create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identityColumn . ']');
			$this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->validation->setRule('phone', lang('Auth.create_user_validation_phone_label'), 'trim');
		$this->validation->setRule('company', lang('Auth.create_user_validation_company_label'), 'required|trim|is_unique[' . $tables['users'] . '.company]');
		$this->validation->setRule('password', lang('Auth.create_user_validation_password_label'), 'required|min_length[' . $this->configIonAuth->minPasswordLength . ']|matches[password_confirm]');
		$this->validation->setRule('password_confirm', lang('Auth.create_user_validation_password_confirm_label'), 'required');

		if ($this->request->getPost() && $this->validation->withRequest($this->request)->run())
		{
			$email    = strtolower($this->request->getPost('email'));
			$identity = ($identityColumn === 'email') ? $email : $this->request->getPost('identity');
			$password = $this->request->getPost('password');

			$additionalData = [
				'first_name' => $this->request->getPost('first_name'),
				'last_name'  => $this->request->getPost('last_name'),
				'company'    => $this->request->getPost('company'),
				'phone'      => $this->request->getPost('phone'),
				'user_folder'      => $this->request->getPost('user_folder'),
			];
		}
		if ($this->request->getPost() && $this->validation->withRequest($this->request)->run() && $this->ionAuth->register($identity, $password, $email, $additionalData))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->setFlashdata('message', $this->ionAuth->messages());
			return redirect()->to('/auth');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : ($this->ionAuth->errors($this->validationListTemplate) ? $this->ionAuth->errors($this->validationListTemplate) : $this->session->getFlashdata('message'));

			$this->data['first_name'] = [
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => set_value('first_name'),
				'class' => 'form-control',
			];
			$this->data['last_name'] = [
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => set_value('last_name'),
				'class' => 'form-control',
			];
			$this->data['identity'] = [
				'name'  => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => set_value('identity'),
				'class' => 'form-control',
			];
			$this->data['email'] = [
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'email',
				'value' => set_value('email'),
				'class' => 'form-control',
			];
			$this->data['company'] = [
				'name'  => 'company',
				'id'    => 'company',
				'type'  => 'text',
				'value' => set_value('display_name'),
				'class' => 'form-control',
			];
			$this->data['phone'] = [
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => set_value('phone'),
				'class' => 'form-control',
			];
			$this->data['password'] = [
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => set_value('password'),
				'class' => 'form-control',
			];
			$this->data['password_confirm'] = [
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => set_value('password_confirm'),
				'class' => 'form-control',
			];
			$this->data['user_folder'] = [
				'name'  => 'user_folder',
				'id'    => 'user_folder',
				'type'  => 'text',
				'value' => set_value('user_folder'),
				'class' => 'form-control',
			];

			return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'create_user', $this->data);
		}
	}

	/**
	 * Redirect a user checking if is admin
	 *
	 * @return \CodeIgniter\HTTP\RedirectResponse
	 */
	public function redirectUser()
	{
		if ($this->ionAuth->isAdmin())
		{
			return redirect()->to('/auth');
		}
		return redirect()->to('/');
	}

	/**
	 * Edit a user
	 *
	 * @param integer $id User id
	 *
	 * @return string string|\CodeIgniter\HTTP\RedirectResponse
	 */
	public function edit_user(int $id)
	{
		$this->data['title'] = lang('Auth.edit_user_heading');

		if (! $this->ionAuth->loggedIn() || (! $this->ionAuth->isAdmin() && ! ($this->ionAuth->user()->row()->id == $id)))
		{
			return redirect()->to('/auth');
		}

		$user          = $this->ionAuth->user($id)->row();
		$groups        = $this->ionAuth->groups()->resultArray();
		$currentGroups = $this->ionAuth->getUsersGroups($id)->getResult();

		if (! empty($_POST))
		{
			// validate form input
			$this->validation->setRule('first_name', lang('Auth.edit_user_validation_fname_label'), 'trim|required');
			$this->validation->setRule('last_name', lang('Auth.edit_user_validation_lname_label'), 'trim|required');
//			$this->validation->setRule('phone', lang('Auth.edit_user_validation_phone_label'), 'trim|required');
			$this->validation->setRule('company', lang('Auth.edit_user_validation_company_label'), 'trim|required');

			// do we have a valid request?
			if ($id !== $this->request->getPost('id', FILTER_VALIDATE_INT))
			{
				//show_error(lang('Auth.error_security'));
				throw new \Exception(lang('Auth.error_security'));
			}

			// update the password if it was posted
			if ($this->request->getPost('password'))
			{
				$this->validation->setRule('password', lang('Auth.edit_user_validation_password_label'), 'required|min_length[' . $this->configIonAuth->minPasswordLength . ']|matches[password_confirm]');
				$this->validation->setRule('password_confirm', lang('Auth.edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->request->getPost() && $this->validation->withRequest($this->request)->run())
			{
				$data = [
					'first_name' => $this->request->getPost('first_name'),
					'last_name'  => $this->request->getPost('last_name'),
					'company'    => $this->request->getPost('company'),
					'phone'      => $this->request->getPost('phone'),
				];

				// update the password if it was posted
				if ($this->request->getPost('password'))
				{
					$data['password'] = $this->request->getPost('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ionAuth->isAdmin())
				{
					// Update the groups user belongs to
					$groupData = $this->request->getPost('groups');

					if (! empty($groupData))
					{
						$this->ionAuth->removeFromGroup('', $id);

						foreach ($groupData as $grp)
						{
							$this->ionAuth->addToGroup($grp, $id);
						}
					}
				}

				// check to see if we are updating the user
				if ($this->ionAuth->update($user->id, $data))
				{
					$this->session->setFlashdata('message', $this->ionAuth->messages());
				}
				else
				{
					$this->session->setFlashdata('message', $this->ionAuth->errors($this->validationListTemplate));
				}
				// redirect them back to the admin page if admin, or to the base url if non admin
//				return $this->redirectUser();
				return redirect()->to('/auth/edit_user/' . $id .'');
			}
		}

		// display the edit user form

		// set the flash data error message if there is one
		$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : ($this->ionAuth->errors($this->validationListTemplate) ? $this->ionAuth->errors($this->validationListTemplate) : $this->session->getFlashdata('message'));

		// pass the user to the view
		$this->data['user']          = $user;
		$this->data['groups']        = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => set_value('first_name', $user->first_name ?: ''),
			'class' => 'form-control',
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => set_value('last_name', $user->last_name ?: ''),
			'class' => 'form-control',
		];
		$this->data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => set_value('company', empty($user->display_name) ? '' : $user->company),
			'class' => 'form-control',
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => set_value('phone', empty($user->phone) ? '' : $user->phone),
			'class' => 'form-control',
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class' => 'form-control',
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class' => 'form-control',
		];
		$this->data['ionAuth'] = $this->ionAuth;

		return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'edit_user', $this->data);
	}








protected function renderPage(string $view, $data = null, bool $returnHtml = true): string
	{
		$viewdata = $data ?: $this->data;

		$viewHtml = view($view, $viewdata);
		
		

		if ($returnHtml)
		
		{

//		return $viewHtml;
//		echo $viewHtml;

		$data['htmltoshow'] = $viewHtml;
		$data['meta_title'] = "myMisdiagnosis.com";
		$data['meta_description'] = "myMisdiagnosis.com";
		$data['type_of_page'] = "auth";
		
		

//		print_r($data['htmltoshow']);
//		print_r($this->data);

//			return view('auth_internetics/template', $this->data);
			
			echo view('auth_internetics/header_open_with_scripts', $data);
			echo view('auth_internetics/header_with_nav', $data);
			echo view('auth_internetics/header', $data);
			echo view('auth_internetics/template', $data);
			return view('auth_internetics/footer');
			
			
		}
		else
		{
			echo $viewHtml;
		}
	}

		
    





}

