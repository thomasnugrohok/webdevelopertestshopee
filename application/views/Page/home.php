<!DOCTYPE html>
<html  lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

<?php echo $style;?>


</head>

<body>
<?php echo $navbar;?>
    <div class="container" >
         <div class="row">

       

          <div class="col-sm-12 " >
            <div class="text-center" style="padding:20%">
              <a href="<?php echo site_url('page/loginpage'); ?>">
                  <img class="img-responsive center-block" src="<?php echo base_url();?>assets/gabung.png">
              </a>
            </div>
          </div>
        </div>
    </div>

<?php echo $script;?>
   


   
</body>

</html>
