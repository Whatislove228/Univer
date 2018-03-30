<?php
class Rl
{
    public static function combine($RL1,$RL2)
    {
        unset($RL1[0],$RL2[0]);
        $result = array_merge($RL1,$RL2);
        array_unshift($result,0,count($result));
        return $result;
    }
    public static function compare($Rl1,$Rl2)
    {

        for($i=1;$i<=count($Rl1);$i++)
        {

            if($Rl1[$i] > $Rl2[$i])
            {
                $flag = "&gt";
                break;
            }
            if($Rl1[$i] < $Rl2[$i])
            {
                $flag = "&lt";
                break;
            }
            if($Rl1[$i] = $Rl2[$i])
            {
                $flag = "=";
                if (count($Rl1) > count($Rl1))
                {
                    $flag = ">";
                }
                if (count($Rl1) < count($Rl1))
                {
                    $flag = "<";
                }
                if (count($Rl1) == count($Rl1))
                {
                    $flag = "=";
                }

            }
        }

        return $flag;
    }
    public static function sorting($Rl1,$Rl2)
    {
        $result = self::combine($Rl1,$Rl2);
        unset($result[0],$result[1]);
        arsort($result);
        array_unshift($result,0,count($result));
        return $result;
    }
    public static function similar($Rl1,$Rl2){
            $x = self::sorting($Rl1, $Rl2);
            unset($x[0], $x[1]);
            for ($i = 0; $i < count($x); $i++) {
                $x = array_values($x);
                if ($x[$i] === $x[$i + 1]) {
                    unset($x[$i + 1]);
                    $x[$i] = $x[$i] + 1;
                }
            }
        for ($i = 0; $i < count($x); $i++) {
            $x = array_values($x);
            if ($x[$i] === $x[$i + 1]) {
                unset($x[$i + 1]);
                $x[$i] = $x[$i] + 1;
            }
        }

        for ($i = 0; $i < count($x); $i++) {
            $x = array_values($x);
            if ($x[$i] === $x[$i + 1]) {
                unset($x[$i + 1]);
                $x[$i] = $x[$i] + 1;
            }
        }

        for ($i = 0; $i < count($x); $i++) {
            $x = array_values($x);
            if ($x[$i] === $x[$i + 1]) {
                unset($x[$i + 1]);
                $x[$i] = $x[$i] + 1;
            }
        }
        for ($i = 0; $i < count($x); $i++) {
            $x = array_values($x);
            if ($x[$i] === $x[$i + 1]) {
                unset($x[$i + 1]);
                $x[$i] = $x[$i] + 1;
            }
        }

        for ($i = 0; $i < count($x); $i++) {
            $x = array_values($x);
            if ($x[$i] === $x[$i + 1]) {
                unset($x[$i + 1]);
                $x[$i] = $x[$i] + 1;
            }
        }

        array_unshift($x,0,count($x));
        return $x;

    }
    public static function similar1($Rl1,$Rl2){
        arsort($Rl1);
        arsort($Rl2);
        unset($Rl1[0],$Rl2[0]);
        for($i=0;$i<count($Rl1);$i++)
        {

            $Rl1 = array_values($Rl1);
            $Rl2 = array_values($Rl2);

            if($Rl1[$i] === $Rl2[$i])
            {
                unset($Rl1[$i],$Rl2[$i]);
            }

        }
        array_unshift($Rl2,0,count($Rl2));
        return $Rl1;

    }
    public static function similar2($Rl1,$Rl2){
        arsort($Rl1);
        arsort($Rl2);
        unset($Rl1[0],$Rl2[0]);
        for($i=0;$i<count($Rl2);$i++)
        {
            $Rl1 = array_values($Rl1);
            $Rl2 = array_values($Rl2);
            if($Rl1[$i] === $Rl1[$i+1])
            {
                unset($Rl1[$i+1]);
                $Rl1[$i] = $Rl1[$i]+1;
            }
            if($Rl2[$i] === $Rl2[$i+1])
            {
                unset($Rl2[$i+1]);
                $Rl2[$i] = $Rl2[$i]+1;
            }

        }
        array_unshift($Rl2,0,count($Rl2));
        return $Rl2;
    }

    public static function Code($Rl1,$Rl2)
    {


        for($i = $Rl1[1] - 1; $i >= end($Rl2);$i--)
        {
            $Code[$i] = $i;

        }
        array_unshift($Code,count($Code));
        return $Code;

    }

    public static function deleteUnunique($Rl2){
        unset($Rl2[0]);
        $result = array_diff($Rl2, array_diff_assoc($Rl2, array_unique($Rl2)));
        array_unshift($result,count($result));
        return $result;
    }
    public static function subtraction($Rl1,$Rl2)
    {
        echo "<br>";
        echo "Удалить одинаковые из RL1: 0.";
        $deleteRl1 = self::similar1($Rl1,$Rl2);
        unset($deleteRl1[0]);
        foreach ($deleteRl1 as $item)
        {
            echo $item . '.';
        }
        echo "<br>";
        echo "Удалить одинаковые из RL2: 0.";
        $deleteRl2 = self::similar2($Rl1,$Rl2);
        unset($deleteRl2[0]);
        foreach ($deleteRl2 as $item)
        {
            echo $item . '.';
        }
        echo "<br>";
        $DCode = self::Code($Rl1,$Rl2);
        echo "Dcode: 0.";
        foreach ($DCode as $item)
        {
            echo $item . '.';
        }
        $similarDCode = self::similar($DCode,$Rl2);
        echo "<br>";
        unset($similarDCode[0]);
        echo "Удаляем одинаковые из допкода: 0.";
        foreach ($similarDCode as $item)
        {
            echo $item . '.';
        }
        unset($Rl1[1]);
        $combine = self::combine($Rl1,$similarDCode);

        echo "<br>";
        echo "Combine RL1 and SimilarDcode :";
        foreach ($combine as $item)
        {
            echo $item . '.';
        }
        unset($combine[0]);
        echo "<br>";
        arsort($combine);
        echo "Sort combine RL1 and Dcode: 0.";
        foreach ($combine as $item)
        {
            echo $item . '.';
        }
        echo "<br>";
        echo "Similar Combine: 0.";
        $x = $combine;
        unset($x[0],$x[1]);
        for($i=0;$i<count($x);$i++)
        {
            $x = array_values($x);
            if($x[$i] === $x[$i+1])
            {
                unset($x[$i+1]);
                $x[$i] = $x[$i]+1;
            }

        }
        for($i=0;$i<count($x);$i++)
        {
            $x = array_values($x);
            if($x[$i] === $x[$i+1])
            {
                unset($x[$i+1]);
                $x[$i] = $x[$i]+1;
            }

        }
        for($i=0;$i<count($x);$i++)
        {
            $x = array_values($x);
            if($x[$i] === $x[$i+1])
            {
                unset($x[$i+1]);
                $x[$i] = $x[$i]+1;
            }

        }
        for($i=0;$i<count($x);$i++)
        {
            $x = array_values($x);
            if($x[$i] === $x[$i+1])
            {
                unset($x[$i+1]);
                $x[$i] = $x[$i]+1;
            }

        }
        for($i=0;$i<count($x);$i++)
        {
            $x = array_values($x);
            if($x[$i] === $x[$i+1])
            {
                unset($x[$i+1]);
                $x[$i] = $x[$i]+1;
            }

        }
        array_unshift($x,count($x));
        foreach ($x as $item)
        {
            echo $item . '.';
        }
    }
}

$RL1 = [10, 13, 12, 10, 8, 6, 5, 4, 3, 1, 0];
$RL2 = [6, 12, 11, 7, 4, 3, 1];
echo  "RL1: 0." ;
foreach ($RL1 as $item)
{
    echo $item . '.';
}
echo "<br>";
echo "RL2: 0.";
foreach ($RL2 as $item)
{
    echo $item . '.';
}
$rl = Rl::combine($RL1,$RL2);
echo "<br>"."Поєдання: ";
foreach ($rl as $item)
{
    echo $item. ".";
}
echo "<br>";
echo "Сортування: ";
$rl = Rl::sorting($RL1,$RL2);
foreach ($rl as $item)
{
    echo $item. ".";
}
echo "<br>";
echo "Приведення подібних(Результат додавання): ";
$rl = Rl::similar($RL1,$RL2);
foreach ($rl as $item)
{
    echo $item. ".";
}
echo "<br>";
echo "Порівняння: ";
$rl = Rl::compare($RL1,$RL2);
echo "RL1". $rl . "RL2";



Rl::subtraction($RL1,$RL2);
echo "<br>";

