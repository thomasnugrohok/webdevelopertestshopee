<!DOCTYPE html>
<html  lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

<?php echo $style;?>
<script type="text/javascript">
var count = 6;
var redirect = "http://shopee.co.id";
 
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
    }else{
        window.location.href = redirect;
    }
}
</script>

</head>

<body>
<?php echo $navbar;?>
    <div class="container" >
         <div class="row">

       

          <div class="col-sm-12 " >
            <div class="text-center" style="padding:20%">
              Pendaftaran sukses, Selamat Datang di Shopee!
              <br>
               
              <span id="timer">
              <script type="text/javascript">countDown();</script>
              </span>
            </div>
          </div>
        </div>
    </div>

<?php echo $script;?>
   


   
</body>

</html>

 
