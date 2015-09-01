<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Responsive Web Mobile Layout Templates</title>

   <!-- Included Bootstrap CSS Files -->
	<link rel="stylesheet" href="./js/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./js/bootstrap/css/bootstrap-responsive.min.css" />
	
	<!-- Includes FontAwesome -->
	<link rel="stylesheet" href="./css/fontawesome/css/font-awesome.css" />
	
	<!-- Included Bootstrap Customization CSS Files -->	
	<link rel="stylesheet" href="./css/bootstrap-extension.css" />
	<link rel="stylesheet" href="./css/stylesheet.css" />
	<link rel="stylesheet" href="./css/carousel-custom-01.css" />

	<link rel="stylesheet" href="./js/touchTouch/assets/touchTouch/touchTouch.css" />
 <?php

 // include 'open_db.php';
  include 'pagination.php'; 
 include 'display.php';
  ?>




</head>
<body>
 
<div class="navbar navbar navbar-inverse navbar-static-top">   
	<div class="navbar-inner">
		<div class="container">  
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" href="#">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="index.php">Dismantlers</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="dropdown">
						<a href="index.php">Home</a>
						
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Service 1</a></li>
							<li><a href="#">Service 2</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="parts.php">Dismantled Cars</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Scrap your car <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Details</a></li>
							<li><a href="#">Forms</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="contact.html">Contact</a>	    
					</li>
				</ul>
			</div>
		</div>
	</div>
  </div>


  
<div class="vspace40">		
  
	<div class="container">
  
		<div class="row">
			<div class="span3">
				<div class="well">

					<div class="dropdown">
              <p><strong>Phone (066)-7126066</strong></p>
							<a href="grid8a.html" class="btn btn-primary">Make an Enquiry</a>
							
								
						</a>
						<div class="dropdown-menu well" role="menu" aria-labelledby="dLabel">
							
						</div>
					</div>
					
				</div>
 
				<div class="well">
					<form class="form login-form" id="search"  method="POST" action="">
						<h2 style = "color:#0044cc;">Search by car</h2>
						<div>          
							<?php 
                    include 'select_list.php'; 
                 ?>
                 	<br /><br />
							<button type="submit" class="btn btn-success" name="search_button">Search</button>
						</div>
						 
					</form>
           
				</div>
        	<div class="well">
					<h4 style = "color:#0044cc;">Filters</h4>
					<form name ="filters" method="POST" action="">
          <label class="checkbox">
							<input type="checkbox" name ="all[]" value="ALL" <?php if(isset($_POST['all'])) echo "checked='checked'";  ?> >
							All Makes
						</label>                                               
						<label class="checkbox">
							<input type="checkbox" name = "car[]" value="AUDI" <?php if(isset($_POST['car']))   echo isChecked("AUDI"); ?> >
							Audi
						</label>                                                                

						<label class="checkbox">
							<input type="checkbox" name="car[]" value="FORD"  <?php if(isset($_POST['car']))   echo isChecked("FORD"); ?>  >
							Ford
						</label>

						<label class="checkbox">
							<input type="checkbox" name="car[]" value="HONDA"  <?php if(isset($_POST['car']))  echo isChecked("HONDA");  ?> >
							Honda
						</label>

						<label class="checkbox">
							<input type="checkbox" name= "car[]" value="TOYOTA"  <?php if(isset($_POST['car'])) echo isChecked("TOYOTA"); ?>  >
							Toyota
						</label>
            <br />
						<button class="btn btn-success" type="submit" name="filter">Filter</button>
					</form>
				</div>
        	<div class="well">
          <form method = "POST" action = "">
          <legend>Search Cars</legend>
					<input id="Search" name="Search" type="text" placeholder="search by make" class="input-medium search-query"><br><br>
					<button type="submit" name = "text_search" class="btn btn-success">Search</button>
				</form>
          </div>
			</div>
			  
			<div class="span9">
				<div class="hero-unit">
					<h1 style="color:#ffffff;">Scrap your vehicle</h1>
					<p style ="color:#ffffff;">We will pay you for your end of life vehicle</p>
					<p><a href="#" class="btn btn-primary btn-large">Learn more »</a></p>
				</div>

		
      

			<div id = "search_results">
        
          </div>
          <div id = "results">
              <?php
          
          echo $links;
           echo getCars();
          echo $links;
          ?>
        
         </div>
          <!-- Trigger the modal with a button -->
         <button type="button"  class="btn btn-info btn-lg" style="float:right margin-left:5px;" data-toggle="modal" data-target="#myModal">Find more</button> 

<!-- Modal -->

	</div>
   
  
</div>
</div>
</div>  
<footer id="footer" class="vspace20">
	<div class="container">
		<div class="row">
			<div class="span4">
				<h4>Opening Hours</h4>
				<blockquote>Monday - Friday: 9.00am - 6.00pm <br>
        Saturdays: 9.00am - 1.00pm<br>
        Sundays & Bank Holidays: Closed<br>
				</blockquote>
			</div> 
	
		<div class="span4">
				<h4>Location and Contacts</h4>
				<p><i class="icon-map-marker"></i>&nbsp;Clash industrial estate,<br> Clash East,<br> Tralee,<br>Co.Kerry</p>
				<p><i class="icon-phone"></i>&nbsp;(066)-*******</p>
        <p><i class="icon-phone"></i>&nbsp;(087)-*******</p>
        <p><i class="icon-phone"></i>&nbsp;(087)-*******</p>
				<p><i class="icon-envelope"></i>&nbsp;info@dismantlers.ie</p>
				<p><i class="icon-globe"></i>&nbsp;Web: http://www.dismantlers.ie</p>
			</div>
			
			<div class="span4">
				<h4>Newsletter</h4>
				<p>Write your email to subscribe to our Newsletter service. Thanks!</p>
				<form class="form-newsletter">
				  <div class="input-append">
				    <input type="email" class="span2" placeholder="your email">
				    <button type="submit" class="btn">Subscribe</button>
				  </div>
				</form>
				
				<h4>Follow Us on Social Media</h4>
				<p>
					<a href="https://www.facebook.com"><img src="img/socials/facebook.png" alt="" /></a>
					<a href="#"><img src="img/socials/twitter.png" alt="" /></a>
					<a href="https://www.youtube.com/"><img src="img/socials/youtube.png" alt="" /></a>
				</p>
			</div>
	
		
		<div class="row">
			<div class="span2 offset11">
				<a href="login.php" target="_blank">staff login</a>
			</div>
		</div>
    </div>
	</div>
  
</footer>
	<a class="scrolltotop" href="#"><span>up</span></a>
	
	<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/holder.js"></script>
	<script src="js/script.js"></script>
      <script src="ajax_select.js" type="text/javascript"></script> 
      
  
       <?php
              if(isset($_POST['search_button'])||isset($_POST['filter'])||isset($_POST['text_search'])){
              
               ?>
               <script type = "text/javascript">
              
$(document).ready(function () {
$('#myModal').on('show.bs.modal', function (e) {
$('#myModal').css("width","700px");
})
$('#myModal').on('hidden.bs.modal', function (e) {
$('#myModal').css("width", "0px");
})
});
		$('html, body').animate({
      scrollTop: $("#search_results").offset().top}, 700);


</script>


<?php
}
?>



 <div id="myModal" class="modal fade" role="dialog" style="display:none;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Can't find what your looking for?</h4>
      </div>
      <div class="modal-body">
        <p>We have lots more dismantled cars on the premises, <br> Give us a call on (066)-******* for more details or send us an <a href = "request_part.php">email</a> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
                                                                                                     
			</div>
      
		</div>
</body>
</html>