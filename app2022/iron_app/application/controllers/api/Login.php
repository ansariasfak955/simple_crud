<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->helper('api');
    }    
    
    public function index() {
        $PostData = $this->input->post();

        if(isset($PostData['token']) AND $PostData['token'] == API_TOKEN)
        {
            if(isset($PostData['email']) AND $PostData['email'] != "" AND 
                isset($PostData['password']) AND $PostData['password'] != "")
            {
                $checkUser = $this->db->select("*")->from('dlc_user')
                                    ->where("user_email", $PostData['email'])
                                    ->where("user_password", $PostData['password'])
                                    ->get()->row_array();

                if (!empty($checkUser)) {
                    if($checkUser['user_status'] == 1){

                        $return_array = array(
                            "user_id"         => $checkUser['user_id'],
                            "user_name"       => $checkUser['user_fname']." ". $checkUser['user_lname'],
                            "user_email"      => $checkUser['user_email'],
                            "user_contact"    => $checkUser['user_contact'],
                            "address"         => $checkUser['address']
                        );
    
                        APISuccess("Login successfully", $return_array);
                    } else {
                        APIError("Your account has been deactivated.");
                    }

                } else {
                    APIError("Username and password wrong.");
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
?>