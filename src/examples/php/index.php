<?php

/*
 * License: https://github.com/daredloco/Countries/blob/master/LICENSE
 * Github Link: https://github.com/daredloco/Countries/
 *
 * Copyrights: Roman Wanner 2020
 */
include('Countries.php');
use Rowa\Countries as Countries;
use Rowa\Cities as Cities;
$countries = new Countries('countries.json');
$cities = new Cities();
?>
<html>
<?php
echo '<b>Object:</b><br>';
print_r($countries->getCountry('ch'));
echo '<br><br>';
echo '<b>Single Key (Size):</b><br>';
echo $countries->getCountry('ch')->Size;
echo '<br><br><br>';
echo count($countries->data);
echo '<br><br><br>';
echo "City: ".$cities->getCity('bern')->English;
echo '<br><br><br>';
echo '<b>Cities:</b><br>';
print_r($cities->getCitiesFromCountry('ch'));
?>
</html>