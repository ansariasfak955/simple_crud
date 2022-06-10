<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->helper('api');
    }    
    
    public function index() {
        $PostData = $this->input->post();

        if(isset($PostData['token']) AND $PostData['token'] == API_TOKEN)
        {
            if(
                isset($PostData['name']) and $PostData['name'] != "" AND 
                isset($PostData['email']) AND $PostData['email'] != "" AND 
                isset($PostData['password']) AND $PostData['password'] != "" AND 
                isset($PostData['phone']) and $PostData['phone'] != "" AND 
                isset($PostData['region']) and $PostData['region'] != "" AND 
                isset($PostData['city']) and $PostData['city'] != "" AND 
                isset($PostData['area']) and $PostData['area'] != "" AND
                isset($PostData['pincode']) and $PostData['pincode'] != "" AND
                isset($PostData['address']) and $PostData['address'] != "")
            {
                
                $checkEmail = $this->db->from('dlc_user')->where("user_email", $PostData['email'])->count_all_results();

                if ($checkEmail <= 0) {
                
                    $insert_array = array(
                        "user_fname"    => $PostData['name'],
                        "user_email"    => $PostData['user_email'],
                        "user_contact"  => $PostData['user_contact'],
                        "user_password" => $PostData['user_password'],
                        "pincode"       => $PostData['pincode'],
                        "address"       => $PostData['address'],
                        "user_status"   => 1,
                        "date"          => created()
                    );
                        /* "region"        => $PostData['region'],
                        "city"          => $PostData['city'],
                        "area"          => $PostData['area'], */
                    $this->db->insert("dlc_user", $insert_array);
                    $user_id = $this->db->insert_id();

                    $userRes = $this->db->from('dlc_user')->where("user_id", $user_id)->get()->row_array();
                        
                    $return_array = array(
                        "user_id"       => $user_id,
                        "user_name"     => $userRes['user_fname']." ". $userRes['user_lname'],
                        "user_email"    => $userRes['user_email'],
                        "user_contact"  => $userRes['user_contact'],
                        "region"        => $userRes['region'],
                        "city"          => $userRes['city'],
                        "area"          => $userRes['area'],
                        "pincode"       => $userRes['pincode'],
                        "address"       => $userRes['address'],
                        "date"          => getDateFormat($userRes['date'], "y")
                    );
                    
                    APISuccess("User registared successfully", $return_array);

                } else {
                    APIError("Email already registared.");
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