<?php
    // Get image string posted from Android App
    $base=$_REQUEST['image'];
    // Get file name posted from Android App
    $filename = $_REQUEST['filename'];
    $user_id = $_REQUEST['userid'];
    // Decode Image
    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    // Images will be saved under 'www/imgupload/uplodedimages' folder
    $file = fopen('../newSite/Documents/'.$filename, 'wb');
    // Create File
    $is_written = fwrite($file, $binary);
    fclose($file);
	
    if($is_written > 0) {
		
		$connection = mysqli_connect('<Your connection details here>');
               
                $query = "UPDATE users SET NIC_back = '$filename' WHERE id = '$user_id';";
		
		$result = mysqli_query($connection, $query) ;
		
		if($result){
			echo "success";
		}else{
			echo "failed";
		}
		
		mysqli_close($connection);
	}
    
?>