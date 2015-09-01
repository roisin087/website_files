
   <?php
include 'includes/functions.php';

        echo "<html>\n",
             "    <head>\n",
             "        <title>UPLOAD TO A DIRECTORY</title>\n",
             "    </head>\n",
             "    <body>\n";

    if (!isset($_POST['do_action']))
    {
    $y='<option selected disabled>select</option>';
    $cc = '<option selected disabled>select</option>';
    $doors = '<option selected disabled>select</option>';
 
    
      for($i=date("Y");$i>1970;$i--){
       $y .= '<option value = '.$i.'>'.$i .'</option>';
       }
       for($i=0.9;$i<5.0;$i+=0.1){
       $cc .= '<option value = '.$i.'>'.str_pad($i, 2,'.', STR_PAD_RIGHT)  .'L'.'</option>';
       }
       for($i=1;$i<=8;$i++){
       $doors .= '<option value = '.$i.'>'.$i .'</option>';
       }
             echo "<h1>Add stock</h1>\n",
             "        <form action='{$_SERVER['PHP_SELF']}' method='post' enctype='multipart/form-data'>\n",
             "            <input type='file' name='userfile' /><br><br>",
             "            <label>Make  </label><input type ='text' name ='make'><br><br>",
             "            <label>Model    </label><input type ='text' name ='model'><br><br>",
             "            <label>Year     </label>'<select name = 'year'>",
             "            $y .</select><br><br>",
             "            <label>Engine Size     </label><select name ='engine'>",
             "            $cc .</select><br><br>",
             '             <label for ="petrol" class = "radio-inline"><input type="radio" name = "fuel" id = "petrol" value = "petrol" class="span1" />Petrol</label><br><br>',
   	         '             <label for ="diesel" class = "radio-inline"><input type="radio" name = "fuel" id = "diesel" value = "diesel" class="span1" />Diesel</label><br><br>',
             "            <label>Body</label><input type='text' name = 'body'><br><br>",
             "            <label>Doors     </label><select name ='doors'><br><br>",
             "            $doors </select>",
             "            <label>Colour     </label><input type ='text' name ='colour'><br><br>",
             "            <input type='submit' name='do_action' value='Upload' />",
             "        </form>\n";
    }
    
    else
    {
        // You may also use if (is_uploaded_file($_FILES['userfile']['tmp_name']))
        // IMO using if isset is an identical test
         
        if (isset($_FILES['userfile']['tmp_name']))
        {
      
            // In this line I'm examining the file size and the MIME type of the file
            // to verify that the file is in the acceptable size range and is a jpeg
            // image.  MIME type testing isn't foolproof, it is possible to spoof this.
            // The size testing, however, is not spoofable.
            
            //if (($_FILES['userfile']['size'] > 100000) && ($_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/pjpeg'))
            //{
              $new_file_name = time().'.jpg';
                $file_path  = 'img/car_img/'.$new_file_name;
             

               
                // Give the file a new name to prevent one user from overwriting files 
                // uploaded by another. mktime(), which creates a UNIX timestamp in 
                // addition to the user name is good for this.
                
                 $source_photo = $_FILES['userfile']['tmp_name'];
                $dest_photo = 'img/car_img/'.$new_file_name;
                 
                $compressed = compress_image($source_photo, $dest_photo, 30);
                
  
              

             //   if (move_uploaded_file($dest_photo ,$compressed))
                //{
                    echo "Upload successful!<br /><br />\n";
                    echo 'File: '.$_FILES['userfile']['name'].' ('.$_FILES['userfile']['size'].") Bytes<br />\n";
                    echo "Renamed: $new_file_name<br />\n";   
  $dbcnx = @mysql_connect("localhost", "root");
			if (!$dbcnx) {
				echo( "<p>Unable to connect to the " .
					"database server at this time.</p>" );
				exit();
			}
                    // Select the  database
			if (! @mysql_select_db("cars") ) {
				echo( "<p>Unable to locate the database at this time.</p>" );
				exit();
				}
         
				if(isset($_POST['do_action']))
				{
          $make = $_POST['make'];
          $model = $_POST['model'];
          $engine = $_POST['engine'];
          $fuel = $_POST['fuel'];
          $year = $_POST['year'];
          $body = $_POST['body'];
          $doors = intval($_POST['doors']);
          $colour = $_POST['colour'];
          $fileName = $_FILES['userfile']['name'];
					$tmpName = $_FILES['userfile']['tmp_name'];
					$fileSize = $_FILES['userfile']['size'];
					$fileType = $_FILES['userfile']['type'];
					
				
					if(!get_magic_quotes_gpc())
					{
						$fileName = addslashes($fileName);
						$filePath = addslashes($compressed);
            if(!isset($_POST['make'])){echo "Please enter a make";}
            if(!isset($_POST['model'])){echo "Please enter a model";}
            if(!isset($_POST['engine'])){echo "Please enter an engine size";} 
            if(!isset($_POST['fuel'])){echo "Please enter a fuel type";} 
            if(!isset($_POST['year'])){echo "Please enter a year";}  
            if(!isset($_POST['doors'])){echo "Please enter amount of doors";} 
            if(!isset($_POST['colour'])){echo "Please enter colour of car";} 
					} 
            
					$query = "INSERT INTO car_details(make,model,engine_size,year,fuel,body,doors,color,path,name,size,type,date_added) ".
					"VALUES ('$make','$model','$engine',$year,'$fuel','$body',$doors,'$colour', '$filePath', '$new_file_name', '$fileSize', '$fileType', CURDATE())";

					mysql_query($query) or die('Error, query failed : ' . mysql_error()); 

					echo ("<br />Files saved to database <br />");
          echo "This is resized".$new_file_name;
          echo("<a href='upload3dir.php'> Click here to upload more stock </a>"); 
          

				}
                       

                 else{ echo("problem in transfer");}


           

               //  }
                 
              //  else
              //  {
                //    echo 'Upload failed: There was likely a permissions error.';
             //   }
              // } 
        //  else
         //   {
               
          /*      echo 'Upload failed: File must be a JPEG file type and 20KB or less in size';
               
              } */
            } 
        else
        {
            echo 'Upload failed: A valid file has not been uploaded!';
        }
          
       


    }
        echo '<br><a href ="protected_page.php">Main Menu</a>';
         
        echo "    </body>\n";
             "</html>";
 
 

    

?>