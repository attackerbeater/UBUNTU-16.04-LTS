
  <?php 

	                setlocale(LC_MONETARY, 'nl_NL.UTF-8');
	                // $amount = money_format('%(#1n', 20);
	               	$amount = 124124;
	                $amount = money_format($amount, 2);
	                echo $amount;
	                ?>