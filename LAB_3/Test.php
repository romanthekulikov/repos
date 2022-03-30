<?php
$string = $_GET["key"];
$i = 0;
$symbolCount = 0;
$symbolCountTemp = 0;
$lengthString = strlen($string);
$arrStr = str_split($string);
$arrTempStr = array();
while ($arrStr[$i] != $arrStr[$lengthString])
{
    if (!(in_array($arrStr[$i], $arrTempStr)))
    {
        $symbolCount = substr_count($string, $arrStr[$i]);
        array_push($arrTempStr, $arrStr[$i]);
        if ($symbolCount != 1)
        {
            $symbolCountTemp = $symbolCountTemp + $symbolCount;
        }
    }
    
    $i++;
}
echo "$symbolCountTemp";
?>