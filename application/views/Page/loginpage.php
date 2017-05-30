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
            <div class="text-center" style="padding:10%;">
                <div class="wrapper">
                <?php echo validation_errors(); ?>
                <h2 class="form-signin-heading">Please login</h2>
                
                  <?php
                    $form = array(
                          'class' => 'form-horizontal'
                        );
                    echo form_open('user/login', $form); 
                  ?>
                    
                    <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
                    <br>

                      <?php
                        $btnSubmit = array(
                              'name' => 'signin',
                              'class' => 'btn btn-lg btn-default btn-block',
                              'style' => 'background-color:#FD591C; color:white',
                              'id' => 'signin',
                              'value' => 'Sign In'
                            );
                        echo form_submit($btnSubmit); 
                      ?>
                    
                    

                  <?php form_close();?>

                  <a href="<?php echo site_url('page/signuppage');?>">belum punya akun ?</a>
                </div>
            </div>
          </div>
        </div>
    </div>

<?php echo $script;?>
   


   
</body>

</html>
