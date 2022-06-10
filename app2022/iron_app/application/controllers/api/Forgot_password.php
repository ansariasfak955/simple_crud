<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->helper('api');
    }    
    
    public function index() {
        $PostData = $this->input->post();

        if(isset($PostData['token']) AND $PostData['token'] == API_TOKEN)
        {
            if(isset($PostData['email']) AND $PostData['email'] != "")
            {
                $checkEmail = $this->db->select("*")->from('dlc_user')->where("user_email", $PostData['email'])->get()->row_array();

                if (!empty($checkEmail)) {
                    
                    $new_password = rand(10000000, 99999999);

                    $update_array = array(
                        "user_password"   => $new_password
                    );
                        
                    $this->db->where('user_id', $checkEmail['user_id'])->update('dlc_user', $update_array);

                    $to = $PostData['email'];
                    $subject = "dlc.com";
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= "From: http://webbinart.com";

                    $content = "Dear " . $checkEmail['user_fname'] . ",<br><br>";
                    $content .= "Forgot your password?. Don't worry, we are here to help you your account.<br><br>";
                    $content .= "Please see below login detail with new password.<br><br>";
                    $content .= "Email Address : " . $checkEmail['user_email'] . "<br>";
                    $content .= "New Password : " . $new_password . "<br><br>";

                    $content .= "Thank you";

                    $mail_sent = mail($to, $subject, $content, $headers);

                    if ($mail_sent) {
                        APISuccess("New password send to your registered email address."); 
                    }else{
                        APIError("Email not send.");
                    }

                    

                } else {
                    APIError("Email not registered.");
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