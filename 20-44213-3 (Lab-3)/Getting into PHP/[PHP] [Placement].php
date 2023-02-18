<html>
    <head>
        <title>PlaceHolders</title>
    </head>
    <body>
1.<br/>        

        <?php 
        $length = 100;
        $width = 20;
        $area = $length * $width;
        echo"The area of Ractangle is : ".$area ."<br>";

        $perimeter = 2*($length+$width);
        echo"The perimeter of Ractangle is : $perimeter";
        ?>
        </br>
2.<br/>  
        
        <?php
        $amount = 100;
        $vat = $amount*(0.15);
        echo "Total VAT is: " . $vat;
        ?>
        </br>

3.<br/>  
        <?php
        $num = 13;
        if ($num % 2 == 0)
        {
            echo "Given Number $num  is even";
        } else 
        {
        echo "Given Number $num  is odd";
        }
        ?>
        </br>

4.<br/>  
        <?php
        $Number1 = 70;
        $Number2 = 71;
        $Number3 = 72;
        if ($Number1 >= $Number2 && $Number1 >= $Number3) 
        {
        echo"$Number1  is the largest Number";
        } 
        elseif ($Number2 >= $Number1 && $Number2 >= $Number3) 
        {
        echo "$Number2 is the largest Number";
        } 
        else 
        {
        echo "$Number3  is the largest Number";
        }
        ?>
        </br>

5.<br/>  
        <?php

        for($num=10;$num<=100;$num++)
        {
            if($num%2!==0)
            {
                echo "$num\n";
            }
        }
        ?>
        </br>

6.<br/>  
        <?php 

            for($i=0;$i<=2;$i++)
            {        
                for($j=0;$j<=$i;$j++){
                    echo "*";
                }
                echo "<br>";
            }
            echo "<br>";
            for($i=2;$i>=0;$i--)
            {
                $x=1;        
                for($j=0;$j<=$i;$j++){
                    echo ($x. " ");
                    $x=$x+1;
                }
                echo "<br>";
            }
        echo "<br>";
            $k=55;
            for($i=0; $i<4; $i++)
            {
            for($j=0;$j<$i;$j++)
            {
                echo chr($k)," ";
                $k++;
            }
                echo"</br>";
            }
        ?>
    </body>
</html>