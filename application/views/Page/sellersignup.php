<!DOCTYPE html>
<html  lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

<?php echo $style;?>
<style>
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
  }
</style>
</head>

<body>
<?php echo $navbar;?>
    <div class="container" >
         <div class="row">
          <div class="col-sm-12 " >
            <div class="text-center" style="padding:10%;">
                <div class="wrapper">
                <?php echo validation_errors(); ?>
                  <?php
                    $form = array(
                          'class' => 'form-horizontal'
                        );
                    echo form_open_multipart('User/seller', $form); 
                  ?>
                    <h2 class="form-signin-heading">Pendaftaran</h2>
                    <div class="well">
                      <p>Bergabunglah dalam program Penjual Terpilih Shopee! Isi form dibawah ini & lampirkan foto diri beserta KTP.</p>
                    </div>
                    <legend style="color: blue; text-align: left " >LANGKAH 1 :</legend>
                    
                    <input type="number" class="form-control" name="noktp" placeholder="No. KTP" required="" autofocus="" />
                    <br>
                     <legend style="color: blue; text-align: left " >LANGKAH 2 :</legend>

                     <div class="well">
                      <p>Foto diri Beserta KTP Anda. Nomor KTP dan Wajah Anda Harus terlihat jelas dalam foto.</p>
                    </div>

                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <label class="btn btn-default btn-file" style="width:130px; height: 30%;">
                            <!-- <i class="fa fa-cloud-upload img-responsive" style=" font-size: 700%;color :#FD591C; " aria-hidden="true"></i> --> 
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/cloud.PNG">
                            <input type="file" name="fotodiri" style="display: none; ">
                          </label><br>
                          <label>Tambahkan Foto Anda</label>
                        </div>
                          <div class="col-md-6 col-sm-6 col-xs-6">
                            <label class="btn btn-default btn-file" style="width:130px; height: 30%;">
                              <!-- <i class="fa fa-cloud-upload img-responsive" style=" font-size: 700%; color :#FD591C; " aria-hidden="true"></i>  -->
                             <img class="img-responsive" src="<?php echo base_url(); ?>assets/cloud.PNG">
                             <input type="file" name="fotoktp" style="display: none; ">
                            </label><br>
                          <label>Tambahkan Foto KTP Anda</label>
                        </div>
                      </div>
                        <br>
                        <div class="well">
                          
                        </div>
                        <div class="checkbox checkbox-lg">
                          <label><input type="checkbox" value="">Saya Setuju dengan <a>Syarat & ketentuan</a> program Penjual Terpilih Shopee</label>
                        </div>
                     

                        <!--  <label class="btn btn-default btn-file" style="width:130px; height: 30%;">
                          <i class="fa fa-cloud-upload" style=" font-size: 100px " aria-hidden="true"></i> 
                          <input type="file" style="display: none; ">
                      </label>
                     -->
                   <br>
                     <?php
                        $btnSubmit = array(
                              'name' => 'signup',
                              'class' => 'btn btn-lg btn-default btn-block',
                              'style' => 'background-color:#FD591C; color:white',
                              'id' => 'signup',
                              'value' => 'Sign Up'
                            );
                        echo form_submit($btnSubmit); 
                      ?>
                   
                    <?php form_close();?>
                </div>
            </div>
          </div>
        </div>
    </div>

<?php echo $script;?>
   


   
</body>

</html>
