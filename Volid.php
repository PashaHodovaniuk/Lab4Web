<?php
$numb1Err = $numb2Err = $reshenErr = "";
$numb1 = $numb2 = $reshen = "";

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (empty($_POST["num1"]))
    {
        $numb1Err = "Number1 is required";
    } else {
        $numb1 = test_input($_POST["num1"]);   
        if (!filter_var($numb1, FILTER_VALIDATE_FLOAT)) {
            $numb1Err = "Invalid Number1 format";
        }
        else{
            $_REQUEST['num1'];
        }
    }
    
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
