<?php //error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Childcategory extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Childcategory_model');
    }    

  //     public function childcategory()
  // {
  //   $this->load->model('Childcategory_model');
  //    $data['views']=$this->Childcategory_model->selectchilddata();
  //    // $data['view']=$this->Childcategory_model->selesubdata();
  //    // $data['vieww']=$this->Childcategory_model->selectdata();
  //   $this->load->view('view_childcategory',$data);
  // }


    public function childcategory() { 
            $config = array();
 
       $config["base_url"] = base_url() . "Childcategory/childcategory";
 
       $config["total_rows"] = $this->Childcategory_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["views"] = $this->Childcategory_model->
 
           fetch_departments($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

      $this->load->view('view_childcategory', $data);
        }



  function addchild(){
        if($this->input->post('submit')){
            $this->load->model('Childcategory_model');

   
            
            if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/childcategory/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }
            }else{
                $image = '';
            }
 

   $userData = array(
          
          'childcat_name'=>$this->input->post('name'),
          'sbcat_id'=>$this->input->post('subcategory_id'),
          'cat_id'=>$this->input->post('category_id'),
          'childcat_image' => $image
            );
            
            $insertUserData = $this->Childcategory_model->insertchild($userData);
          
          if($insertUserData){
         $this->session->set_flashdata('success_msg', 'Category have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
           
        }
     
        redirect('Childcategory/childcategory'); 
    }


   public function update_rowchild()
    {
     
          
        $id = $this->input->post('idch');  

        $image = $this->input->post('image') ; 
            
              if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/childcategory/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                    if($this->upload->do_upload('image')){
                        $uploadData = $this->upload->data();
                        $image = $uploadData['file_name'];
                    }else{
                        $image = '';
                    }
              }
              else
              {
                $image = $this->input->post('oldimage') ;   
              }

     

   $data=array(
          'childcat_name'=>$this->input->post('name'),
          'cat_id'=>$this->input->post('category_id'),
          'sbcat_id'=>$this->input->post('sub_id'),
          'childcat_image' => $image
      );
   
        $this->load->model('Childcategory_model');
        $this->Childcategory_model->updatachild($id,$data);
        redirect('Childcategory/childcategory'); 
}
    
      public function deletechild() { 
         $this->load->model('Childcategory_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->Childcategory_model->deletechild($services_id); 
   
       redirect('Childcategory/childcategory'); 
      } 

      public function select_child()
      {
         $idd = $_GET['q'];
         $dataa = $this->Childcategory_model->select_subcategory($idd);
    ?>
     <div class="form-group">
     <select name="subcategory_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                            <!-- <option>Select</option> -->
<?php foreach($dataa as $rocc){ ?>
                   <option value="<?php echo $rocc->sbcat_id;?>"><?php echo $rocc->sbcat_name;?></option><?php }?>

       </select>
     </div>
        
  <?php  }
  public function select_data_edit()
  {
    $ided = $_GET['qd'];
    $data = $this->Childcategory_model->select_subcategory_data($ided);
   
    ?>
     <div class="form-group">
    <select name="sub_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                    <?php  foreach($data as $edtt) { ?>
                                                                      
                  <option value="<?php echo $edtt->sbcat_id;?>"><?php echo $edtt->sbcat_name;?></option>

          <?php }?>
                                             
    </select>
    </div>


    <?php
  }

}