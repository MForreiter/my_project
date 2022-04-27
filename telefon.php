<!DOCTYPE html>
<html>
    <?php
    session_start();
    ?>
    <head>
<style>
div.id{

text-align: center;
display:block;
margin-left: auto;
    margin-right: auto;
}
input{
/*Krok 2: Podstawowe style*/
    
    height: 50px;
    width: 50px;
    background:grey;
    border: 2px solid black;
 
    /*Krok 3: Style tekstu*/
    color:white;
    

    
  
    /*Krok 4: Ozdobne style CSS3*/
    background: -webkit-linear-gradient(top, darkgrey, black);
    background: -moz-linear-gradient(top, darkgrey, black);
    background: -o-linear-gradient(top, darkgrey, black);
    background: -ms-linear-gradient(top, darkgrey, black);
    background: linear-gradient(top, darkgrey, black);
 
    -webkit-border-radius: 50px;
    -khtml-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
 
    -webkit-box-shadow: 0 8px 0 #063c03;
    -moz-box-shadow: 0 8px 0 #063c03;
    box-shadow: 0 8px 0 #063c03;
 
    text-shadow: 0 2px 2px rgba(255, 255, 255, 0.2);
}

/*Krok 3: Linkuj styl*/
input {
    text-decoration: none;
}

/*Krok 5: Zachowanie przy najechaniu na button*/
input:hover {
    background: grey;
    background: -webkit-linear-gradient(top, lightgrey, lightgrey);
    background: -moz-linear-gradient(top, lightgrey, lightgrey);
    background: -o-linear-gradient(top, lightgrey, lightgrey);
    background: -ms-linear-gradient(top, lightgrey, lightgrey);
    background: linear-gradient(top, lightgrey, lightgrey);
}




</style>
</head>
<body>
    <div id="id">
<form method="post">
    <input type="hidden" name="action" value="submit" />

<input id="1id" type="submit" name="submit" value="  1  
   ">

<input id="2id" type="submit" name="submit" value="2
ABC">

<input id="3id" type="submit" name="submit" value="3
DEF"><br>

<input id="4id" type="submit" name="submit" value="4
GHI">

<input id="5id" type="submit" name="submit" value="5
JKL">

<input id="6id" type="submit" name="submit" value="6
MNO"><br>

<input id="7id" type="submit" name="submit" value="7
PQRS">

<input id="8id" type="submit" name="submit" value="8
TUV">

<input id="9id" type="submit" name="submit" value="9
WXYZ"><br>

<input id="0id" type="submit" name="submit" value="0  
   "><br>
   <input id="reset" type="submit" name="reset" value="reset  
   ">
   <input id="sid" type="submit" name="submit" value=" space
   ">
</form>

</div>
<?php

if (isset($_POST['action'])) {
    //$value=explode($_POST['submit'], ' ');
   //var_dump(substr($_POST['submit'], 0, 1));
    //echo '<br />The ' . $_POST['submit'] . ' submit button was pressed<br />';
}

if (!isset($_SESSION['input'])){
    $_SESSION['input']='';
}
@$_SESSION['input'].=substr($_POST['submit'], 0, 1);
if (isset($_POST['reset'])){
    session_destroy();

}
//echo $_SESSION["input"];
$result=$_SESSION["input"];

$letters = explode(' ', $result);
$return_value= '';
foreach($letters as $letter){
$return_value .= match ($letter) {
     '2' => 'A',
   '22' => 'B',
    '222' => 'C',
    '3' => 'D',
    '33' => 'E',
    '333' => 'F',
    '4' => 'G',
    '44' => 'H',
    '444' => 'I',
    '5' => 'J',
    '55' => 'K',
    '555' => 'L',
    '6' => 'M',
    '66' => 'N',
    '666' => 'O',
    '7' => 'P',
    '77' => 'Q',
    '777' => 'R',
    '7777' => 'S',
    '8' => 'T',
    '88' => 'U',
    '888' => 'V',
    '9' => 'W',
    '99' => 'X',
    '999' => 'Y',
    '9999' => 'Z',
    default=>'',
};
}
echo $return_value;
//var_dump($return_value);



?>

</body>
</html>