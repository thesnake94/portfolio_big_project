<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

include '../includes/config.php';
include '../includes/database.php';
$db = new Database();



// Vérification des identifiants
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($db->link, $_POST['username']);
    $password = mysqli_real_escape_string($db->link, $_POST['password']);

    // Préparer la requête SQL
    $stmt = $conn->prepare("SELECT * FROM user WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Récupérer le résultat de la requête
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 1) {
        // Récupérer le mot de passe hashé de l'utilisateur
        $user = mysqli_fetch_assoc($result);
        $hash = $user['password'];

        // Vérifier que le mot de passe entré par l'utilisateur correspond au mot de passe hashé stocké dans la base de données
        if (password_verify($password, $hash)) {
            // Identifiants corrects, stocker l'ID utilisateur dans une variable de session et redirection vers la page d'accueil
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            // Identifiants incorrects, affichage d'un message d'erreur
            $error_message = "Identifiants incorrects";
        }
    } else {
        // Identifiants incorrects, affichage d'un message d'erreur
        $error_message = "Identifiants incorrects";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username"
                                                id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <?php if (isset($error_message)) { ?>
                                        <div class="alert alert-danger mt-3" role="alert"><?php echo $error_message; ?></div>
                                        <?php } ?>
                                        <a href="../index.php" class="btn btn-user btn-block">Retour au portfolio</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>