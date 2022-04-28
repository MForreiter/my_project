<?php

namespace App\Controller;

class ZadController
{
//public function if($x=0){
//    echo "0";
  //  $x=1;
//}else{
  //  echo "1";
   // $x=0;
//}
public function create(){
    for($x=0; $x<10; $x++){
        for ($y=0; $y<10; $y++){
            echo '0';
            echo '1';
        }
        echo "<br>";
    }
}



}