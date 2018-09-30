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



function cd_meta_box_cb()
{  ?>
    <label for="my_meta_box_text">Text Label</label>
    <input type="text" name="my_meta_box_text" id="my_meta_box_text" />
    <?php 

}

echo "ASDASDASDASD"

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    echo "test";
    add_meta_box( 'wp-asap-meta-box', 'My First Meta Box', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

?>