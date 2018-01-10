<html>
<head>
     <title>A.L. - rej.php</title>
</head>
<body>
<?php
$dbhost="localhost"; $dbuser="aemmpl_ola"; $dbpassword="baza"; $dbname="aemmpl_bazola"; 
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);                       //łączenie z bazą danych
mysqli_select_db ($polaczenie, $dbname);
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];  											//wybór bazy
$log = $_POST['login'];
$haslo = $_POST['haslo'];
$rez4 = mysqli_query ($polaczenie, "SELECT login FROM users2 WHERE login=$log");
//$islog= ; 
	
if (empty($_POST['login'])||empty($_POST['haslo'])||empty($_POST['imie'])||empty($_POST['nazwisko'])) {		//puste pola
	echo "Uzupełnij wszystkie pola!";
	print "<a href='rejestracja.php'>Spróbuj jeszcze raz</a>";
}
else if ($rez4==true)																//podany login jest już w użytku
{
echo "Podany login już istnieje. Podaj inny.";
	print "<a href='rejestracja.php'>Spróbuj jeszcze raz</a>";
}
else																				//dodanie nowego użytkownika
{
	$zap2="INSERT INTO `users2`(`imie`,`nazwisko`,`login`, `haslo`,`lp`) VALUES ('$imie','$nazwisko','$log','$haslo','0')";
	$rezult= mysqli_query ($polaczenie,$zap2);
	print "Dodano poprawnie nowego użytkownika.<br>";
	print "<a href='logowanie.php'>Zaloguj się</a>";
}
?>
</body>
</html>