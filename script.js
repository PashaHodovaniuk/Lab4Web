function f_submit() {	
    var numb1 = document.getElementById("num1");
	var numb2 = document.getElementById("num2");
	var menu = document.getElementById("men");
	var temp;
	 switch (menu.options[menu.selectedIndex].value) {
        case "Sum":
			 {
        	temp = +numb1.value + +numb2.value;
            break;}
        case "Sub":
			 {
        	temp = +numb1.value - +numb2.value;
            break;}
        case "Mul":
			 {
        	temp = +numb1.value * +numb2.value;
            break;}
        case "Pow":
			 {
            temp = Math.pow(+numb1.value,+numb2.value); 
            break;}
        case "Div":
			 {
        	if (+numb2.value != 0)
        	{windows.alert("Деление на 0");}
        	else { temp = +numb1.value / +numb2.value;}
            break;}
        case "Sqrt":
			 {
            if (+numb1.value > 0)
        	{windows.alert("Преове число должно быть больше 0");}
        	else { temp = Math.sqrt(+numb1.value);}
            break;   }     
        default:
        	break;
            
    }
    var result = document.getElementById("result");
    if (temp == +result.value)
    {document.getElementById("go").innerHTML="Ответ верен!";
        setTimeout("location.href ='redir.html';", 1000);
    return false;}
    else {result.style.backgroundColor = "red";}
    return true;   
}


function an() {
    var element = document.getElementById("anim1");
    var from = -500;
    var to = 0;
    var duration = 2000;
    var start = new Date().getTime();
    function delta(progress) {
        return progress;
    }
    setTimeout(function () {
        var now = (new Date().getTime()) - start;
        var progress = now/duration; 
        var result = (to - from) * delta(progress) + from;
        element.style.marginLeft = result + "px";
        if (to = 0) {
            var result = (to1 - from1) * delta(progress) + from1;
            element1.style.marginTop = result + "px";
        }
        if (progress < 1) setTimeout(arguments.callee, 10);
    }, 10);
}

var start = new Date();
start = Date.parse(start) / 1000;
var counts = 5;
function CountDown() {
    var now = new Date();
    now = Date.parse(now) / 1000;
    var x = parseInt(counts - (now - start), 10);
    if (document.forms) 
    {  
        document.form1.clock.value = x;
    }
    if (x > 0) {
        timerID = setTimeout("CountDown()", 100)
    } else {
        location.href = "Index.html"
    }
}
window.setTimeout('CountDown()', 100);