<?php
/*********************************************
 * plik formularz.php
 *********************************************/

$pole1 = trim($_POST['pole1']);
$pole2 = trim($_POST['pole2']);

if(empty($pole1) and empty($pole2)) {

// prosty formularz zawierający dwa pola
    echo '<form action="" method="post">
<input type="text" name="pole1" style="width: 200px;" value="Wpisz Imie i nazwisko" /><br />
<form action="#" method="post">
    <select name="pole2">
        <option value="Kowalski">Kowalski</option>
        <option value="Nowak">Nowak</option>
        <option value="Piotrowski">Piotrowski</option>
        <option value="Malek">Malek</option>
        <option value="Warmijak">Warmijak</option>
    </select>
    <input type="submit" value="Zapisz" />
</form>
<?php
if(isset($_POST[\'submit\'])){
    $selected_val = $_POST[\'pole2\'];  // Storing Selected Value In Variable
    echo "Zaglosowales na :" .$selected_val;  // Displaying Selected Value
}
?>
<br />
</form>';
}
else {

    // dane pochodzące z formularza
    $dane = $pole1 . "`" . $pole2 . "\n";
    // przypisanie zmniennej $file nazwy pliku
    $file = "baza.txt";
    // uchwyt pliku, otwarcie do dopisania
    $fp = fopen($file, "a");
    // blokada pliku do zapisu
    flock($fp, 2);
    // zapisanie danych do pliku
    fwrite($fp, $dane);
    // odblokowanie pliku
    flock($fp, 3);
    // zamknięcie pliku
    fclose($fp);

    echo "Dane zostały zapisane!<br />";
    echo "<a href=\"podglad.php\">Zobacz wpisane dane</a>";


function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
//ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
//ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
echo 'User Real IP - '.getUserIpAddr();
$ip = $_SERVER['REMOTE_ADDR'];
// przypisanie zmniennej $file nazwy pliku
$file = "ip.txt";
// uchwyt pliku, otwarcie do dopisania
$fp = fopen($file, "a");
// blokada pliku do zapisu
flock($fp, 2);
// zapisanie danych do pliku
fwrite($fp, $ip);
// odblokowanie pliku
flock($fp, 3);
// zamknięcie pliku
fclose($fp);

echo'$ip';

echo "Dane zostały zapisane!<br />";

    ?>


    Teraz zapisane dane wyświetlimy na stronie.

    PRZYKŁAD
    <?php
    /*********************************************
     * plik podglad.php
     *********************************************/

// wczytanie zawartości pliku do tablicy
    $file = file("baza.txt");
// przechodzimy przez tablicę za pomocą pętli foreach
    foreach ($file as $value) {
// rozbijamy poszczególne linie na części
        $exp = explode("`", $value);
// wyświetlamy rozbity tekst
        echo $exp[0] . "<br />" . $exp[1] . "<hr />";
    }
}

$dane=array("Kowalski", "Nowak", "Piotrowski","Malek","Warmijak");
$new_array=array_count_values($dane);

while (list ($pole2, $val) = each ($new_array)) {
    echo "$pole2 -> $val <br>";
}
?>