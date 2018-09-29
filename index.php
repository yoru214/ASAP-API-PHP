<?php
include 'ASAPAPI.php';


$ASAPAPI = new ASAPAPI();
$ASAPAPI->Username = "org1017";
$ASAPAPI->Password = "2ABD37B";
$ASAPAPI->OrganizationID = "1017";
$ASAPAPI->APIKEY = "C176E58";


echo $ASAPAPI->GetClasses();

// $json = json_decode($ASAPAPI->GetClasses(),true);

// // var_dump($json);

// foreach($json as $count => $courses) 
// {
    
//     echo "CourseID: " . $courses['CourseID'] . "<br>" . $courses['CourseName']."<br>"  ;

//     foreach($courses as $coursekey => $coursevalue)
//     {
//         print_r( $coursevalue);
//     }



//     echo "<br>";
// }
?>