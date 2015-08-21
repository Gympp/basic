<?php

require_once( 'Database.php' );

class Trainer extends Database
{
    function __construct ()
    {
        parent::__construct();
    }

    public function getTrainerEducation($trainerId)
    {
       
        $this->db->select('*')->from('user')
             ->join('trainer_education','trainer_education.trainer_id = user.user_id')
             ->where(array('trainer_education.trainer_id' => $trainerId));
             

        return $this->getResultArray($this->db->get());
    }
    public function getTrainerExperience($trainerId)
    {
        $this->db->select('*')->from('trainer_experience')
             ->join('gym','gym.gym_id = trainer_experience.gym_id')
             ->where(array('trainer_experience.trainer_id' => $trainerId));
       
        return $this->getResultArray($this->db->get());

    }

    public function getTrainerService($trainerId)
    {
        
        $this->db->select('*')->from('trainer_details')
             ->where(array('trainer_id' => $trainerId));
   
        $services = $this->db->get()->row_array();
 
        if(!empty($services['services']))
        {
               $this->db->select('*')->from('service')
                   ->where_in(array('id' => implode(',', (array)$services['services'])));
        }

              return $this->getResultArray($this->db->get());
    }

    public function getTrainerReview($trainerId)
    {
        $this->db->select('*')->from('review')
             ->where(array('type_id' => $trainerId))
             ->where(array('type' => '2'));

        return $this->getResultArray($this->db->get());

    }

}

