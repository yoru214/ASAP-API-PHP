<?php
include 'ASAPAPI.php';


$ASAPAPI = new ASAPAPI();
$ASAPAPI->Username = "org1017";
$ASAPAPI->Password = "2ABD37B";
$ASAPAPI->OrganizationID = "1017";
$ASAPAPI->APIKEY = "C176E58";


echo $ASAPAPI->Authenticate();



?>