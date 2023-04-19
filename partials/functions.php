<?php
//Creo la variabile presa dal form
$numberOfCharacters = $_GET['numberCharacters'] ?? 0;

//Funzione che, in base al valore dato nel form, preleva una serie di caratteri dall'array "$characters" tramite un ciclo for li pusha all'interno dell'array vuoto "$password".
function getRandomPassword($numberOfCharacters)
{
    $characters = ['A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r', 'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '?', '!', '-', '_'];

    $password = [];

    for ($i = 0; $i < $numberOfCharacters; $i++) {
        //Variabile che rappresenta l'elemento random prelevato dall'array "$characters" grazie alla funzione "array_rand"
        $randomElement = $characters[array_rand($characters)];
        array_push($password, $randomElement);
    }

    //Tramite la funzione "implode()", trasformo l'array "$password" in una stringa composta dal suo contenuto
    $stringPassword = implode($password);

    return $stringPassword;
}
?>