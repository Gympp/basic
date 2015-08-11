<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Prasad
 * Date: 9/29/13
 * Time: 7:39 PM
 * To change this template use File | Settings | File Templates.
 */

class MY_Controller extends CI_Controller
{
    public $structure = array();
    public $data      = array();

    function __construct()
    {
        parent::__construct();
		//$this->output->enable_profiler(TRUE);


        $this->structure['header'] = 'header';
        $this->structure['footer'] = 'footer';		
    }
	
	public function checkFacebookLoginStatus()
	{
		if (!empty($_COOKIE['guid']))
		{
			# User info ok? Let's print it (Here we will be adding the login and registering routines)
			$this->load->model('user', 'User');
			$userNameFromCookie = base64_decode($_COOKIE['guid']);
			
			$userData = $this->User->getUserDataByUserName($userNameFromCookie);
			if(!empty($userData))
			{
				$this->setUserSessionData($userData);
			}
		}
	}

    public function load_structure($views = array())
    {
        $this->load->view(TEMPLATE . DIRECTORY_SEPARATOR . COMMON . DIRECTORY_SEPARATOR . $this->structure['header'], $this->data);
        foreach($views as $view){
            $this->load->view(TEMPLATE . DIRECTORY_SEPARATOR . $view, $this->data);
        }
        $this->load->view(TEMPLATE . DIRECTORY_SEPARATOR . COMMON . DIRECTORY_SEPARATOR . $this->structure['footer'], $this->data);
    }

    public function setUserSessionData($userData)
    {
        foreach($userData as $key => $value)
        {
            $_SESSION[$key] = $value;
        }
    }

    public function getUserSessionData()
    {
        return $_SESSION;
    }
}