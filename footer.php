
    <!DOCTYPE html>
    <html>
    <body>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/main.js"></script>
    
   
 <?php

if (isset($_SESSION['status']) && $_SESSION['status']!='')
 {
   ?>
   <script>
       swal({
  title: "<?php echo $_SESSION['status'];?>",
 // text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "Ok Done !",
});
   </script>
   <?php
unset($_SESSION['status']);
}
   ?>

  


    </body>
    </html>
