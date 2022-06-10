<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Promocodes_model extends CI_Model{
    function __construct() {
        $this->tableName = ' promo_codes';
       
        $this->primaryKey = 'id';
  
    }
    public function get_product_by_date($F_date,$T_date)
    {
      $F_date = date("Y-m-d", strtotime($F_date));
      $T_date = date("Y-m-d", strtotime($T_date));

      return $this->db->select('p_f.*,p.prod_name,p.prod_image                               ,u.user_fname,u.user_lname')
                        ->from('product_favorite as p_f')
                      ->join('products as p','p.prod_id=p_f.prod_id')
                      ->join('dlc_user as u','u.user_id=p_f.user_id')
                      ->where("p_f.cus_date BETWEEN '{$F_date}' AND '{$T_date}'")
                      // ->where('p_f.date >=', $F_date)
                      // ->where('p_f.date <=', $T_date)
                      ->order_by('p_f.prod_id', 'DESC')
                      ->get()
                      ->result();
    }
    public function select_all_products($prod_name)
    {
      return $this->db->select('p_f.*,p.prod_name,p.prod_image                               ,u.user_fname,u.user_lname')
                        ->from('product_favorite as p_f')
                      ->join('products as p','p.prod_id=p_f.prod_id')
                      ->join('dlc_user as u','u.user_id=p_f.user_id')
                      ->where("p.prod_name like '%$prod_name%'")
                      ->order_by('prod_id', 'DESC')
                      ->get()
                      ->result(); 
    }
     public function view_favorite()
      {
        return $this->db->select('p_f.*,p.prod_name,p.prod_image                               ,u.user_fname,u.user_lname')
                        ->from('product_favorite as p_f')
                      ->join('products as p','p.prod_id=p_f.prod_id')
                      ->join('dlc_user as u','u.user_id=p_f.user_id')
                      ->get()
                      ->result();
      }
public function get_promo()

    {
      return $this->db->select('id,promo_code,message,start_date,end_date,no_of_users,minimum_order_amount,discount,discount_type,max_discount_amount,repeat_usage,no_of_repeat_usage,status')->get('promo_codes')->result();
    }

    public function add_promocode_data($data)
    {
      return $this->db->insert('promo_codes',$data);
    }
    public function add_product_gallary($data)
    {
      return $this->db->insert('product_gallary',$data);

    }
    public function get_product_gallary($prod_id)
    {
      return $this->db->where('prod_id',$prod_id)
                      ->get('product_gallary')
                      ->result();
    }
    public function update_product_gallary($data,$id)
    {
      return $this->db->where('id',$id)->update('product_gallary',$data);
    }
     public function delete_promocode($id)
    {
      return $this->db->where('id',$id)->delete('promo_codes');
    }
     public function edit_gallary($id)
    {
      return $this->db->where('id',$id)->get('product_gallary')->row();
    }

    public function get_products(){
      $query=$this->db->select('products.*,dlc_category.cat_name')
                      ->from('products')
                      ->join('dlc_category','dlc_category.cat_id=products.cat_id')
                      ->order_by('prod_id','DESC')
                       ->get(); 
      return $query->result();
    }
    public function edit_promocode($id)
    {
      $product= $this->db->select('id,promo_code,message,start_date,end_date,no_of_users,minimum_order_amount,discount,discount_type,max_discount_amount,repeat_usage,no_of_repeat_usage,status','apply_packages')
                      ->from('promo_codes')
                      ->where('id',$id)
                      ->get()
                      ->row();                       
      return $product;
     
    }
   
    public function update_status($data,$prod_id)
  {

    $this->db->where('prod_id',$prod_id);
    $this->db->update('products',$data);
  }

     public function delete_product($prod_id)
    {
      return $this->db->where('prod_id',$prod_id)
                      ->delete('products');
    }
     public function update_product_data($prod_id,$data)
    {
      return $this->db->where('prod_id',$prod_id)
                      ->update('products',$data);
      }
     
  
  
}
