<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	div {
	    height: 300px;
	    background: red;
	    position: relative;
	}

	div:before {
	    content: '';
	    position: absolute;
	    top: 0; right: 0;
	    border-top: 80px solid white;
	    border-left: 80px solid red;
	    width: 0;
	}		
	</style>
</head>
<body>
	<div></div>
</body>
</html>