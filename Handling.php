<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
				$user["num1"] = trim(strip_tags($_POST["num1"]));
				$user["num2"] = trim(strip_tags($_POST["num2"]));
				$user["men"] = trim(strip_tags($_POST["men"]));
				$user["result"] = trim(strip_tags($_POST["result"]));	
				$empty = false;
				$passAccept = true;
				foreach($user as $key => $value){
					if($value == "")
						$empty = true;
					$_SESSION[$key] = $value;
				}					
}
?>
    
    <!DOCTYPE html>    
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
        <title>Dental Helth</title>
        <link href="body.css" rel="stylesheet" type="text/css">
        <style type="text/css"></style>
        <script type="text/javascript" src="script.js"></script>
    </head>

    <body onLoad="an()" ; class="bodyDiv">
        <div class="backgroundDiv">
            <?php include("header.php");?>
               <div class="bodyField">
                <div class="cellTitle">
                    Handling numbers:
                </div>
                <div class="titleArticle">
                    <div style=" margin-left:30px; margin-top:10px;">
                        <?php
    $numb1Err = $numb2Err = $reshenErr = $menErr = "";
    $numb1 = $numb2 = $reshen = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["num1"]))
        {
            $numb1Err = "Number1 is required";
        } 
        else 
        {
            $numb1 = test_input($_POST["num1"]);   
            if (!filter_var($numb1, FILTER_VALIDATE_FLOAT)) 
            {
                $numb1Err = "Invalid Number1 format";
            }
        }
        
        if (empty($_POST["num2"]))
        {
            $numb2Err = "Number2 is required";
        } 
        else 
        {
            $numb2 = test_input($_POST["num2"]);   
            if (!filter_var($numb2, FILTER_VALIDATE_FLOAT)) 
            {
                $numb2Err = "Invalid Number2 format";
            }
        }
        
        if (empty($_POST["result"]))
        {
            $reshenErr = "Result is required";
        } 
        else 
        {
            $reshen = test_input($_POST["result"]);   
            if (!filter_var($reshen, FILTER_VALIDATE_FLOAT)) 
            {
                $reshenErr = "Invalid Result format";
            }
        }
        $optio=$_POST["men"];
        $result=0;
        switch ($optio)
        {
            case "Sum": {$result = (int)$numb1 + (int)$numb2; break;}
            case "Sub": {$result = $numb1 - $numb2; break;}
            case "Mul": {$result = $numb1 * $numb2; break;}
            case "Pow": {$result = pow($numb1, $numb2); break;}
            case "Div": {if($numb2 !=0) {$menErr = "Деление на 0!";} else {$result = $numb1 / $numb2;} break;}
            case "Sqrt": {if ($numb1 > 0)
        	{$menErr = "Первое число должно быть больше 0";}
        	else { $result = sqrt($numb1);}
            break; }                
        }        
    }
    
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                                Number1:
                                <br>
                                <input type="text" id="num1" name="num1" value="<?=@$_POST['num1']?>"><span class="error">* <?php echo $numb1Err;?></span>
                                <br> Number2:
                                <br>
                                <input type="text" id="num2" name="num2" value="<?=@$_POST['num2']?>"><span class="error">* <?php echo $numb2Err;?></span>
                                <br> Function:
                                <br>
                                <select id="men" name="men"  size="1">
                                    <option value="Sum">Sum</option>
                                    <option value="Sub">Sub</option>
                                    <option value="Mul">Mul</option>
                                    <option value="Pow">Pow</option>
                                    <option value="Div">Div</option>
                                    <option value="Sqrt">Sqrt</option>
                                </select> <span class="error"><?php echo $menErr;?></span>
                                <br> Result:
                                <br>
                                <input type="text" id="result" name="result" value="<?=@$_POST['result']?>" /><span class="error">* <?php echo $reshenErr;?></span>
                                <br>
                                <br>
                                <input type="submit" value="Result" name="submit" />
                                <br>
                                <br>
                                <?php 
                                if (((string)$numb1!="") or ((string)$rehen!=""))
                                {
                                if ((int)$result == (int)$reshen)
                                            {echo "Отвер верен! <br>";
                                            echo "<a class='switchServer' href='ServerPerem.php?ref=form'>Перейти к просмотру серверных переменных</a>";}
                                            else {echo "Отвер не верен!"; }
                                }
                                            else {
                                                echo "Вы не ввели все значения!";
                                            }
                                ?>
                                        
                                            
                            </form>
                    </div>
                </div>
            </div>
                <?php include("footer.php"); ?>
        </div>
    </body>

    </html>