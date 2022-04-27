<?php

namespace App\Controller;

class TestController
{
    public function all()
    {
        $c=1;
        while($c<=5){
            for ($i = 0; $i < 1; $i++) {

                for($a = 0; $a <5; $a++) {
                    echo "0";
                    echo "1";

                }
                echo "<br>";
            }
            for ($i = 0; $i < 1; $i++) {

                for($a = 0; $a <5; $a++) {
                    echo "1";
                    echo "0";

                }
                echo "<br>";
            }
            $c++;
        }

    }
}