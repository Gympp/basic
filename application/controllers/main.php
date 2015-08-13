<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller
{

    public function __construct ()
    {
        parent::__construct();
        $this->load->model('user', 'User');
        //$this->load->model('location', 'Location');
        $this->load->model('trainer', 'Trainer');
        $this->load->model('user_type', 'User_type');
        $this->output->enable_profiler(true);
       // $this->data['active_main_locations'] = $this->Location->getAllLocations();
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
            $type = $this->User_type->user($userName);
            if($type['user_type'] == 1)
            {
                $this->regular_user($userName);
            }
            elseif ($type['user_type'] == 2) 
            {
                $this->trainer($userName);
            }

        }
        else
        {
            show_404();
        }
    }

    public function trainer($trainerName)
    {
        
        $this->data['trainerDetails'] = array();
         $this->data['trainerDetails'] = $this->User->getUserDataByUserName($trainerName);
          if (!empty($this->data['trainerDetails']))
            {
                $trainerId = $this->Trainer->getTrainerId($this->data['trainerDetails']['user_id']);

               $trainerLocationInfo = $this->User->getUserLocationInfo($trainerName);
                if (!empty($trainerLocationInfo))
                {
                    $this->data['trainerDetails'] = array_merge($trainerLocationInfo, $this->data['trainerDetails']);
                }
                $trainerId = $trainerId['trainer_id'];
                $trainerEducationstats = $this->Trainer->getTrainerEducation($trainerId,1);
                if(!empty($trainerEducation))
                {
                if($trainerEducation[0]['type'] == 'association')
                {
                    $this->data['trainerDetails']['no_of_association'] = $trainerEducation[0]['count'];
                }
                elseif ($trainerEducation[0]['type'] == 'certification') 
                {
                    $this->data['trainerDetails']['no_of_certification'] = $trainerEducation[0]['count'];
                }
                if (array_key_exists('1', $trainerEducation)) {
                    $this->data['trainerDetails']['no_of_certification'] = $trainerEducation[1]['count'];
                } 
                }
                $this->data['trainerEducation'] = $this->Trainer->getTrainerEducation($trainerId,0);

                $this->data['trainerExperience'] = $this->Trainer->getTrainerExperience($trainerId);
                $this->data['trainerCategory'] = $this->Trainer->getTrainerCategory($trainerId);
                $this->data['trainerReview'] = $this->Trainer->getTrainerReview($trainerId);

            }
            else
            {
                show_404();
            }
    }

    public function regular_user($userName)
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
}