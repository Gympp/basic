<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Prasad
 * Date: 9/29/13
 * Time: 3:16 PM
 * To change this template use File | Settings | File Templates.
 */
require_once( 'Database.php' );

class Location extends Database
{
    function __construct ()
    {
        parent::__construct();
    }
    public function getAllLocations()
    {
    
        $this->db->select('main_location.location_image_home as location_image_home,
        main_location.main_location_name as main_location_name,
        main_location.main_location_color as main_location_color,
        main_location.main_location_seo_title as main_location_seo_title,
        main_location.main_location_id as main_location_id,
        COUNT( product.product_id ) as product_count')
        ->from('product')
        ->join('sub_location', 'product.sub_location_id = sub_location.sub_location_id')
        ->join('main_location', 'main_location.main_location_id = sub_location.main_location_id')
        ->group_by('main_location.main_location_id')
        ->order_by('product_count', 'desc')
        ->where(array('main_location.main_location_status' => 1));
        return $this->getResultArray($this->db->get());
    }
}