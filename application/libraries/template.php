<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {

   public function getHeader()
   {
     $text='

              <!DOCTYPE html>
         <html lang="en">
         <head>
            <title>.::TODO-list ::.</title>
              <meta charset="utf-8">
             
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
              <!-- Latest compiled and minified CSS -->
               <link rel="stylesheet" href="'.base_url().'bootstrap/css/bootstrap.min.css">
               <link rel="stylesheet" href="'.base_url().'bootstrap/css/bootstrap-theme.min.css">   
                <!-- Latest compiled and minified JavaScript -->
               <script src="'.base_url().'bootstrap/js/bootstrap.min.js"></script> 
                 <link rel="stylesheet" href="'.base_url().'bootstrap/css/aon.css">
         </head>
         <body>
         <div class="row" style="background:#34495E">
            <div class="col-nd-12">
               <div class="col-md-8" >
               <div style="padding-left:70px; margin-top:-5px;">
                  <h3>
                     <font color="#FDFEFE"><img src="'.base_url().'/images/logo.png" alt="Mountain View" style="width:140px;height:35px;"></font>
                  </h3>
               </div>
               </div>

               <div class="col-md-4" >
                  <div class="row" style="float: right; padding-right:70px;" >
                     <div class="col-md-12">
                        <font color="#FDFEFE">Thainology And solution | 0877775748 </font>
                     </div> 
                  </div>
                  <div class="row" style="float: right; padding:3px 60px 0 0; ">
                     <div class="col-md-12">
                        <a href="#"><img src="'.base_url().'/images/icon/home.png" alt="Mountain View" style="width:30px;height:28px; margin-right:5px; "></a>
                        <a href="#"><img src="'.base_url().'/images/icon/user-512.png" alt="Mountain View" style="width:30px;height:28px; margin-right:5px;"></a>
                        <a href="#"><img src="'.base_url().'/images/icon/project.png" alt="Mountain View" style="width:30px;height:28px; margin-right:5px;"></a>
                        <a href="#"><img src="'.base_url().'/images/icon/timeSh.png" alt="Mountain View" style="width:30px;height:28px; margin-right:5px;"></a>
                        <a href="#"><img src="'.base_url().'/images/icon/ioTime.png" alt="Mountain View" style="width:30px;height:28px; margin-right:5px;"></a>
                        <a href="'.base_url().'authen/logout/"><img src="'.base_url().'/images/icon/logout.png" alt="Mountain View" style="width:30px;height:28px; margin-right:5px;"></a>
                     </div>
                  </div> <!-- /div col-md-4 - -->
               </div>
            </div>
         </div>
         <div class="container">
';
		    return  $text;
   }

   public function getFooter()
   {
      return '</div> <!-- close container -->
            <div class="well well-lg">
               <center>
                  <font class="" color="#9B9B9B">Copyright © Thainology and Solutions Co.,Ltd. </font><br>
                  <font color="#9B9B9B">http://www.thainology.com</font>
               </center>
                  
            </div>
   </body>
</html>
';
   }


}
?>