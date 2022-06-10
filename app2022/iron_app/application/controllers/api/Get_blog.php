<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Get_blog extends CI_Controller
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
            $res = $this->db->select("*")->from('dlc_blog')->get()->result_array();

            if (!empty($res)) {
                foreach($res as $value){

                    if($value['image']!=""){
                        $image = base_url(). 'uploads/blog/'. $value['image'];
                    }else{
                        $image = "";
                    }

                    $return_array[] = array(
                        "blog_id"       => $value['bl_id'],
                        "title"         => $value['title'],
                        "date"          => $value['date'],
                        "image"         => $image,
                        "description"   => $value['description']
                    );
        
                }

                APISuccess("success", $return_array);
                
            }
            else {
                APIError("Blog not found.");
            }
        }
        else
        {
            APIError("Token Invalid.");    
        }
    }
}
