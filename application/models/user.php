<?php
/**
 * Created by PhpStorm.
 * User: Prasad
 * Date: 1/25/15
 * Time: 1:50 PM
 */

require_once( 'Database.php' );

class User extends Database
{
    function __construct ()
    {
        parent::__construct();
    }

    public function checkUser($userData)
    {
        $user = $this->db->get_where('user',array('user_email' => $userData['email']))->row_array();
        return $user;
    }

    public function getUserByLoginData($loginData)
    {
        $this->db->select('user_id, user_sub_location_id as user_sub_location_id,user_username as username, user_full_name as full_name')->from('user')
            ->or_where(array('user_email' => $loginData['emailId'], 'user_username'=>md5($loginData['username'])))
            ->where(array('user_password'=>md5($loginData['password'])));
        return $this->db->get()->row_array();
    }

    public function getUserDataByUserName($userName)
    {
        $this->db->select('*')->from('user')
             ->where(array('user_username' => $userName));
        return $this->db->get()->row_array();
    }
	
	public function getUserLocationInfo($userName)
	{
	    $this->db->select('*')->from('user')
		->join('sub_location', 'sub_location.sub_location_id = user.user_sub_location_id')
        ->join('main_location', 'main_location.main_location_id = sub_location.main_location_id')
		->where(array('user_username' => $userName));
		return $this->db->get()->row_array();
	}

    public function getReviewsByUserId($userId)
    {
        $this->db->select('*')->from('product_review')
            ->join('product', 'product.product_id = product_review.product_id')
            ->join('user', 'user.user_id = product_review.user_id')
            ->where(array('product_review.user_id' => $userId, 'review_status' => 1))
            ->order_by('review_created_date','ASC');

        $reviews = $this->db->get();
        return $this->getResultArray($reviews);
    }
}