

function pdfDeleteiv() {
  let dataId = document.getElementById("pdfdelete-iv").getAttribute("data-id"); 
  let dataPdf = document.getElementById("pdfdelete-iv").getAttribute("data-pdf");                     

  if (confirm("Do you really want to delete pdf?"))
      window.location.href =  window.location.origin+"/admin/unlinkPdf/"+dataId+'/'+dataPdf+'/client;                     
  else
    return false;
   
}
