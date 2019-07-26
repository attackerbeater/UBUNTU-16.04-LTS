<?php
//TechWorld3g - Please Support Us <3
//Facebook : https://www.facebook.com/TechWorld3g 
//Twitter : https://twitter.com/TechWorld3g 
//Youtube : https://www.youtube.com/user/TechWorld3g 
//Blog : https://tech-world3g.blogspot.com 
//Donate : https://imraising.tv/u/techworld3g﻿

require_once "tools/mpdf/mpdf.php"; // MPDF library

function exportPDF($text,$path)
{	
	try 
	{	
		$pdf = new mPDF();
		
		$stylesheet = file_get_contents('style.css');

		$pdf->WriteHTML($stylesheet, 1);
		$pdf->WriteHTML($text, 2);
		// $pdf->writeBarcode('978-1234-567-890', 3);
		$pdf->Output($path,'F'); //$pdf->Output('../files/example.pdf','F');
		
		return true;
	} 
	catch(Exception $e) 
	{
		return false;
	}
}	
