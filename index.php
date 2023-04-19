<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

Milestone 3 (BONUS)
Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente. -->

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

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
</head>

<body>
    <form action="index.php" method="GET">
        <label for="numberCharacters">Quanti caratteri deve avere la tua Password?</label><br>
        <input type="number" name="numberCharacters" id="numberCharacters">
        <button type="submit">Genera</button>
    </form>

    <p>La tua password è: <?php echo getRandomPassword($numberOfCharacters) ?></p>
</body>

</html>