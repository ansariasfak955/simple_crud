<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Get_blog_detail extends CI_Controller
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
            if (isset($PostData['blog_id']) and $PostData['blog_id'] != ""){

                $res = $this->db->select("*")->from('dlc_blog')->where("bl_id", $PostData['blog_id'])->get()->row_array();
    
                if (!empty($res)) {
                    
                    if($res['image']!=""){
                        $image = base_url(). 'uploads/blog/'. $res['image'];
                    }else{
                        $image = "";
                    }
    
                    $return_array = array(
                        "blog_id"       => $res['bl_id'],
                        "title"         => $res['title'],
                        "date"          => $res['date'],
                        "image"         => $image,
                        "description"   => $res['description']
                    );
        
                    APISuccess("success", $return_array);
                    
                }
                else {
                    APIError("Blog not found.");
                }
            }
            else {
                APIError("Value missing.");    
            }
        }
        else
        {
            APIError("Token Invalid.");    
        }
    }
}
