<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Get_category extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->helper('api');
    }    
    
    public function index() {
        $PostData = $this->input->post();
        $return_array = array();

        if(isset($PostData['token']) AND $PostData['token'] == API_TOKEN)
        {
            $res = $this->db->select("*")->from('dlc_category')->order_by("cat_sort", "ASC")->get()->result_array();

            if (!empty($res)) {
                foreach($res as $value){

                    if($value['cat_image']!=""){
                        $image = base_url(). 'common_uploads/category_images/'. $value['cat_image'];
                    }else{
                        $image = "";
                    }

                    $return_array[] = array(
                        "cat_id"         => $value['cat_id'],
                        "cat_name"       => $value['cat_name'],
                        "cat_arabic_name"=> $value['arabic_name'],
                        "cat_image"      => $image,
                        "description"    => $value['description'],
                        "arabic_description"=> $value['arabic_description']
                    );
        
                }

                APISuccess("success", $return_array);
                
            }
            else {
                APIError("Categories not found.");
            }
        }
        else
        {
            APIError("Token Invalid.");    
        }
    }
}
?>