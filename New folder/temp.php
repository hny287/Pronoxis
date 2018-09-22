<?php
$Mdir=getcwd();

echo $Mdir;



$a = scandir($Mdir);

// Sort in descending order
$b = scandir($Mdir,1);

print_r($a);
echo "<br>";
print_r($b);
?>