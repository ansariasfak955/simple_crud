<?php



//controller




$configVideo['upload_path'] = 'upload/video'; # check path is correct
$configVideo['max_size'] = '102400';
$configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
$configVideo['overwrite'] = FALSE;
$configVideo['remove_spaces'] = TRUE;
$video_name = $_FILES['video']['name'];
$configVideo['file_name'] = $video_name;

$this->load->library('upload', $configVideo);
$this->upload->initialize($configVideo);

if (!$this->upload->do_upload('uploadan')) # form input field attribute
{
    # Upload Failed
    $this->session->set_flashdata('error', $this->upload->display_errors());
    redirect('Videos/index');
}
else
{
    $url = 'upload/video'.$video_name;
    $alpha = $this->input->post('alphnm');
    $videoname = $this->input->post('videoname');
    $viewdate = $this->input->post('videodt');
   
    $data = array(
        'video_url' => $url,
        'video_name'=> $videoname,
        'videos_date'=> $viewdate,
        'video_alpha'  => $alpha
    );

    # Upload Successfull
  
    $set1 =  $this->Videos_model->uploadData($data);
    $this->session->set_flashdata('success', 'Video Has been Uploaded');
    redirect('Videos/index');
}




//model

public function uploadData($data)
{
    $this->db->insert('dlc_videos', $data);
}

?>