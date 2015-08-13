<?php

require_once( 'Database.php' );

class Trainer extends Database
{
    function __construct ()
    {
        parent::__construct();
    }

    public function getTrainerId($userId)
    {
    	$this->db->select('trainer_id')->from('trainers')
             ->where(array('user_id' => $userId));
        return $this->db->get()->row_array();
    }

    public function getTrainerEducation($trainerId)
    {

    	$this->db->select('count(*) as count,trainer_education.type')->from('trainers')
             ->join('trainer_education','trainer_education.trainer_id = trainers.trainer_id')
             ->where(array('trainer_education.trainer_id' => $trainerId))
             ->group_by('trainer_education.type');
      
        return $this->getResultArray($this->db->get());
    }
    public function getTrainerExperience($trainerId)
    {
        $this->db->select('*')->from('trainer_experience')
             ->join('gym','gym.gym_id = trainer_experience.gym_id')
             ->where(array('trainer_experience.trainer_id' => $trainerId));
       
        return $this->getResultArray($this->db->get());

    }

    public function getTrainerCategory($trainerId)
    {
         $this->db->select('*')->from('trainer_category')
             ->join('categories','categories.category_id = trainer_category.category_id')
             ->where(array('trainer_category.trainer_id' => $trainerId));

              return $this->getResultArray($this->db->get());
    }


}

