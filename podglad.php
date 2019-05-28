<?php
/*********************************************
 * plik podglad.php
 *********************************************/

// wczytanie zawartości pliku do tablicy
$file = file("baza.txt");
// przechodzimy przez tablicę za pomocą pętli foreach
foreach($file as $value) {
// rozbijamy poszczególne linie na części
    $exp = explode("`",$value);
// wyświetlamy rozbity tekst
    echo $exp[0]."<br />".$exp[1]."<hr />";
}

?>