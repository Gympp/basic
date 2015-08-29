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
             ->where(array('trainer_id' => $trainerId));
       
        return $this->getResultArray($this->db->get());

    }

    public function getTrainerService($trainerId)
    {
        
        $this->db->select('*')->from('trainer_details')
             ->join('location','location.city_id = trainer_details.city_id')
             ->join('service','trainer_details.service_id = service.id')
             ->where(array('trainer_id' => $trainerId));
   
       /* $services = $this->db->get()->row_array();
 
        if(!empty($services['services']))
        {
               $this->db->select('*')->from('service')
                   ->where_in(array('id' => implode(',', (array)$services['services'])));
        }*/

              return $this->getResultArray($this->db->get());
    }

    public function getTrainerReview($trainerId)
    {
        $this->db->select('*')->from('review')
             ->join('user','user.user_id = review.user_id')
             ->where(array('type_id' => $trainerId))
             ->where(array('type' => '2'));

        return $this->getResultArray($this->db->get());

    }

    public function getTrainerDetails($trainerId)
    {
        $this->db->select('age,experience,dob')->from('trainer_details')
             ->where(array('trainer_id' => $trainerId));

              return $this->getResultArray($this->db->get());
    }

}

