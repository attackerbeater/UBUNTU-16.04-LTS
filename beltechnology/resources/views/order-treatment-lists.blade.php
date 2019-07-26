<?php
$order_treatment_details = array_unique($output['order_treatment_details']);
echo '<ul>';
foreach (array_unique($output['order_treatment']) as $key => $value) {
  echo "<li><u>".$value."</u>";
  echo "<ol>";
  echo "<li><p>".$order_treatment_details[$key]."</p></li>";
  echo "</ol>";
  echo "</li>";
}
echo '<ul>';
