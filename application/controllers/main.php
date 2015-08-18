    <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Main extends MY_Controller
    {

        public function __construct ()
        {
            parent::__construct();
            $this->load->model('user', 'User');
            $this->load->model('location', 'Location');
            $this->load->model('trainer', 'Trainer');
            $this->output->enable_profiler(true);
            $this->data['active_main_locations'] = $this->Location->getAllLocations();
        }
        
        public function index ()
        {
            $this->data['coverImageType'] = 'home';
            $views                        = array('content' => 'home');
            $this->load_structure($views);
        }

        public function _remap($userName)
        {
            $this->data['userType'] = $this->User->userType($userName);
            if(!empty($this->data['userType']) && $this->data['userType']['user_type'] == '1')
            {
                $this->users($userName);
            }
            elseif ($this->data['userType']['user_type'] == '2') 
            {
                $this->trainer($userName);
            }
            
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



    public function trainer($trainerName)
    {
        $certification = 0;
        $association = 0;
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
                    $trainerEducation = $this->Trainer->getTrainerEducation($trainerId);
                    
                    if(!empty($trainerEducation))
                    {
                        foreach ($trainerEducation as $key) 
                        {
                            if($key['type'] == 'certification')
                            {
                                $certification = $certification + 1;
                            }
                            elseif ($key['type'] == 'association')
                            { 
                                $association = $association + 1;
                            }
                        }
                        $this->data['trainerDetails']['certification'] = $certification;
                        $this->data['trainerDetails']['association'] = $association;
                        $this->data['trainerDetails']['trainerEducation'] = $trainerEducation;
                    }
                   
                    $this->data['trainerExperience'] = $this->Trainer->getTrainerExperience($trainerId);
                    $this->data['trainerCategory'] = $this->Trainer->getTrainerCategory($trainerId);
                    $this->data['trainerReview'] = $this->Trainer->getTrainerReview($trainerId);
                }
                else
                {
                    show_404();
                }
            }

        }