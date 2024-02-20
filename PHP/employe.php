<?php
session_start();

// Vérification si l'employé est déjà connecté
if(isset($_SESSION['employed_logged_in']) && $_SESSION['employed_logged_in'] === true) {
    // L'administrateur est déjà connecté, redirigez-le vers la page d'administration
    header("Location: employed-dashboard.php");
    exit;
}

// Vérification si le formulaire de connexion a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "M.X"; // Nom d'utilisateur de l'administrateur
    $password = "motdepasse"; // Mot de passe de l'administrateur
    
    // Vérification des informations d'identification
    if($_POST['username'] === $username && $_POST['password'] === $password) {
        // Informations d'identification correctes, démarrez la session
        $_SESSION['employed_logged_in'] = true;
        
        // Redirection vers la page d'administration
        header("Location: employed-dashboard.php");
        exit;
    } else {
        // Informations d'identification incorrectes, affichez un message d'erreur
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Employé</title>
</head>
<body>

    <h2>Connexion Employé</h2>
    
    <?php if(isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se Connecter</button>
    </form>

</body>
</html>
