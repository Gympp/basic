<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller
{

    public function __construct ()
    {
        parent::__construct();
        $this->load->model('user', 'User');
        $this->load->model('location', 'Location');
        $this->output->enable_profiler(true);
        $this->data['active_main_locations'] = $this->Location->getAllLocations();
    }
    
    public function index ()
    {
        $this->data['coverImageType'] = 'home';
        $views                        = array('content' => 'home');
        $this->load_structure($views);
    }

    function logout()
    {
        if (session_id()) {
            session_destroy();
        }
        setcookie ("guid", "", time() - 3600);
        header('Location: /');exit;
    }

    public function users($userName)
    {
        $this->data['userDetails'] = array();
        if (!empty($userName))
        {
            $this->data['userDetails'] = $this->User->getUserDataByUserName($userName);
            if (!empty($this->data['userDetails']))
            {
                $userLocationInfo = $this->User->getUserLocationInfo($userName);
                if (!empty($userLocationInfo))
                {
                    $this->data['userDetails'] = array_merge($userLocationInfo, $this->data['userDetails']);
                }
                $this->data['reviews'] = $this->User->getReviewsByUserId($this->data['userDetails']['user_id']);
            
                $this->data['coverImageType'] = 'user';
                $views = array('content' => 'user_profile');
                $this->load_structure($views);
            }
            else
            {
                show_404();
            }
        }
        else
        {
            show_404();
        }
    }
}