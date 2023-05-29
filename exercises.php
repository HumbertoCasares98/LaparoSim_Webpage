<?php
    include "includes/config.php";
	include "includes/funciones.php";
    
    session_start();

    if(!isset($_SESSION['idUser'])){
        header("Location: index.php");
    }
    //$idUser=$_SESSION['idUser'];
    $userName=$_SESSION['userName'];
    $fullName=$_SESSION['fullName'];
    $type_user=$_SESSION['type'];

    /*
    if($type_user==1){
        $where="";
    }else{
        $where="WHERE idUser=$idUser";
    }
    */

    $mysqli = conectar();
    $res=$mysqli->query("SELECT name, position, exercise, file FROM data");
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Exercises</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="assets/demo/allv6.1.0.js" crossorigin="anonymous"></script>
        <style>        
            .loading-overlay {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(0, 0, 0, 0.5);
              display: flex;
              align-items: center;
              justify-content: center;
              z-index: 999;
              visibility: hidden;
              opacity: 0;
              transition: opacity 0.3s;
            }
        
            .loading-overlay.show {
              visibility: visible;
              opacity: 1;
            }
        
            .loading-spinner {
              border: 16px solid #f3f3f3;
              border-top: 16px solid #3498db;
              border-radius: 50%;
              width: 120px;
              height: 120px;
              animation: spin 2s linear infinite;
            }
        
            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="main.php">Laparoscopic Trainer</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="main.php"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $userName;?>
                        <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="main.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="exercises.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Exercises
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $fullName; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Exercises</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="main.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Exercises</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Peg Transfer
                            </div>
                            <div class="container">
                                <form id="pegTransferForm" class="mt-5">
                                    <div class="form-group">
                                        <label for="pegTransferUsername">Username:</label>
                                        <input type="text" class="form-control" id="pegTransferUsername" name="username" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            <div class="loading-overlay" id="pegTransferLoadingOverlay">
                                <div class="loading-spinner"></div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Pattern Cutting
                            </div>
                            <div class="container">
                                <form id="patternCuttingForm" class="mt-5">
                                    <div class="form-group">
                                        <label for="patternCuttingUsername">Username:</label>
                                        <input type="text" class="form-control" id="patternCuttingUsername" name="username" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            <div class="loading-overlay" id="patternCuttingLoadingOverlay">
                                <div class="loading-spinner"></div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Intracorporeal Knot Suture
                            </div>
                            <div class="container">
                                <form id="KnotSutureForm" class="mt-5">
                                    <div class="form-group">
                                        <label for="KnotSutureUsername">Username:</label>
                                        <input type="text" class="form-control" id="KnotSutureUsername" name="username" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            <div class="loading-overlay" id="KnotSutureLoadingOverlay">
                                <div class="loading-spinner"></div>
                            </div>
                        </div>


                    </div>
                </main>
            </div>
        </div>
        
        <script>
            function handleSubmit(formId, loadingOverlayId, endpoint) {
                var form = document.getElementById(formId);
                var usernameInput = form.querySelector("input[name='username']");
                var username = usernameInput.value;

                var loadingOverlay = document.getElementById(loadingOverlayId);
                loadingOverlay.classList.add("show"); // Show the loading overlay

                var url = "http://127.0.0.1:8900/"+ endpoint +"?username=" + encodeURIComponent(username);
                console.log("Request URL:", url);
                
                fetch(url)
                    .then(function(response) {
                        console.log("Response of Fetch for " + formId + ":", response);
                        loadingOverlay.classList.remove("show"); // Hide the loading overlay
                    })
                    .catch(function(error) {
                        console.error("Error during Fetch for " + formId + ":", error);
                        loadingOverlay.classList.remove("show"); // Hide the loading overlay
                    });
            }

            document.getElementById("pegTransferForm").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent form submission
                handleSubmit("pegTransferForm", "pegTransferLoadingOverlay", "run_transferencia");
            });

            document.getElementById("patternCuttingForm").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent form submission
                handleSubmit("patternCuttingForm", "patternCuttingLoadingOverlay", "run_corte");
            });

            document.getElementById("KnotSutureForm").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent form submission
                handleSubmit("KnotSutureForm", "KnotSutureLoadingOverlay", "run_sutura");
            });
        </script>

        <script src="js/scripts.js"></script>
    </body>
</html>
