<?php

namespace App\Controller;

use App\Entity\Calc;
use App\Form\Type\CalcType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalcController extends AbstractController
{
    /**
     * @Route ("/calc/new", name="calc_new")
    */
    public function new(Request $request): Response
    {
        $calc = new Calc();

        $form = $this->createForm(CalcType::class, $calc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $i=0;
            $liczba = str_split($calc->getCalculations());
            while ($i <count($liczba)){
            if($liczba[$i]=='*' || $liczba[$i]=='/'){
                $j=$i-1;
                $a='';
                $b='';
                $start=0;
                $end=0;
                while($j>=0){
                    if(!in_array($liczba[$j],['+','-','/','*'])){
                        $a=$liczba[$j].$a;
                        $start=$j;
                        $j--;
                    }
                    else{
                        break;
                    }

                }
                $j=$i+1;
                while($j<count($liczba)){
                    if(!in_array($liczba[$j],['+','-','/','*'])){
                        $b=$b.$liczba[$j];
                        $end=$j;
                        $j++;
                    }
                    else{
                        break;
                    }

                }
                if($liczba[$i]=='*'){
                    $resault=$a*$b;
                }
                else{
                    $resault=$a/$b;
                }

                $x=0;
                $newLiczba = [];
                while ($x < $start) {
                    $newLiczba[$x] = $liczba[$x];
                    $x++;
                }

                $z=0;
                $resaultArray = str_split($resault);
                while ($z < strlen($resault)) {
                    $newLiczba[$x] = $resaultArray[$z];
                    $z ++;
                    $x ++;
                }
                $y = $end +1;
                while ($y < count($liczba)) {
                    $newLiczba[$x] = $liczba[$y];
                    $x++;
                    $y++;

                }


                $i = -1;
                $liczba = $newLiczba;

            }
            elseif(($liczba[$i]=='+' || $liczba[$i]=='-')&& (!in_array('*',$liczba))&& (!in_array('/',$liczba))){
                $j=$i-1;
                $a='';
                $b='';
                $start=0;
                $end=0;
                while($j>=0){
                    if(!in_array($liczba[$j],['+','-','/','*'])){
                        $a=$liczba[$j].$a;
                        $start=$j;
                        $j--;
                    }
                    else{
                        break;
                    }

                }
                $j=$i+1;
                while($j<count($liczba)){
                    if(!in_array($liczba[$j],['+','-','/','*'])){
                        $b=$b.$liczba[$j];
                        $end=$j;
                        $j++;
                    }
                    else{
                        break;
                    }

                }
                if($liczba[$i]=='+'){
                    $resault= (int)$a + (int)$b;
                }
                else{
                    $resault=(int)$a-(int)$b;
                }

                $x=0;
                $newLiczba = [];
                while ($x < $start) {
                    $newLiczba[$x] = $liczba[$x];
                    $x++;
                }

                $z=0;
                $resaultArray = str_split($resault);
                while ($z < strlen($resault)) {
                    $newLiczba[$x] = $resaultArray[$z];
                    $z ++;
                    $x ++;
                }
                $y = $end +1;
                while ($y < count($liczba)) {
                    $newLiczba[$x] = $liczba[$y];
                    $x++;
                    $y++;

                }


                $i = -1;
                $liczba = $newLiczba;





            }
                $i++;


            }





            echo 'Wynik: '.implode($liczba);


        }
        return $this->renderForm('calc/new.html.twig', [
            'form' => $form
        ]);


    }

}