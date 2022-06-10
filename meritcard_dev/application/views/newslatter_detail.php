<?php include ('include/header.php'); ?>
<?php

 //echo "<pre>"; print_r($news_letters);die;
?>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="d-flex align-items-center">
        <div class="w-100s">
          <h4 class="page-title">Newsletter Details</h4>

          <div class="d-inline-block align-items-center">
          </div>
          <div class="haff-widgets">
   
            <a href="<?php echo base_url().'Messages/newsletters'?>" class="btn btn-primary mt-10 waves-effect shadow"><i class="fa-regular fa-angles-left" style="margin-right: 8px;"></i>Back</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <form>
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="box">
            <div class="box-body">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="formsetting mb-3">
                        <label for="pnumber" class="labels">Recipients</label>
                        <h5>

                        <h5 class="selectnews"><?php echo $news_letters[0]['recipients']?></h5>
                        <h5 class="selectnews">demo room  2</h5>
                        </h5>
                      </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="copy_section">
                   <div class="title_preview">
                     <h5><sapan><i class="far fa-radio"></i></span>annual function </h5>
                      <div class="img">
                        <img src="<?=base_url().'assets/images/'.$news_letters[0]['image']?>" alt="Newsletter Img">
                      </div>
                      <h5><?php echo $news_letters[0]['title']?></h5>
                      <h6>Aug 3, 2022 - Create free online Annual Function invitation</h6>
                   </div>
                    </div>
                    </div>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
</div>



<!-- /.modal -->
<?php include ('include/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets_pagesassets/js/bootstrap-select.js"></script>
<script>
  $('.messag').addClass('active');
</script>
