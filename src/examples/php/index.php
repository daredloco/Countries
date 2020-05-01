<?php

/*
 * License: https://github.com/daredloco/Countries/blob/master/LICENSE
 * Github Link: https://github.com/daredloco/Countries/
 *
 * Copyrights: Roman Wanner 2020
 */
include('../../codes/php/Countries.php'); //Includes the Countries.php file
use Rowa\Countries as Countries; //loads the class from the file and sets it as "Countries"

$countries = new Countries(); //creates a new instance of "RoWa\Countries"
?>
<html>
<?php
echo '<b>Object:</b><br>';
print_r($countries->getCountry('ch')); //prints the whole content of the array for the country "ch"
echo '<br><br>';
echo '<b>Single Key (Size):</b><br>';
echo $countries->getCountry('ch')->Size; //Gets a single key "Size" and returns its value
?>
</html>