<?php
header("Content-Type: text/plain");

function getGetParameter(string $paremeterName): ?string
{
    return isset($_GET[$paremeterName]) ? $_GET[$paremeterName] : null;
}

$identifie = getGetParameter("identifier");
if ($identifie == null)
{
    echo "Not found";
}
else
{

    $i = 1;
    $answer = "";
    $length = strlen($identifie);//strlen длина строки
    $arrId = str_split($identifie); //str_split разделяет строку на символы и создает массив их них

    if (ctype_alpha($arrId[0]))
    {
        while ($arrId[$i] != $arrId[$length - 1])
        {
            if ((ctype_alpha($arrId[$i])) or is_numeric($arrId[$i]))
            {
                $answer = "Yes";
            }
            else 
            {
                $answer = "No";
                break;
            }
            $i++;
        }
        echo "$answer";
    }  
    else
    {
        echo "No";
    } 
}

?>