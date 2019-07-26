<?php

$a = 1;
$b = &$а;
$b = "2$a";

echo $b;
echo '<br/>';

$x = 1;
if ($x == '1') {
  echo 'a';
}
if ($x == true) {
  echo 'b';
}


if((bool)$x === true){
  echo 'e';
}

if ($x === true) {
  echo 'c';
}

if((int)$x === true){
  echo 'd';
}

if((int)$x === true){
  echo 'd';
}
echo '<br/>';
$a = true;
echo gettype($a);
echo '<br/>';
$b = 1;
if((int)$a == true){
  echo 'e';
}
