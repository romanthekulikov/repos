<?php
  header("Content-Type: text/plain"); 

function getGetParameter(string $paremeterName): ?string
{
    return isset($_GET[$paremeterName]) ? $_GET[$paremeterName] : null;
}

$a = getGetParameter("name");
if ($a == null)
{
  echo "Not found";
}
else
{
    $a = trim($a);
    while(strpos($a, "  ") !== false)
    {
        $a = str_replace("  ", " ", $a);
    }

    echo "$a";
}

?>