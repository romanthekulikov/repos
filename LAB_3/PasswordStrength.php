<?php
header("Content-Type: text/plain");


function securityNumberCount(string $string): int //Возвращает количество чисел в пароле
{
    $i = 0;
    $numberCount = 0;
    $lengthString = strlen($string);
    $arrStr = str_split($string);
    while ($arrStr[$i] != $arrStr[$lengthString])
    {
        if (is_numeric($arrStr[$i]))//is_numeric функция для определения цифры
        {
            $numberCount++;
        }
        $i++;
    }
    return $numberCount;
}

function securityUpperAlphaCount(string $string): int //Возвращает количество символов в верхнем регистре, включая числа
{
    $i = 0;
    $alphaCount = 0;
    $lengthString = strlen($string);
    $arrStr = str_split($string);
    while ($arrStr[$i] != $arrStr[$lengthString])
    {
        if (ctype_alpha($arrStr[$i]))
        {
            if (ctype_upper($arrStr[$i]))//ctype_upper проверка на символ в верхнем регистре
            {
                $alphaCount++;
            }
        }
        $i++;
        
    }
    return $alphaCount;
}

function securityLowerAlphaCount(string $string): int //Возвращает количество символов в нижнем регистре, включая числа
{
    $i = 0;
    $alphaCount = 0;
    $lengthString = strlen($string);
    $arrStr = str_split($string);
    while ($arrStr[$i] != $arrStr[$lengthString])
    {
        if (ctype_alpha($arrStr[$i]))
        {
            if (ctype_lower($arrStr[$i]))//ctype_lower проверка на символ в нижнем регистре
            {
                $alphaCount++;
            }
        }
        $i++;
        
    }
    return $alphaCount;
}

function checkAllAlphaPassword(string $string): bool //Проверяет пароль на наличие только букв
{
    $i = 0;
    $lengthString = strlen($string);
    $arrStr = str_split($string);
    while ($arrStr[$i] != $arrStr[$lengthString])
    {
        if (!(ctype_alpha($arrStr[$i])))//ctype_alpha проверка на символ-букву
        {
            return false;
        }
        $i++;
    }
    return true;
}

function checkAllNumberPassword(string $string): bool //Проверяет пароль на наличие только чисел
{
    $i = 0;
    $lengthString = strlen($string);
    $arrStr = str_split($string);
    while ($arrStr[$i] != $arrStr[$lengthString])
    {
        if (!(is_numeric($arrStr[$i])))
        {
            return false;
        }
        $i++;
    }
    return true;
}

function doubleSymbolCount(string $string): int //Возвращает количество повторяющихся элементов пароля
{
    $i = 0;
    $symbolCount = 0;
    $symbolCountTemp = 0;
    $lengthString = strlen($string);
    $arrStr = str_split($string);
    $arrTempStr = [];
    while ($arrStr[$i] != $arrStr[$lengthString])
    {
        if (!(in_array($arrStr[$i], $arrTempStr)))//in_array проверка на наличие элемента в массиве
        {
            $symbolCountTemp = substr_count($string, $arrStr[$i]);//substr_count возвращает количество повторяющегося элемента
            array_push($arrTempStr, $arrStr[$i]);//array_push заносит в массив указанный элемент
            if ($symbolCountTemp > 1)
            {
                $symbolCount = $symbolCount + $symbolCountTemp;
            }
        }
    
        $i++;
    }
    return $symbolCount;
}

function getGetParameter(string $paremeterName): ?string
{
    return isset($_GET[$paremeterName]) ? $_GET[$paremeterName] : null;
}

function findAnotherSymbol(string $string): bool
{
    $lengthString = strlen($string);
    $arrStr = str_split($string);
    for ($i = 0; $i < $lengthString; $i++)
    {
        if ((!(is_numeric($arrStr[$i])) and (!(ctype_alpha($arrStr[$i])))))
        {
            return true;
        }
    }
    return false;
}

$password = getGetParameter("password");

if (($password == null) || ($password == ""))
{
    echo "Not found password";
}

else if (!(ctype_alnum($password)))
{
    echo "Password is not corrected";
}

else
{
    $security = 0;
    $length = strlen($password);//strlen длина строки
    $security = $length * 4;
    $security = $security + securityNumberCount($password) * 4;

    if (securityUpperAlphaCount($password) != 0)
    {
        $security = $security + ($length - securityUpperAlphaCount($password)) * 2;
    }
        
    if (securityLowerAlphaCount($password) != 0)
    {
        $security = $security + ($length - securityLowerAlphaCount($password)) * 2;
    }

    if (checkAllAlphaPassword($password))   
    {
        $security = $security - $length;
    }

    if (checkAllNumberPassword($password))
    {
        $security = $security - $length;
    }

    $security = $security - doubleSymbolCount($password);

    echo "$security";
}


?>