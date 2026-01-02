<?php
$yal = isset($_GET['x']) ? $_GET['x'] : 0;

$info = [
    "Alice" => 45,
    "Bob"   => 60,
    "Cara"  => 75,
    "David" => 20,
    "Eva"   => 49,
    "Frank" => 55,
    "Grace" => 0,
    "Hank"  => 20.0,
    "Ivy"   => 47,
    "Jack"  => 70
];

function tricky_while($arr, $yal)
{
    $keys = array_keys($arr);
    $i = 0;

    while ($i < count($keys))
    {
        $name  = $keys[$i];
        $marks = $arr[$name];
        $num   = (int)$marks + (int)$yal;

        switch ($i + 1)
        {
            case 1:
                echo md5($name) . "<br>";
                break;

            case 2:
                echo strlen($name) * 2 . "<br>";
                break;

            case 3:
                echo str_shuffle($name) . "<br>";
                break;

            case 4:
                echo strtolower(strrev($name)) . "<br>";
                break;

            case 5:
                echo pow($num, 2) . "<br>";
                break;

            case 6:
                echo sqrt($num) . "<br>";
                break;

            case 7:
                echo ($num >= 40 ? "Qualified" : "Disqualified") . "<br>";
                break;

            case 8:
                echo gettype($marks) . "<br>";
                break;

            case 9:
                echo ($marks * $i) . "<br>";
                break;

            case 10:
                echo implode(" ", str_split($name)) . "<br>";
                break;
        }

        $i++;
    }
}

tricky_while($info, $yal);
?>
