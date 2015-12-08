<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вывод переменных</title>
     <link href="body.css" rel="stylesheet" type="text/css">
        <style type="text/css"></style>
        <script type="text/javascript" src="script.js"></script>
</head>
<body onLoad="an()" ; class="bodyDiv">
        <div class="backgroundDiv">
            <?php include("header.php");?>
   <div class="bodyField1">
   
   <?php
if($_GET['ref']=="form"){
					$_POST["num1"] = $_SESSION["num1"];
					$_POST["num2"] = $_SESSION["num2"];
					$_POST["men"] = $_SESSION["men"];
					$_POST["result"] = $_SESSION["result"];
                $serv = $_SERVER;
				$p = $_POST;
				$g = $_GET;
				echo "<h3>GET:</h3>";
				foreach($g as $k => $v){
					echo "<p><span class='error'>{$k}:</span> {$v}</p>";
				}
				echo "<h3>POST:</h3>";
				foreach($p as $k => $v){
					echo "<p><span class='error'>{$k}:</span>";
					if(is_array($v))
						foreach($v as $i => $j)
							echo" $j";
					else
						echo " {$v}</p>";
					
				}
				echo "<h3>SERVER:</h3>";
				foreach($serv as $k => $v){
					echo "<p><span class='error'>{$k}:</span> {$v}</p>";
				}
}
?>
   </div>
 
<?php include("footer.php"); ?>
        </div>
    </body>

    </html>


