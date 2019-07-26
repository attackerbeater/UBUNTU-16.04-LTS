<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Mall-E</title>
</head>
<body>
	<div class="col-auto">
          <img style="margin-left: 30px;margin-bottom: 15px;border-right: 3px solid #807e7e;padding-right: 30px;" width="83" height="65" src="https://mall-e.net/assets/images/logo/rec.png">
		  <span style="letter-spacing: 1px;min-width:234px;background-color: #66a2e6;font-size: 20px;padding: 8px 15;margin: 10px 30px;color:#ffffff;display:inline-block;text-align:center;vertical-align:top;text-decoration:none!important;">
                    Shopper Registration
                </span>
    </div>
	<div style="padding: 20px; font-family: 'Open Sans Condensed', sans-serif; text-align: left">
		<p style="font-size: 25px;margin-bottom: -5px;">Dear Admin,</p><br>
		<p style="font-size: 20px;">We have received the following Inquiry:</p>
		<p>Shopper ID : <?= @$id ?></p>
		<p>Shopper Name : <?= $name ?></p>
		<p>Gender : <?= @$gender ?></p>
		<p>Country : <?= $country ?></p>
		<p>Email : <?= $sender ?></p>
	</div>
	<div style="background-color: #ebebeb;padding: 20px;margin-top: 15px;font-family: 'Open Sans Condensed', sans-serif;text-align: center">
		<h5>VISIT US @ <a href="http://mall-e.net/" target="_blank">mall-e.net</a></h5>
	</div>

</body>
</html>