<?php
declare(strict_types=1);

$year = 2026;
$month = 7; 

function schedule ($month, $year): void 
{
    $currentday = date_create(datetime: $year.'-'.$month.'-1');
    $workingday= 1;
    $dayInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    echo "количество календарных дней в выбранном месяце ".$dayInMonth.PHP_EOL;
    
 
     for ($i=0; $i < $dayInMonth; $i++) { 
          $dayPerWeek =  $currentday ->format(format:'N'); 
               
       if ($dayPerWeek === '6'|| $dayPerWeek === '7' ) {
          
          echo "\033[31m".$currentday->format('d-m-Y(l)')." выходной"."\033[0m".PHP_EOL; 
          $workingday = ($dayPerWeek == '6') ? 2 : 1 ;
          
           
            } 
            elseif ($workingday === 1) {
               echo "\033[32m".$currentday->format('d-m-Y(l)')." рабочий"."\033[0m".PHP_EOL;
               $workingday ++;
                
           } else {
             echo $currentday->format('d.m.Y.(l)').PHP_EOL;
             $workingday ++;
             if ($workingday === 4)
               $workingday = 1;
      
             
            }
            
          $currentday ->modify('+ 1 days'); 
         

         } 
     }
