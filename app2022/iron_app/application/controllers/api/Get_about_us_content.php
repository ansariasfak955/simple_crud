<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Get_about_us_content extends CI_Controller
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
            $res = $this->db->select("*")->from('dlc_pages')->where("page_id", "5")->get()->row_array();
    
            if (!empty($res)) {

                $return_array = array(
                    "page_title"    => $res['page_title'],
                    "page_detail"   => $res['page_detail']
                );
    
                APISuccess("success", $return_array);
                
            }
            else {
                APIError("Content not found.");
            }
        }
        else
        {
            APIError("Token Invalid.");    
        }
    }
}
