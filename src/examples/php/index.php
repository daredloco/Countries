<?php

/*
 * License: https://github.com/daredloco/Countries/blob/master/LICENSE
 * Github Link: https://github.com/daredloco/Countries/
 *
 * Copyrights: Roman Wanner 2020
 */
include('../../codes/php/Countries.php');
use Rowa\Countries as Countries;

$countries = new Countries();
?>
<html>
<?php
echo '<b>Object:</b><br>';
print_r($countries->getCountry('ch'));
echo '<br><br>';
echo '<b>Single Key (Size):</b><br>';
echo $countries->getCountry('ch')->Size;
?>
</html>