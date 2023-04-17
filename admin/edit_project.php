<?php
include '../includes/config.php';
include '../includes/database.php';
// Inclure la variable $db = new Database();
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projects - Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Projets</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Projets :</h6>
                <a class="collapse-item" href="project.php">Voir tout</a>
                <a class="collapse-item" href="add_project.php">Ajouter</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- message -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="message.php">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Messages</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-1 d-none d-lg-inline text-gray-600 small">Admnistrateur</span>

                                <img class="img-profile rounded-circle"
                                    src="https://th.bing.com/th/id/OIP.Cwz17_4OoLBps-SI3JsPdAHaE8?pid=ImgDet&rs=1">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="h3 mb-2 text-gray-800">Modifier le projet</h1>
                    <?php

                    // Vérification si l'id a été fourni dans l'URL
                    if (!isset($_GET['id'])) {
                        echo "Il y a une erreur quelque part";
                        exit();
                    }

                    $id = $_GET['id'];

                    // Récupération des données existantes du projet pour l'id spécifié
                    $sql = "SELECT * FROM project WHERE id = $id";
                    $result = mysqli_query($conn, $sql);

                    // Vérification si des données ont été trouvées
                    if (mysqli_num_rows($result) > 0) {

                        // Récupération des données existantes du projet
                        $row = mysqli_fetch_assoc($result);

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $title = mysqli_real_escape_string($db->link, $_POST["title"]);
                            $number = mysqli_real_escape_string($db->link, $_POST["number"]);
                            $description = mysqli_real_escape_string($db->link, $_POST["description"]);
                            
                            // Vérification si des images existent déjà dans la base de données
                            $img1_in_db = $row['img1'];
                            $img2_in_db = $row['img2'];

                            // Vérification si des images ont été téléchargées
                            if (!empty($_FILES['img1']['name'])) {
                                $img1_name = $_FILES['img1']['name'];
                                $img1_size = $_FILES['img1']['size'];
                                $img1_tmp = $_FILES['img1']['tmp_name'];

                                $div1 = explode('.', $img1_name);
                                $img1_ext = strtolower(end($div1));
                                $unique_image1 = substr(md5(time()), 0, 10) . '.' . $img1_ext;
                                $uploaded_image1 = "../uploads/" . $unique_image1;

                                move_uploaded_file($img1_tmp, $uploaded_image1);
                            } else {
                                $uploaded_image1 = $img1_in_db;
                            }

                            if (!empty($_FILES['img2']['name'])) {
                                $img2_name = $_FILES['img2']['name'];
                                $img2_size = $_FILES['img2']['size'];
                                $img2_tmp = $_FILES['img2']['tmp_name'];

                                $div2 = explode('.', $img2_name);
                                $img2_ext = strtolower(end($div2));
                                $unique_image2 = substr(md5(time()), 0, 10) . '.' . $img2_ext;
                                $uploaded_image2 = "../uploads/" . $unique_image2;

                                move_uploaded_file($img2_tmp, $uploaded_image2);
                            } else {
                                $uploaded_image2 = $img2_in_db;
                            }

                            // Vérification si tous les champs ont été remplis
                            if (empty($title)) {
                                echo "<script>alert('Veuillez remplir tous les champs !');</script>";
                            } else {
                                // Préparation de la requête SQL pour la mise à jour du projet
                                $sql = "UPDATE project SET number='$number', title='$title', description='$description', img1='$uploaded_image1', img2='$uploaded_image2' WHERE id=$id";

                                // Exécution de la requête SQL de mise à jour
                                if (mysqli_query($conn, $sql)) {
                                    echo "<script>alert('Le projet a été mis à jour avec succès !'); window.location.replace('project.php');</script>";
                                }
                            }
                        } 

                        // Fermeture de la connexion à la base de données
                        mysqli_close($conn);
                    }

                    ?>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="title">Titre du projet:</label><br>
                                <input type="text" required="required" id="title" name="title" value="<?=$row['title']?>"><br><br>
                                <label for="number">Projet n°:</label><br>
                                <input type="number" required="required" id="number" name="number" value="<?=$row['number']?>"><br><br>
                                <label for="description">Description:</label><br>
                                <textarea id="description" required="required" name="description"><?=$row['description']?></textarea><br><br>
                                <?php if ($row['img1'] != '') { ?>
                                <label>Image 1 :</label><br>
                                <img src="<?=$row['img1']?>" width="200" alt="img2 dans la db"><br><br>
                                <?php } ?>
                                <label for="img1">Changer l'image 1:</label><br>
                                <input type="file" id="img1" name="img1"><br><br>
                                <?php if ($row['img2'] != '') { ?>
                                    <label>Image 2 :</label><br>
                                    <img src="<?=$row['img2']?>" width="200" alt="img2 dans la db"><br><br>
                                <?php } ?>
                                <label for="img2">Changer l'image 2:</label><br>
                                <input type="file" id="img2" name="img2"><br><br>
                                <input type="submit" value="Modifier">
                                <a href="project.php">Annuler</a>
                            </form>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ROMDHANE Dayen 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>