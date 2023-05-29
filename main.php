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
        <title>Dashboard</title>
        <link href="css\simple-datatable.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="assets\demo\allv6.1.0.js" crossorigin="anonymous"></script>
        <script src="assets\demo\npm_chart.js"></script>
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
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="card mb-4">
                        <?php if($type_user==1){?>
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Datos
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Exercise</th>
                                            <th>Results</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Exercise</th>
                                            <th>Results</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $counter = 0; // Initialize the counter variable
                                        while ($row = $res->fetch_assoc()) {
                                            $counter++; // Increment the counter for each iteration
                                            $file = $row['file'];
                                            $exercise = $row['exercise'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['position'] ?></td>
                                                <td><?php echo $row['exercise'] ?></td>
                                                <td>
                                                    <div class="card-body">
                                                    <canvas id="myChart<?php echo $counter ?>"></canvas>
                                                        <script src="js/scripts.js"></script>
                                                        <script>
                                                            create_chartRight("data/<?php echo $exercise ?>/<?php echo $file ?>", "myChart<?php echo $counter ?>");
                                                        </script>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="assets/demo/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="assets/demo/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/simple-datatablesLatest.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-simple-demo.js"></script>
    </body>
</html>
