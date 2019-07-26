<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Redirect;

class PdfController extends Controller
{
  public function unlinkPdf($id, $client_id, $pdfFile, $dir, $column, $dataColumnDate)
  {
    if($dir == 'supplier'){
      // echo 1;
      // echo "<br/>";
      // echo $column;
      // echo "<br/>";
      $FILEPATH ='storage/supplier/'.$id.'-'.$client_id.'/'.$pdfFile;
    }else{
      // echo 2; 
      // echo "<br/>";
      $FILEPATH ='storage/client/'.$id.'-'.$client_id.'/'.$pdfFile;
    }
    
    // echo "<br/>";
    
    if(file_exists($FILEPATH))
    {      
      
      // echo 3;
      @unlink($FILEPATH);
      Orders::where('id', $id)->update(array($column => '', $dataColumnDate =>''));
    
      return redirect()->back()->with('success', "pdf file $pdfFile has been deleted");   
    } else {
      // echo 4;
      @unlink($FILEPATH);
      Orders::where('id', $id)->update(array($column => '', $dataColumnDate =>''));
    
      return redirect()->back()->with('success', "there's no deleted action happens");   
    }
  }
}
