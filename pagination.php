<?php
set_include_path('includes/');
include 'open_db.php';
   
   ////////////////////////////////////////Pagination///////////////////////////////////////////
    $perPage =12;
    $totalPages=0;
    $total_records=0;
    $totalPages=0;


    if (isset($_GET['page'])&& is_numeric($_GET['page'])) 
    {
    
        $page = (int)$_GET['page'];
        //echo $_GET['page'];
    }    
    else 
    {
        $page=1;
    }
    if(isset($_POST['make'])&&isset($_POST['model'])&&isset($_POST['year'])){
    
     $query = "SELECT COUNT(*) as total FROM car_details WHERE make LIKE '" .$_POST['make'] . "' AND model LIKE '" . $_POST['model'] . "' AND year LIKE '" . $_POST['year']."'";
     }
     else if(isset($_POST['filter'])){
     $car = array();  
     if(isset($_POST['car'])){
     $car = $_POST['car'];
     }
     
     $query = "SELECT COUNT(*) as total FROM car_details";
     if ($car && is_array($car))   
      {        
        foreach($car as &$c) 
                $c = mysqli_real_escape_string($dbcnx,$c); 
        $query .= " WHERE make LIKE '". implode("' OR make LIKE '", $car). "'"; 
      }  
     }
     else if(isset($_POST['all'])){
      $query = "SELECT COUNT(*) as total FROM car_details";
     }
     else if(isset($_POST['text_search'])){
     $query = "SELECT COUNT(*) as total FROM car_details WHERE make LIKE '%" . $_POST['Search'] . "%'";
     }
     else
     {
      $query = "SELECT COUNT(*) as total FROM car_details";
      }
      
 
    $result = mysqli_query($dbcnx,$query);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($dbcnx));
    exit();
}
    $row = mysqli_fetch_array($result);
    
    if (mysqli_num_rows($result) == 0) {
    $total_records = 0;
    } else {
    $total_records = (int)$row['total'];
    }
    $totalPages = ceil($total_records / $perPage);   
     $startAt = $perPage * ($page - 1);

    if ($page > $totalPages) {
   // set current page to last page
        $page = $totalPages;
    } // end if
    // if current page is less than first page...
    if ($page < 1) {
   // set current page to first page
        $page = 1;
    } // end if

    $links = "";
    
    $links .= '<div class="pagination">';
    $links .= '<ul> ';
    // range of num links to show
    $range = 3;

    // if not on page 1, don't show back links
    if ($page > 1) 
    {
     // show << link to go back to page 1
     $links.= "<li> <a href='{$_SERVER['PHP_SELF']}?page=1'>First Page</a></li> ";
     // get previous page num
     $prevpage = $page - 1;
     // show < link to go back to 1 page
     $links .= "<li> <a href='{$_SERVER['PHP_SELF']}?page=$prevpage'>Prev</a></li> ";
    } // end if 

        // loop to show links to range of pages around current page
        for ($i = ($page - $range); $i < (($page + $range) + 1); $i++) {
           // if it's a valid page number...
           if (($i > 0) && ($i <= $totalPages)) {
              // if we're on current page...
              if ($i == $page) {
                 // 'highlight' it but don't make a link
                 $links .= "<li class ='disabled'> <a href='{$_SERVER['PHP_SELF']}?page=$i#search_results'>Page $i</a></li>";
              // if not current page...
              } else {
                 // make it a link
           $links .= "<li> <a href='{$_SERVER['PHP_SELF']}?page=$i#search_results'>Page $i</a></li> ";
              } // end else
           } // end if 
        } // end for

      // if not on last page, show forward and last page links    
      if ($page != $totalPages) {
         // get next page
         $nextpage = $page + 1;
          // echo forward link for next page 
         $links .= "<li> <a href='{$_SERVER['PHP_SELF']}?page=$nextpage#search_results'>Next</a></li> ";
         // echo forward link for lastpage
         $links .= "<li><a href='{$_SERVER['PHP_SELF']}?page=$totalPages#search_resulta'>Last</a></li> ";
      } // end if
         
      $links .= '</ul>';
      $links .= '<p style = float:right; margin-left:20px;>'. $total_records . ' results found</p></div>'; 
     
      mysqli_close($dbcnx);
 
        
  
////////////////////////////////////////////////end pagination//////////////////////////////////////////////  

 
?>

