<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Get_package extends CI_Controller
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
            $res = $this->db->select('products.*,dlc_category.cat_name')
                                ->from('products')
                                ->join('dlc_category', 'dlc_category.cat_id=products.cat_id')
                                ->order_by('prod_id', 'DESC')
                                ->get()->result_array();

            if (!empty($res)) {
                foreach($res as $value){

                    $image = array();
                    if(!empty($value['prod_image'])){
                        $json = json_decode($value['prod_image']);

                        if(!empty($json)){
                            foreach($json as $img){
                                if($img!=""){
                                    $image[] = base_url(). 'common_uploads/product_images/'. $img;
                                }else{
                                    $image[] = "";
                                }
                            }
                        }
                    }
                    $locations = $value['locations'] != "" ? json_decode($value['locations']) : array();

                    $return_array[] = array(
                        "package_id"    => $value['prod_id'],
                        "package_title" => $value['prod_name'],
                        "package_category"=> $value['cat_name'],
                        "package_image" => $image,
                        "price"         => $value['price'],
                        "offer_price"   => $value['offer_price'],
                        "description"   => $value['description'],
                        "locations"     => $locations,
                        "youtube_url"   => $value['youtube_url'],
                        "data_time"     => getDateFormat($value['data_time'], "y")
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
