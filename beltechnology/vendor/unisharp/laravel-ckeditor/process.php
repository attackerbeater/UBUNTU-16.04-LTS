<?php
	
	
	//TechWorld3g - Please Support Us <3
	//Facebook : https://www.facebook.com/TechWorld3g 
	//Twitter : https://twitter.com/TechWorld3g 
	//Youtube : https://www.youtube.com/user/TechWorld3g 
	//Blog : https://tech-world3g.blogspot.com 
	//Donate : https://imraising.tv/u/techworld3g﻿

	include 'exportpdf.php';

	//--------------------------//

	if((isset($_POST['editor'])) && (!empty(trim($_POST['editor']))))
	{
		$posted_editor = trim($_POST['editor']);
		if (!file_exists("../../../storage/{$_POST['transaction_type']}/{$_POST['order_id']}-{$_POST['client_id']}")) {
		  mkdir("../../../storage/{$_POST['transaction_type']}/{$_POST['order_id']}-{$_POST['client_id']}", 0777, true);
		  $path = "../../../storage/{$_POST['transaction_type']}/{$_POST['order_id']}-{$_POST['client_id']}/{$_POST['filename']}.pdf"; 		  
		}else{
			$path = "../../../storage/{$_POST['transaction_type']}/{$_POST['order_id']}-{$_POST['client_id']}/{$_POST['filename']}.pdf";		
		}
			
		$conn = new mysqli('127.0.0.1', 'ipljhaaodhin', 'BPm-nVU-HAL-8x', 'Beltechnology_db');
	
		// Check connection
		if ($conn->connect_error) {
				$msg = "Connection failed: " . $conn->connect_error;
				file_put_contents('./log_1'.date("F j, Y, g:i a").'.log', $msg, FILE_APPEND);
		    die($msg);								
		} 
		
		$column = $_POST['filename'];
		$column_created = 'created_'.$column;
		$pdf = "'" .$column.".pdf'";
		$id = $_POST['order_id'];
		
		// Change the line below to your timezone!
		date_default_timezone_set('Europe/Brussels');
		$date = date('Y-m-d h:i:s', time());
		$date = "'".$date."'";

		$sql = "UPDATE `orders` SET $column = $pdf, $column_created = $date WHERE `id`= $id";
		file_put_contents('./log_2'.date("F j, Y").'.log', $sql, FILE_APPEND);
		
		if ($conn->query($sql) === TRUE) {
		    $msg = "Record updated successfully";
				// file_put_contents('./log_'.date("F j, Y, g:i a").'.log', $msg, FILE_APPEND);
		} else {
		    $msg = "Error updating record: " . $conn->error;
				// file_put_contents('./log_'.date("F j, Y, g:i a").'.log', $msg, FILE_APPEND);
		}
		$conn->close();
		
		if(exportPDF($posted_editor,$path))
		{										
			header("Content-Description: File Transfer"); 
			header("Content-Type: application/octet-stream"); 
			header("Content-Disposition: attachment; filename=" . basename($path)); 
			readfile($path);
			exit(); 				
		}
		else
		{
			$msg = "Failed to export the pdf file!";
			// file_put_contents('./log_'.date("F j, Y, g:i a").'.log', $msg, FILE_APPEND);
		}				
	}
	else 
	{
		$msg = "Error : Empty content!";
		// file_put_contents('./log_'.date("F j, Y, g:i a").'.log', $msg, FILE_APPEND);
	}
	
	//Warning : if file already exists, it will be overwritten!  
