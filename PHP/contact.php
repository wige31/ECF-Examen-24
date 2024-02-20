<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $message = $_POST["message"];
    
    // Validation des données (vous pouvez ajouter des validations supplémentaires selon vos besoins)
    if (empty($nom) || empty($email) || empty($tel) ||empty($message)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        // Envoi d'un e-mail de notification (vous devez configurer votre serveur pour envoyer des e-mails)
        $to = "votre@email.com"; // Remplacez ceci par votre adresse e-mail
        $subject = "Nouveau message de contact";
        $body = "Nom: $nom\nEmail: $email\ntel: $tel\nMessage:\n$message";
        
        if (mail($to, $subject, $body)) {
            echo "Votre message a été envoyé avec succès. Nous vous contacterons bientôt.";
        } else {
            echo "Désolé, une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer.";
        }
    }
} else {
    // Redirection vers la page de contact si le formulaire n'a pas été soumis directement à contact.php
    header("Location: index.html");
}
?>
