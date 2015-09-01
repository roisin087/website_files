<?php
 

 function getCars(){
  set_include_path('includes/');
 include 'pagination.php';
 include 'open_db.php';
  $info = array();

  if(isset($_POST['make'])&& isset($_POST['model'])&& isset($_POST['year'])){
  $sql = "SELECT * FROM car_details WHERE make LIKE '" .$_POST['make'] . "' AND model LIKE '" . $_POST['model'] . "' AND year LIKE '" . $_POST['year']."' ORDER BY car_id DESC LIMIT $startAt,$perPage"; 
   }
   else if(isset($_POST['Search'])){
   $pieces = explode(" ", $_POST['Search']);
  $sql = "SELECT * FROM car_details WHERE make LIKE '%" . $pieces[0] ."%'";
     if(isset($pieces[1])){
     $sql .=  "AND model LIKE '%" .$pieces[1]. "%'"; 
     }
  }
  else if(isset($_POST['filter'])){
       if(isset($_POST['car'])){
     $car = $_POST['car'];
     }
     
     
       $sql = "SELECT * FROM car_details ";
      if ($car && is_array($car))   
      {        
        foreach($car as &$c)   
                $c = mysqli_real_escape_string($dbcnx,$c); 
        $sql .= " WHERE make LIKE '". implode("' OR make LIKE '", $car). "'"; // ORDER BY make ASC LIMIT $startAt,$perPage"; 
      }
      }
        else{
   $sql = "SELECT * FROM car_details ORDER BY model ASC LIMIT $startAt,$perPage";
   }
  
   $result = mysqli_query($dbcnx,$sql);
   if(!$result){
    echo ("Query failed " . $sql . "Error: " . mysqli_error($dbcnx));
    exit();
    } 
    $html = "";
      $html ='<ul class="thumbnails">';
     
     while($row = mysqli_fetch_array($result))
     { 
          $today = date("F j, Y");
          $diff = strtotime($today) - strtotime($row['date_added']);
          $days = floor($diff/(3600*24));
          if($days == 0){
          $days = "today";
          }
          else{
          $days .=  ' days ago';
          }
           $id = (int)$row['car_id'];
         
				 $html .= '<li class = "span3">';
				 $html .= '<div class = "thumbnail">';
         $html .= '<div class = "result">';
         $html .= "<img src=" .$row['path']." /></div>";
				 $html .= '<div class="caption">';
				 $html .=	'<h4>'.$row['make'] . ' ' . $row['model'] . ' '. $row['year'] .'</h4><hr>';
				 $html .= '<p>Engine: '. $row['engine_size'].'<br>Fuel: ' . $row['fuel'] .'<br>Doors: '.$row['doors'].'<br> Colour: '.$row['color'];  
         $html .=  '<br>In Stock: ' . $days . '</p>';
         $html .=	"<a class='btn btn-success' href='request_part.php?car_id= $id '>Enquire</a>";
         $html .= "<p><span style = 'float:right'><strong>Ref: " . $row['car_id'] . "</strong></span></p>";
         $html .= '</div></div></li>';
    						
  }   
         $html .= '</ul>';
          

       // echo $html;
       //  mysqli_close($dbcnx);
          return $html; 
    
 } 
  
      
   function isChecked($val){
   if(isset($_POST['filter'])){
   $car = $_POST['car'];
   
   foreach($car as &$c){
     if($val == $c){
      return "checked='checked'";
     }
  }
  //if not equal to val in array
    return '';
     }
    
    }
   
   
    
    
   
    
     
   
?>
 
 