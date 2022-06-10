<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Package extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Package_model');
        $this->load->model('Common_model', 'cm');
        $this->load->library("pagination");          
    }  
     public function index(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Package/index";
 
       $config["total_rows"] = $this->Package_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $pck = $this->input->post('pack');
 
       $data["view"] = $this->Package_model->
 
           fetch_departments($config["per_page"], $page,$pck);
 
       $data["links"] = $this->pagination->create_links();

       $this->load->view('view_package',$data);
        }


    public function new_package()
      {
        $pack_id = $this->uri->segment(3);
        
        
        
      $data['pack_dtl']    = $TT =  $this->cm->get_data('dlc_new_package_tbl',['pack_new_id'=>$pack_id]);
       $data['pack_videos'] = $this->cm->get_data_orderby ('dlc_new_package_video_tbl',['package_id'=>$pack_id],"v_id");   
       $data['pack_pdfs']    = $this->cm->get_data_orderby ('dlc_new_package_pdf_tbl',['package_id'=>$pack_id],"id");  
       
        //  echo "jk == <pre>"; print_r($TT); die(); 
          
         $data['video_list'] = $this->cm->get_data('dlc_videos',[]); 
         $data['pdf_list'] = $this->cm->get_data('dlc_PDF_tbl',[]); 
        
        
        
            
        $this->load->view('package/add_package',$data);
      }
   
    public function new_package_add()
        {
            $dx = $this->input->post();
            
           // echo "<pre>"; print_r($dx);  die(); 
            
            $package_id = trim($this->input->post('package_id'));
            
            $name = $this->input->post('pkgname');
            $days = $this->input->post('tmp');
            $prc  = $this->input->post('prc');
            $offprc = $this->input->post('offprc');
            $description = $this->input->post('description');
            $video_ids = $this->input->post('video_id');
            $pdf_ids = $this->input->post('pdf_id');
           
               $pdf_image = ''; 
            if (!empty($_FILES["image"]))
            {
                     $target_dir = "assets/package/";
                       $pdf_image = rand(1000,9999).$_FILES["image"]["name"];  
                        $target_file = $target_dir .$pdf_image;
                        
                        
                        
                   if (! move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                   {
                       $pdf_image = '';
                   }
            }    
            
            //, `name`, `price`, `offer_price`, `time_days`, `image`, `description`, `date`
          if (empty($package_id))
          {
         
                    
             $res =  $this->cm->insert_data ('dlc_new_package_tbl',['name'=>$name,'image'=>$pdf_image,'date' => date('Y-m-d'),
                    'time_days' =>$days,'description' => $description,'price' => $prc,'offer_price' => $offprc ]);
            
                    if($res)
                    {
                        if($video_ids){  $v_index = 1; 
                                foreach($video_ids as $v_id)
                                  {
                                     $this->cm->insert_data ('dlc_new_package_video_tbl',['package_id'=>$res,'video_id'=>$v_id,  'sequence' =>$v_index]);    
                                     
                                      $v_index++ ;
                                  }
                             }
                         if($pdf_ids){
                             $pdf_i = 1;
                                foreach($pdf_ids as $pdf_id)
                                  {
                                     $this->cm->insert_data ('dlc_new_package_pdf_tbl',['package_id'=>$res,'pdf_id'=>$pdf_id,'sequence' => $pdf_i]);    
                                        $pdf_i++;
                                     }
                             }
                        
                        
                		     $this->session->set_flashdata('success_msg', 'Package Inserted successfully '); 
                		    }else{
                		        
                		         $this->session->set_flashdata('error_msg', 'Package Not Inserted '); 
                		    }
                		    
             redirect(base_url('Package/new_package'));   die();      		    
                		    
          }else{
              
                $whr = ($pdf_image == '')? ['name'=>$name,'time_days' =>$days,'description' => $description,'price' => $prc,'offer_price' => $offprc ] :
                        ['name'=>$name,'image'=>$pdf_image,'date' => date('Y-m-d'),
                    'time_days' =>$days,'description' => $description,'price' => $prc,'offer_price' => $offprc ] ; 
               $res_2 =  $this->cm->update_data('dlc_new_package_tbl',['pack_new_id'=> $package_id],$whr );
                    
                    if($res_2)
                    {
                        if($video_ids){
                            
                            $this->cm->deleteRecord('dlc_new_package_video_tbl',['package_id'=>$package_id]);
                            $v_index = 1; 
                                foreach($video_ids as $v_id)
                                  {
                                     $this->cm->insert_data ('dlc_new_package_video_tbl',['package_id'=>$package_id,'video_id'=>$v_id,  'sequence' =>$v_index]);    
                                     
                                      $v_index++ ;
                                  }
                             }
                         if($pdf_ids){
                             
                                $this->cm->deleteRecord('dlc_new_package_pdf_tbl',['package_id'=>$package_id]);
                                
                             $pdf_i = 1;
                                foreach($pdf_ids as $pdf_id)
                                  {
                                     $this->cm->insert_data ('dlc_new_package_pdf_tbl',['package_id'=>$package_id,'pdf_id'=>$pdf_id,'sequence' => $pdf_i]);    
                                        $pdf_i++;
                                     }
                             }
                        
                        
                		     $this->session->set_flashdata('success_msg', 'Package Updated Successfully '); 
                		    }else{
                		        
                		         $this->session->set_flashdata('error_msg', 'Package Not Update '); 
                		    } 
                		    
               redirect(base_url('Package/view_new_package'));   die();  
               
             }    		    
        		    
        		    
        		    
        		    
        		   
           }

     public function view_new_package()
      {
        // $data['video_list'] = $this->cm->get_data('dlc_videos',[]); 
        // $data['pdf_list'] = $this->cm->get_data('dlc_PDF_tbl',[]); 
         
        $res =  $this->cm->get_data('dlc_new_package_tbl',[]); 
            
        $this->load->view('package/view_package',['data' => $res ] );
      }


 public function add_package_data()
      {
        $data['dt'] = $this->Package_model->select_all_data(); 
       // print_r($data['dt']);exit;
		$data['dtt'] = $this->Package_model->select_all_dat(); 
        $this->load->view('add_package',$data);
      }
     public function add_package_data_2()
      {
         $data['dt'] = $this->Package_model->select_all_data(); 
       // print_r($data['dt']);exit; 
		$data['dtt'] = $this->Package_model->select_all_dat(); 
        $this->load->view('add_package_2',$data);
      } 
      
      public function getSubCat()
      { 
          $id = $this->input->post('id');  
          
          $q = "select * from dlc_subcategory where cat_id = '$id'";
          $res = array();
          $res = $this->db->query($q)->result();
          
          if(count($res)> 0)
          {
              $dataTosend = ['status'=>true, 'msg' =>'Success','body'=> $res];
                               echo json_encode($dataTosend); die();
          }else{
                         $dataTosend = ['status'=>false, 'msg' =>'No data found','body'=>''];
                               echo json_encode($dataTosend); die();
                 }
         
          
          
      } 
      public function add_package_dataa()
      {
            $res = $this->input->post();     
           
        /// echo "jk == <pre>"; print_r($res); die();
               
       $show = $this->input->post('chkPassportt');
       $show = (empty($show))? '0': $show;
       $free = $this->input->post('chkPassport');
        $free = (empty($free))? '0': $free;
       $description = $this->input->post('description');
       $description = trim($description);
       
      // print_r($show);exit;
	   $alph = $this->input->post('alpha');
	  if($alph>0){
	      
           
             $strr = implode(',', $alph);
            if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/package/';
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


             $alph = $this->input->post('alpha');
             $strr = implode(',', $alph);
			 $pri = $this->input->post('prc');
                
                $cat =  $this->input->post('cat');
                $add_alpha_id = ($cat == 2)? '': $strr;    
                $add_grammar_id = ($cat == 2)? $strr : '';    
             if($pri){
                 
                 
        $data = array( 'alpha_id'=>$add_alpha_id,
                        'grammar_id'=>$add_grammar_id,
                       'time_perioud'=>$this->input->post('tmp'),
                       'price'=>$this->input->post('prc'),
                       'offer_price'=>$this->input->post('offprc'),   
                       'pack_name'=>$this->input->post('pkgname'), 
					   'cat_id'=>$this->input->post('cat'),
					   'show_web'=>$show,
					   'free_status'=>$free,
					   'description'=>$description,
                       'pack_image'=>$image                 
                    ); 
			 }else{
				$data = array( 'alpha_id'=>$add_alpha_id,
                        'grammar_id'=>$add_grammar_id,
                       'time_perioud'=>$this->input->post('tmp'),
                       'price'=>$this->input->post('prc'),
                       'offer_price'=>$this->input->post('offprc'),
                       'free_status'=>1,					   
                       'pack_name'=>$this->input->post('pkgname'), 
					   'cat_id'=>$this->input->post('cat'), 
					   'show_web'=>$show,
					   'free_status'=>$free,
					   'description'=>$description,
                       'pack_image'=>$image                 
                    );  
				 
				 
			 }
					//print_r($data);exit;
           $insertUserData = $this->Package_model->insert($data); 
    $idd = $this->db->insert_id();
   $query = $this->db->get_where('dlc_course_package', array('pack_id' =>$idd));
   $data['records'] = $query->row();
   $idds = $data['records']->pack_id;
   $orders = array();

for ($i=0; $i < count($alph); $i++){ 
        
            if($cat == 2){    
            $orders[] = array('manage_pack_id' =>null,'pack_id' => $idds,'grammar_id' => $alph[$i]);
            }else{
                     $orders[] = array('manage_pack_id' =>null,'pack_id' => $idds,'alpha_id' => $alph[$i]);
                     }
      
       // 'grammar_id' => $alphl[$i]);		
                      }
    
          $this->Package_model->insert_pack_detail($orders);


          if($insertUserData){
               
             
            $this->session->set_flashdata('success_msg', 'Package have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
          redirect('Package');
	  }	
	  
	  
      $alphl = $this->input->post('alphal');		  
      if($alphl>0){
	    if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/package/';
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


            
              $alphl = $this->input->post('alphal');
             $strrr = implode(',', $alphl);
        $data = array( 'grammar_id'=>$strrr,
                       'time_perioud'=>$this->input->post('tmp'),
                       'price'=>$this->input->post('prc'),
                       'offer_price'=>$this->input->post('offprc'),   
                       'pack_name'=>$this->input->post('pkgname'), 
					   'cat_id'=>$this->input->post('cat'),
					   'show_web'=>$show,
                       'pack_image'=>$image                 
                    ); 
					//print_r($data);exit;
           $insertUserData = $this->Package_model->insert($data); 
    $idd = $this->db->insert_id();
   $query = $this->db->get_where('dlc_course_package', array('pack_id' =>$idd));
   $data['records'] = $query->row();
   $idds = $data['records']->pack_id;
   $orders = array();

for ($i=0; $i < count($alphl); $i++){ 

        $orders[] = array('manage_pack_id' =>null,
        'pack_id' => $idds,
       // 'alpha_id' => $alph[$i],
        'grammar_id' => $alphl[$i]);		
                      }
  $this->Package_model->insert_pack_detail($orders);


          if($insertUserData){
               
             
            $this->session->set_flashdata('success_msg', 'Package have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
          redirect('Package');       
      }
	 
    }
    
      public function delete()
      {
         $pkid = $this->uri->segment(3);
         $this->Package_model->delete_pack($pkid);
         redirect('Package'); 
      }
        public function edit(){ 

         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("dlc_course_package",array("pack_id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id;   
         $this->load->view('edit_package',$data); 
      } 
    public function update_row()
     {
         $dd = $this->input->post();
         $free_status = $this->input->post('free_status');
         $show_web = $this->input->post('show_web');
         $show_web = ($show_web == '')? '': $show_web ;
        // echo "<pre>"; print_r($dd); die(); 
         
		 $alphh = $this->input->post('alpha');
		 $description = $this->input->post('description');
		 $description = trim($description);
	
  if($alphh >0){
		      
        $id = $this->input->post('uid'); 
        $cat = $this->input->post('cat'); 
        $image = $this->input->post('image'); 
            
              if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/package/';
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

                 $alphh = $this->input->post('alpha');
                 $st = implode(',', $alphh);
             $pri = $this->input->post('prc');
              
             
                $add_alpha_id = ($cat == 2)? '': $st;    
                $add_grammar_id = ($cat == 2)? $st : '';  
             
             if($free_status != 1 ){

        $data = array(
             'pack_name'=>$this->input->post('pkname'),
             'price'=>$this->input->post('prc'),
             'offer_price'=>$this->input->post('ofprc'),
			  'free_status'=>0,
             'time_perioud'=>$this->input->post('tmprd'),
             'alpha_id'=>$add_alpha_id,
             'grammar_id'=>$add_grammar_id,
			 'cat_id'=>$cat,
             'pack_image'=>$image,
             'description'=>$description,
             'show_web'=>$show_web
             
            
      );
			 }else{
             $data = array(
             'pack_name'=>$this->input->post('pkname'),
             'price'=>'',
             'offer_price'=>'',
			  'free_status'=>1,
             'time_perioud'=>$this->input->post('tmprd'),
            'alpha_id'=>$add_alpha_id,
             'grammar_id'=>$add_grammar_id,
			 'cat_id'=>$cat,
             'pack_image'=>$image,    
             'description'=>$description,
               'show_web'=>$show_web
      );


			 }			 
        $this->Package_model->updata($id,$data);
            
        $this->Package_model->delete_data($id);

        $ordersd = array();

        
                for ($i=0; $i < count($alphh); $i++)
                { 
                
                         if($cat == 2){    
                                    $ordersd[] = array('manage_pack_id' =>null,'pack_id' => $id,'grammar_id' => $alphh[$i]);
                                    }else{
                                             $ordersd[] = array('manage_pack_id' =>null,'pack_id' => $id,'alpha_id' => $alphh[$i]);
                                             }
                  }
                  $this->Package_model->insert_pack_update($ordersd);
                
         redirect('Package'); 
    }
    
   /* 
 $alphhh = $this->input->post('alphaa');
  if($alphhh>0){
	$id = $this->input->post('uid'); 
        $cat = $this->input->post('cat'); 
        $image = $this->input->post('image'); 
            
              if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/package/';
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

                 $alphhh = $this->input->post('alphaa');
                 $stt = implode(',', $alphhh);
 

        $data = array(
             'pack_name'=>$this->input->post('pkname'),
             'price'=>$this->input->post('prc'),
             'offer_price'=>$this->input->post('ofprc'),
             'time_perioud'=>$this->input->post('tmprd'),
             'grammar_id'=>$stt,
			 'cat_id'=>$cat,
             'pack_image'=>$image,
             'description'=>$description
      );
              
        $this->Package_model->updata($id,$data);

        $this->Package_model->delete_data($id);

        $ordersd = array();

for ($i=0; $i < count($alphhh); $i++){ 

        $ordersd[] = array('manage_pack_id' =>null,
        'pack_id' => $id,
        'grammar_id' => $alphhh[$i]);            
                      }
  $this->Package_model->insert_pack_update($ordersd);
        
         redirect('Package'); 
    
	
    	 }*/
    	
    	
    	
    	 else{
    	                $id = $this->input->post('uid'); 
                        $cat = $this->input->post('cat'); 
                        $image = $this->input->post('image'); 
                            
                              if(!empty($_FILES['image']['name'])){
                                $config['upload_path'] = 'upload/package/';
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
                
                             
                 
                            
                             if($free_status != 1 ){
                
                        $data = array(
                             'pack_name'=>$this->input->post('pkname'),
                             'price'=>$this->input->post('prc'),
                             'offer_price'=>$this->input->post('ofprc'),
                			  'free_status'=>0,
                             'time_perioud'=>$this->input->post('tmprd'),
                            'alpha_id'=>'',
                            'grammar_id'=>'',
                			 'cat_id'=>$cat,
                             'pack_image'=>$image,
                             'description'=>$description,
                             'show_web'=>$show_web
                             
                            
                      );
                			 }else{
                             $data = array(
                             'pack_name'=>$this->input->post('pkname'),
                             'price'=>'',
                             'offer_price'=>'',
                			  'free_status'=>1,
                             'time_perioud'=>$this->input->post('tmprd'),
                             'alpha_id'=>'',
                			 'cat_id'=>$cat,
                             'pack_image'=>$image,    
                             'description'=>$description,
                               'show_web'=>$show_web
                      );
                
                
                			 }			 
                        $this->Package_model->updata($id,$data);
                           $this->Package_model->delete_data($id);     
    	     
    	     
    	     redirect('Package'); 
    	 }
	 }
	

    }