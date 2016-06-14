<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_authen {

   public function getHeader()
   {
        return '
   <!DOCTYPE html>
<html lang="en">
<head>
   <title>.::To-Do-List::.</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <!-- Latest compiled and minified CSS -->
      <script src="'.base_url().'bootstrap/js/bootstrap.min.js"></script> 
      <link rel="stylesheet" href="'.base_url().'bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="'.base_url().'bootstrap/css/bootstrap-theme.min.css">   
       <!-- Latest compiled and minified JavaScript -->
      
      <script src="'.base_url().'bootstrap/js/aon.js"></script> 
        <link rel="stylesheet" href="'.base_url().'bootstrap/css/login.css">
</head>
<body>
   <div class="row" style="background:#34495E">
     
           <div style="padding-left:70px; margin-top:-5px;">
                  <h3>
                     <font color="#FDFEFE"><img src="'.base_url().'/images/logo.png" alt="Mountain View" style="width:140px;height:35px;"></font>
                  </h3>
               </div>
      <div class="container"> 
';
   }

   public function getFooter()
   {
      return '
      </div> <!-- /container -->
    <p class="bg-info"><center><font style="color:#DAD7D7; ">Thainology and Solutions Co.,Ltd</font></center></p>
      </body>
</html>
 ';
   }
}
?>