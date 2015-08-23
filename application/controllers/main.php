    <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Main extends MY_Controller
    {

        public function __construct ()
        {
            parent::__construct();
            $this->load->model('user', 'User');
           // $this->load->model('location', 'Location');
            $this->load->model('trainer', 'Trainer');
            //$this->output->enable_profiler(true);
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
               $this->data['userType'] = $this->User->userType($userName);
               $this->data['userDetails'] = $this->User->getUserDataByUserName($userName);
               if (!empty($this->data['userDetails']) && $this->data['userType']['user_type'] == '1')
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
        if(!empty($trainerName))
        {
            $this->data['trainerDetails'] = $this->User->getUserDataByUserName($trainerName);
            $this->data['userType'] = $this->User->userType($trainerName);
            if (!empty($this->data['trainerDetails']) && $this->data['userType']['user_type'] == '2')
            {
                $trainerId = $this->data['trainerDetails']['user_id'];

                   $trainerLocationInfo = $this->User->getUserLocationInfo($trainerName);
                    if (!empty($trainerLocationInfo))
                    {
                        $this->data['trainerDetails'] = array_merge($trainerLocationInfo, $this->data['trainerDetails']);
                    }
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
                    $trainer = $this->Trainer->getTrainerDetails($trainerId);

                    $this->data['trainerDetails']['age'] = $trainer['0']['age'];
                    $this->data['trainerDetails']['experience'] = $trainer['0']['experience'];
                    $this->data['trainerDetails']['dob'] = $trainer['0']['dob'];
                    $this->data['trainerExperience'] = $this->Trainer->getTrainerExperience($trainerId);
                    $this->data['trainerService'] = $this->Trainer->getTrainerService($trainerId);
                    $this->data['trainerReview'] = $this->Trainer->getTrainerReview($trainerId);
                    $this->data['trainerDetails']['average_rating'] = 0;
                    if(!empty($this->data['trainerReview']))
                    {
                        foreach($this->data['trainerReview'] as $review)
                        {
                              $rating[] = $review['review_internal_rating'];
                        }
                        $this->data['trainerDetails']['average_rating'] = array_sum($rating)/count($rating);
                    }
                    $this->data['trainerDetails']['average_rating'] = array_sum($rating)/count($rating);
                    $views = array('content' => 'trainer_profile');
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