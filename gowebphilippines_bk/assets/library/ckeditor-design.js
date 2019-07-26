function textareCkEditor(txtareaname, BASE_URL){

	var ck = CKEDITOR.replace(txtareaname,
	{
	  height: '1000px',
	  on: {
	          instanceReady: function() {
	              this.document.appendStyleSheet( BASE_URL+"/assets/css/print.css" );
	          }
	      },
	  qtBorder: '0',
	  startupShowBorders: false,    
	});

	return ck;
}
