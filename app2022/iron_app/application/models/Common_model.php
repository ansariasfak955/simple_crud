<?php
	 if(!defined('BASEPATH'))
        exit('No direct script access allowed');
        
    class Common_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }    
	
		
	public function insert_data ($tbl,$data)
			{
					$res = $this->db->insert($tbl,$data);

				return ($res)? $this->db->insert_id() : false;

			}

		public function get_data ($tbl,$data)
			{

				
					$res = $this->db->where($data)->get($tbl)->result();

				return $res;

			}
			
		function getProductionGroupItems($itemId){
     $this->db->select("*");
     $this->db->where("id",$itemId);
     $this->db->or_where("parent_item_id",$itemId);

    /*********** order by *********** */
     $this->db->order_by("id", "asc");

     $q=$this->db->get("recipe_products");
     if($q->num_rows()>0){
         foreach($q->result() as $row){
             $data[]=$row;
         }
         return $data;
     }
    return false;
}	
			
			
			
			
		public function get_data_orderby ($tbl,$data,$order)
			{
                     $this->db->from($tbl);
                     $this->db->where($data);
                        $this->db->order_by($order);
                        $query = $this->db->get(); 
                        return $query->result();
				
				/*	$res = $this->db->where($data)->get($tbl)->result();

				return $res;*/

			}
		public function deleteRecord($tbl,$wh)
			 {

			    $this->db->where($wh);
			    $del=$this->db->delete($tbl);   
			    return $del;

			}
		

	
    
/*=============================*/
	public function update_data($tbl,$wh,$tag)
	{
	   return  $res = $this->db->where($wh)->update($tbl, $tag);

	}

  
    
	public function count_row($tbl,$whr)
	{
		$res = $this->db->where($whr)->count_all_results($tbl);		
		return $res;


		}

	    
	    
	function tag_val($tag_name,$tag_val,$serch,$tbl)
	    {
	        $res = $this->db->select($serch)->where($tag_name,$tag_val)->get($tbl)->result();
	        
	        return $res[0]->$serch;
	    }
	  
	  
         function meail_send($to_email,$from_email,$id)
        	 {
        	        $wh = ['meet_id'=>$id ];
						$data = $this->get_data('meeting_tbl',$wh);

							$type = (count($data))? $data[0]->m_type:'';
							$pass = (count($data))? $data[0]->pass:'';
							$host = (count($data))? $data[0]->host_id:'';
							$meet_name = (count($data))? $data[0]->meeting_name :'';
						
							$date = (count($data))? $data[0]->date:'';
							$from_time = (count($data))? $data[0]->from_time:'';
                          
                            /*==========cheng date and time formet ===================*/
                                 $date_4 = $from_time . ',' . $date;
						 	 	   	              
                                 $new_time =  date('h:i a', strtotime($date_4));
                                       $yrdata= strtotime($date);
                                     $new_date =  date('d-M-Y', $yrdata);
                             /*==========cheng date and time formet end===================*/
                                
						        $aa ="";
							
                                        $ww = ['user_id'=>$host];
                                        $re = $this->get_data('user_tbl',$ww);
                                        $m_random_id = (count($re))? $re[0]->m_random_id : "" ;
                                        
                                        $host_name = (count($re))? $re[0]->user_name : "" ;    
                                        
                        	if($type == 2)
                                     {     
                                        $aa =  base64_encode('public,'.$m_random_id.','.$pass);
                                        }else{
                                                 $aa =  base64_encode('private,'.$id.','.$pass);
                                           }
                             $url = "https://ailive.in/meet/HomeController/index/?meet_id=".$aa;              
                                           
                          //   echo  $host_name. "  ==$host = jk=".$id."==  " .$meet_name; die();
                               
                                                  
                     $srk = "
                            <div style ='background-color:silver; border-radius: 15px;padding: 10px;' >
                                
                        <p style ='background-color:silver;padding: 10px;'>Thank you for using AILive.  The best in Industry Video Conferencing Platform.  Below are your meeting details:</p>
                            <br>
                            <br>
                            <table style ='background-color:silver;padding: 10px;'>
                              <tr>   
                                <th style = 'width: 40%' ></th>
                                <th style = 'width: 50%;  margin-left: 10px;' ></th>
                                
                               
                               <tr>   
                                <td >Host Name:</td>
                                <td >".$host_name."</td>   
                                </tr> 
                                <tr>
                                <td >Meeting Name:</td>
                                <td >".$meet_name."</td>
                                </tr>
                                <tr>
                                <td >Date:</td>
                                <td >".$new_date."</td>
                                </tr>
                                <tr>
                                <td >Time:</td>
                                <td >".$new_time."</td>
                                </tr>
                                <tr>
                                <td >Meeting URL:</td>
                                <td >".$url."</td>
                              </tr>
                              
                            </table>
                            <br>
                            <br>
                             <p style ='background-color:silver;padding: 10px;'>Disclaimer:  Please do not respond to
                                    this email.  This email address is not monitored for responses.  You may contact us at contactus@ailive.in
                                    in case you have questions or queries.</p>
                            <br>
                            <br>
                            <p style ='background-color:silver;padding: 10px;'>Thanks & Regards,
                               <br> Team AILive </p>
                               </div>
                            ";   
                              
                    $from_email = 'info@ailive.in';
        	         $to =  $to_email;
                    $subject = "Join this Url";
                    $txt = $srk;
                   
                    $header = 'From: <info@ailive.in>' . "\r\n";
                     $header .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
                           
                   
                   
                    
                    if(mail($to,$subject,$txt,$header))
                    {   
                        return true;
                        
                    }else{
                            return false;
                             }
        	     
        	 }
	
	
	public function file_upload_with_inverted($m_file, $path)  
        	{
	           $img_name =''; 
                    if(isset($_FILES[$m_file])  && $_FILES[$m_file]['size'] >0 )   
                    {  
                        
                        $file_name =  $_FILES[$m_file]['name']; 
                         
                        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                        $img_name = rand(100,10000).time().'.'.$extension  ;  
                  
                         $Path1 =  $path.$img_name; 
                  
               			if(!move_uploaded_file($_FILES[$m_file]['tmp_name'],$Path1))
        				    {
        				        $img_name = ''; 
        				    }
                    }
	  
	     return  $img_name;

	    }

		public function file_upload_multipal($m_file, $path)  
        	{
	           $img_arrays = array(); 
	            
                 $total = isset($_FILES[$m_file]['name'])? count($_FILES[$m_file]['name']) : 0 ;
                   
	            for( $key=0 ; $key < $total ; $key++ ) {
                    $file_name=$_FILES[$m_file]["name"][$key];
                    $file_tmp=$_FILES[$m_file]["tmp_name"][$key];
                 
                
                
                        $exte = pathinfo($file_name, PATHINFO_EXTENSION);
                        $img_name = rand(100,10000).time().'.'.$exte  ;  
                        $Path1    =  $path.$img_name; 
                  
               			if(move_uploaded_file($file_tmp,$Path1)){
        				        $img_arrays[] =  $img_name; 
        				    }
                    
                }
             
             return $img_arrays; 
	    }

	
	
	
	
	
	
	
       
/*===========================this function use for two time ================================= */

   public function getTimeDiff($dtime,$atime)
    {
        $nextDay = $dtime>$atime?1:0;   
        $dep = explode(':',$dtime);
        $arr = explode(':',$atime);
        $diff = abs(mktime($dep[0],$dep[1],0,date('n'),date('j'),date('y'))-mktime($arr[0],$arr[1],0,date('n'),date('j')+$nextDay,date('y')));
        $hours = floor($diff/(60*60));
        $mins = floor(($diff-($hours*60*60))/(60));
        $secs = floor(($diff-(($hours*60*60)+($mins*60))));
        if(strlen($hours)<2){$hours="0".$hours;}
        if(strlen($mins)<2){$mins="0".$mins;}
        if(strlen($secs)<2){$secs="0".$secs;}
        return $hours.':'.$mins;
    }


    /* ================== chack date function ======================*/  
        // chack date is upcoming and pass for givan date
      
       public function chack_date($dtime,$atime)
       {
              $date = strtotime($my_date);
               
                $tt =   date('d-F-Y', $date);
              
               
                              if(strtotime($tt) > time()) {
                                return "Future Date!";
                              } if(strtotime($tt) < time()) {
                                return "Past Date!";
                              } if(strtotime($tt) == time()) {
                                return "Current Date!";
                              }


       }

     	public function all_state_and_district($my_state,$type)
    	{
		
             $IndianStates = ['AN'=>['name'=>'Andaman and Nicobar Island (UT)',
                                'districts'=>['Nicobar','North and Middle Andaman','South Andaman'],],
                        'AP'=>['name'=>'Andhra Pradesh','districts'=>['Anantapur','Chittoor','East Godavari','Guntur','Krishna','Kurnool','Prakasam','Srikakulam','Sri Potti Sriramulu Nellore','Visakhapatnam','Vizianagaram','West Godavari','YSR District,Kadapa (Cuddapah)'],],'AR'=>['name'=>'Arunachal Pradesh','districts'=>['Anjaw','Changlang','Dibang Valley','East Kameng','East Siang','Kra Daadi','Kurung Kumey','Lohit','Longding','Lower Dibang Valley','Lower Siang','Lower Subansiri','Namsai','Papum Pare','Siang','Tawang','Tirap','Upper Siang','Upper Subansiri','West Kameng','West Siang'],],'AS'=>['name'=>'Assam','districts'=>['Baksa','Barpeta','Biswanath','Bongaigaon','Cachar','Charaideo','Chirang','Darrang','Dhemaji','Dhubri','Dibrugarh','Dima Hasao (North Cachar Hills)','Goalpara','Golaghat','Hailakandi','Hojai','Jorhat','Kamrup','Kamrup Metropolitan','Karbi Anglong','Karimganj','Kokrajhar','Lakhimpur','Majuli','Morigaon','Nagaon','Nalbari','Sivasagar','Sonitpur','South Salamara-Mankachar','Tinsukia','Udalguri','West Karbi Anglong'],],'BR'=>['name'=>'Bihar','districts'=>['Araria','Arwal','Aurangabad','Banka','Begusarai','Bhagalpur','Bhojpur','Buxar','Darbhanga','East Champaran (Motihari)','Gaya','Gopalganj','Jamui','Jehanabad','Kaimur (Bhabua)','Katihar','Khagaria','Kishanganj','Lakhisarai','Madhepura','Madhubani','Munger (Monghyr)','Muzaffarpur','Nalanda','Nawada','Patna','Purnia (Purnea)','Rohtas','Saharsa','Samastipur','Saran','Sheikhpura','Sheohar','Sitamarhi','Siwan','Supaul','Vaishali','West Champaran'],],'CH'=>['name'=>'Chandigarh (UT)','districts'=>['Chandigarh'],],'CG'=>['name'=>'Chhattisgarh','districts'=>['Balod','Baloda Bazar','Balrampur','Bastar','Bemetara','Bijapur','Bilaspur','Dantewada (South Bastar)','Dhamtari','Durg','Gariyaband','Janjgir-Champa','Jashpur','Kabirdham (Kawardha)','Kanker (North Bastar)','Kondagaon','Korba','Korea (Koriya)','Mahasamund','Mungeli','Narayanpur','Raigarh','Raipur','Rajnandgaon','Sukma','Surajpur  ','Surguja'],],'DN'=>['name'=>'Dadra and Nagar Haveli (UT)','districts'=>['Dadra & Nagar Haveli'],],'DD'=>['name'=>'Daman and Diu (UT)','districts'=>['Daman','Diu'],],'DL'=>['name'=>'Delhi (NCT)','districts'=>['Central Delhi','East Delhi','New Delhi','North Delhi','North East  Delhi','North West  Delhi','Shahdara','South Delhi','South East Delhi','South West  Delhi','West Delhi'],],'GA'=>['name'=>'Goa','districts'=>['North Goa','South Goa'],],'GJ'=>['name'=>'Gujarat','districts'=>['Ahmedabad','Amreli','Anand','Aravalli','Banaskantha (Palanpur)','Bharuch','Bhavnagar','Botad','Chhota Udepur','Dahod','Dangs (Ahwa)','Devbhoomi Dwarka','Gandhinagar','Gir Somnath','Jamnagar','Junagadh','Kachchh','Kheda (Nadiad)','Mahisagar','Mehsana','Morbi','Narmada (Rajpipla)','Navsari','Panchmahal (Godhra)','Patan','Porbandar','Rajkot','Sabarkantha (Himmatnagar)','Surat','Surendranagar','Tapi (Vyara)','Vadodara','Valsad'],],'HR'=>['name'=>'Haryana','districts'=>['Ambala','Bhiwani','Charkhi Dadri','Faridabad','Fatehabad','Gurgaon','Hisar','Jhajjar','Jind','Kaithal','Karnal','Kurukshetra','Mahendragarh','Mewat','Palwal','Panchkula','Panipat','Rewari','Rohtak','Sirsa','Sonipat','Yamunanagar'],],'HP'=>['name'=>'Himachal Pradesh','districts'=>['Bilaspur','Chamba','Hamirpur','Kangra','Kinnaur','Kullu','Lahaul & Spiti','Mandi','Shimla','Sirmaur (Sirmour)','Solan','Una'],],'JK'=>['name'=>'Jammu and Kashmir','districts'=>['Anantnag','Bandipore','Baramulla','Budgam','Doda','Ganderbal','Jammu','Kargil','Kathua','Kishtwar','Kulgam','Kupwara','Leh','Poonch','Pulwama','Rajouri','Ramban','Reasi','Samba','Shopian','Srinagar','Udhampur'],],'JH'=>['name'=>'Jharkhand','districts'=>['Bokaro','Chatra','Deoghar','Dhanbad','Dumka','East Singhbhum','Garhwa','Giridih','Godda','Gumla','Hazaribag','Jamtara','Khunti','Koderma','Latehar','Lohardaga','Pakur','Palamu','Ramgarh','Ranchi','Sahibganj','Seraikela-Kharsawan','Simdega','West Singhbhum'],],'KA'=>['name'=>'Karnataka','districts'=>['Bagalkot','Ballari (Bellary)','Belagavi (Belgaum)','Bengaluru (Bangalore) Rural','Bengaluru (Bangalore) Urban','Bidar','Chamarajanagar','Chikballapur','Chikkamagaluru (Chikmagalur)','Chitradurga','Dakshina Kannada','Davangere','Dharwad','Gadag','Hassan','Haveri','Kalaburagi (Gulbarga)','Kodagu','Kolar','Koppal','Mandya','Mysuru (Mysore)','Raichur','Ramanagara','Shivamogga (Shimoga)','Tumakuru (Tumkur)','Udupi','Uttara Kannada (Karwar)','Vijayapura (Bijapur)','Yadgir'],],'KL'=>['name'=>'Kerala','districts'=>['Alappuzha','Ernakulam','Idukki','Kannur','Kasaragod','Kollam','Kottayam','Kozhikode','Malappuram','Palakkad','Pathanamthitta','Thiruvananthapuram','Thrissur','Wayanad'],],'LD'=>['name'=>'Lakshadweep (UT)','districts'=>['Lakshadweep'],],'MP'=>['name'=>'Madhya Pradesh','districts'=>['Agar Malwa','Alirajpur','Anuppur','Ashoknagar','Balaghat','Barwani','Betul','Bhind','Bhopal','Burhanpur','Chhatarpur','Chhindwara','Damoh','Datia','Dewas','Dhar','Dindori','Guna','Gwalior','Harda','Hoshangabad','Indore','Jabalpur','Jhabua','Katni','Khandwa','Khargone','Mandla','Mandsaur','Morena','Narsinghpur','Neemuch','Panna','Raisen','Rajgarh','Ratlam','Rewa','Sagar','Satna','Sehore','Seoni','Shahdol','Shajapur','Sheopur','Shivpuri','Sidhi','Singrauli','Tikamgarh','Ujjain','Umaria','Vidisha'],],'MH'=>['name'=>'Maharashtra','districts'=>['Ahmednagar','Akola','Amravati','Aurangabad','Beed','Bhandara','Buldhana','Chandrapur','Dhule','Gadchiroli','Gondia','Hingoli','Jalgaon','Jalna','Kolhapur','Latur','Mumbai City','Mumbai Suburban','Nagpur','Nanded','Nandurbar','Nashik','Osmanabad','Palghar','Parbhani','Pune','Raigad','Ratnagiri','Sangli','Satara','Sindhudurg','Solapur','Thane','Wardha','Washim','Yavatmal'],],'MN'=>['name'=>'Manipur','districts'=>['Bishnupur','Chandel','Churachandpur','Imphal East','Imphal West','Jiribam','Kakching','Kamjong','Kangpokpi','Noney','Pherzawl','Senapati','Tamenglong','Tengnoupal','Thoubal','Ukhrul'],],'ML'=>['name'=>'Meghalaya','districts'=>['East Garo Hills','East Jaintia Hills','East Khasi Hills','North Garo Hills','Ri Bhoi','South Garo Hills','South West Garo Hills ','South West Khasi Hills','West Garo Hills','West Jaintia Hills','West Khasi Hills'],],'MZ'=>['name'=>'Mizoram','districts'=>['Aizawl','Champhai','Kolasib','Lawngtlai','Lunglei','Mamit','Saiha','Serchhip'],],'NL'=>['name'=>'Nagaland','districts'=>['Dimapur','Kiphire','Kohima','Longleng','Mokokchung','Mon','Peren','Phek','Tuensang','Wokha','Zunheboto'],],'OR'=>['name'=>'Odisha','districts'=>['Angul','Balangir','Balasore','Bargarh','Bhadrak','Boudh','Cuttack','Deogarh','Dhenkanal','Gajapati','Ganjam','Jagatsinghapur','Jajpur','Jharsuguda','Kalahandi','Kandhamal','Kendrapara','Kendujhar (Keonjhar)','Khordha','Koraput','Malkangiri','Mayurbhanj','Nabarangpur','Nayagarh','Nuapada','Puri','Rayagada','Sambalpur','Sonepur','Sundargarh'],],'PY'=>['name'=>'Puducherry (UT)','districts'=>['Karaikal','Mahe','Pondicherry','Yanam'],],'PB'=>['name'=>'Punjab','districts'=>['Amritsar','Barnala','Bathinda','Faridkot','Fatehgarh Sahib','Fazilka','Ferozepur','Gurdaspur','Hoshiarpur','Jalandhar','Kapurthala','Ludhiana','Mansa','Moga','Muktsar','Nawanshahr (Shahid Bhagat Singh Nagar)','Pathankot','Patiala','Rupnagar','Sahibzada Ajit Singh Nagar (Mohali)','Sangrur','Tarn Taran'],],'RJ'=>['name'=>'Rajasthan','districts'=>['Ajmer','Alwar','Banswara','Baran','Barmer','Bharatpur','Bhilwara','Bikaner','Bundi','Chittorgarh','Churu','Dausa','Dholpur','Dungarpur','Hanumangarh','Jaipur','Jaisalmer','Jalore','Jhalawar','Jhunjhunu','Jodhpur','Karauli','Kota','Nagaur','Pali','Pratapgarh','Rajsamand','Sawai Madhopur','Sikar','Sirohi','Sri Ganganagar','Tonk','Udaipur'],],'SK'=>['name'=>'Sikkim','districts'=>['East Sikkim','North Sikkim','South Sikkim','West Sikkim'],],'TN'=>['name'=>'Tamil Nadu','districts'=>['Ariyalur','Chennai','Coimbatore','Cuddalore','Dharmapuri','Dindigul','Erode','Kanchipuram','Kanyakumari','Karur','Krishnagiri','Madurai','Nagapattinam','Namakkal','Nilgiris','Perambalur','Pudukkottai','Ramanathapuram','Salem','Sivaganga','Thanjavur','Theni','Thoothukudi (Tuticorin)','Tiruchirappalli','Tirunelveli','Tiruppur','Tiruvallur','Tiruvannamalai','Tiruvarur','Vellore','Viluppuram','Virudhunagar'],],'TG'=>['name'=>'Telangana','districts'=>['Adilabad','Bhadradri Kothagudem','Hyderabad','Jagtial','Jangaon','Jayashankar Bhoopalpally','Jogulamba Gadwal','Kamareddy','Karimnagar','Khammam','Komaram Bheem Asifabad','Mahabubabad','Mahabubnagar','Mancherial','Medak','Medchal','Nagarkurnool','Nalgonda','Nirmal','Nizamabad','Peddapalli','Rajanna Sircilla','Rangareddy','Sangareddy','Siddipet','Suryapet','Vikarabad','Wanaparthy','Warangal (Rural)','Warangal (Urban)','Yadadri Bhuvanagiri'],],'TR'=>['name'=>'Tripura','districts'=>['Dhalai','Gomati','Khowai','North Tripura','Sepahijala','South Tripura','Unakoti','West Tripura'],],'UK'=>['name'=>'Uttarakhand','districts'=>['Almora','Bageshwar','Chamoli','Champawat','Dehradun','Haridwar','Nainital','Pauri Garhwal','Pithoragarh','Rudraprayag','Tehri Garhwal','Udham Singh Nagar','Uttarkashi'],],'UP'=>['name'=>'Uttar Pradesh','districts'=>['Agra','Aligarh','Allahabad','Ambedkar Nagar','Amethi (Chatrapati Sahuji Mahraj Nagar)','Amroha (J.P. Nagar)','Auraiya','Azamgarh','Baghpat','Bahraich','Ballia','Balrampur','Banda','Barabanki','Bareilly','Basti','Bhadohi','Bijnor','Budaun','Bulandshahr','Chandauli','Chitrakoot','Deoria','Etah','Etawah','Faizabad','Farrukhabad','Fatehpur','Firozabad','Gautam Buddha Nagar','Ghaziabad','Ghazipur','Gonda','Gorakhpur','Hamirpur','Hapur (Panchsheel Nagar)','Hardoi','Hathras','Jalaun','Jaunpur','Jhansi','Kannauj','Kanpur Dehat','Kanpur Nagar','Kanshiram Nagar (Kasganj)','Kaushambi','Kushinagar (Padrauna)','Lakhimpur - Kheri','Lalitpur','Lucknow','Maharajganj','Mahoba','Mainpuri','Mathura','Mau','Meerut','Mirzapur','Moradabad','Muzaffarnagar','Pilibhit','Pratapgarh','RaeBareli','Rampur','Saharanpur','Sambhal (Bhim Nagar)','Sant Kabir Nagar','Shahjahanpur','Shamali (Prabuddh Nagar)','Shravasti','Siddharth Nagar','Sitapur','Sonbhadra','Sultanpur','Unnao','Varanasi'],],'WB'=>['name'=>'West Bengal','districts'=>['Alipurduar','Bankura','Birbhum','Cooch Behar','Dakshin Dinajpur (South Dinajpur)','Darjeeling','Hooghly','Howrah','Jalpaiguri','Jhargram','Kalimpong','Kolkata','Malda','Murshidabad','Nadia','North 24 Parganas','Paschim Medinipur (West Medinipur)','Paschim (West) Burdwan (Bardhaman)','Purba Burdwan (Bardhaman)','Purba Medinipur (East Medinipur)','Purulia','South 24 Parganas','Uttar Dinajpur (North Dinajpur)']]];
                        
             $arr = array();
           
                return $arr  = ($type == 'district') ? $IndianStates[$my_state]['districts'] :$IndianStates[$my_state]['name'] ;
                       

		}   


}










