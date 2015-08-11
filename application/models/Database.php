<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Prasad
 * Date: 9/29/13
 * Time: 3:16 PM
 * To change this template use File | Settings | File Templates.
 * echo $this->db->last_query();
 */
class Database extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getResultArray($query)
    {
        $result = array();
		if ($query->num_rows() > 0)
        {
			foreach($query->result_array() as $row)
			{
				$result[] = $row;
			}
		}
		return $result;
    }
}