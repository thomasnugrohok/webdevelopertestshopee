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
                <h2 class="form-signin-heading">Please Sign Up</h2>
                  <?php echo validation_errors(); ?>
                  <?php
                    $form = array(
                          'class' => 'form-horizontal'
                        );
                    echo form_open('user/signup', $form); 
                  ?>
                    
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
                    <br>
                     <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
                    <br>
                    
                     <input type="password" class="form-control" name="repassword" placeholder="Konfirm Password" required="" autofocus="" />
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
