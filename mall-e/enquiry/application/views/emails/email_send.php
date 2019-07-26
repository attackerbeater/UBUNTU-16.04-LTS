<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Mall-E Enquiry</title>
</head>
<body>
	<div style="padding: 20px;background-color: #591E37;text-align: center;font-family: 'Open Sans Condensed', sans-serif">
		<h1 style="color: #fff">MALL-E ENQUIRY</h1>
	</div>
	<div style="padding: 20px; font-family: 'Open Sans Condensed', sans-serif; text-align: left">
		<p style="font-size: 25px;margin-bottom: -5px;">Dear Admin,</p><br>
		<p style="font-size: 20px;">You have received the following inquiry:</p>
		<p>Merchant Name : <?= $merchant ?></p>
		<p>Name : <?= $name ?></p>
		<p>Country : <?= $country ?></p>
		<p>Contact Number : <?= $number ?></p>
		<p>Email : <?= $sender ?></p>
	</div>
	<div style="background-color: #ebebeb;padding: 20px;margin-top: 15px;font-family: 'Open Sans Condensed', sans-serif;text-align: center">
		<h5>VISIT US @ <a href="http://mall-e.net/" target="_blank">mall-e.net</a></h5>
	</div>

</body>
</html>