<div class="tabls-title text-indent">                                                                                                                                          
         <a href="<?= base_url('Student/student_feed/').$this->uri->segment(3) ?>" class="<?= ($this->uri->segment(2) == 'student_feed')? 'active': '' ?>">Feed</a>
         <a href="<?= base_url('Student/student_learning/').$this->uri->segment(3) ?>" class="<?= ($this->uri->segment(2) == 'student_learning')? 'active': '' ?>">Learning</a>
         <a href="<?= base_url('Student/student_profile/').$this->uri->segment(3) ?>" class="<?= ($this->uri->segment(2) == 'student_profile')? 'active': '' ?>">Profile</a>
         <a href="<?= base_url('Student/student_attachments/').$this->uri->segment(3) ?>" class="<?= ($this->uri->segment(2) == 'student_attachments')? 'active': '' ?>">Attachments</a>
          <a href="<?= base_url('Student/student_dailyreport/').$this->uri->segment(3) ?>" class="<?= ($this->uri->segment(2) == 'student_dailyreport')? 'active': '' ?>">Daily Report</a>
         <a href="<?= base_url('Student/studnet_forms_requests/').$this->uri->segment(3) ?>" class="<?= ($this->uri->segment(2) == 'studnet_forms_requests')? 'active': '' ?>">Forms & Requests</a>

       </div>                              