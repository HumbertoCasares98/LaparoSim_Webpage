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
                                <?php while($row=$res->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['position'] ?></td>
                                        <td><?php echo $row['exercise'] ?></td>
                                        <td><button type="button" class="btn btn-primary">See</button></td>
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
                            <i class="fas fa-chart-line me-1"></i>
                            Pinza derecha Dr. Fernando P.E - Primero
                            </div>
                            <div class="card-body">
                            <canvas id="myChart1"></canvas>
                            <script src="js/scripts.js"></script>
                            <script>
                                create_chartRight("data/Dr. Fernando P.E_2023-05-25_14-43-34.csv", "myChart1");
                            </script>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-chart-line me-1"></i>
                            Pinza izquierda Dr. Fernando P.E - Primero
                            </div>
                            <div class="card-body">
                            <canvas id="myChart2"></canvas>
                            <script src="js/scripts.js"></script>
                            <script>
                                create_chartLeft("data/Dr. Fernando P.E_2023-05-25_14-43-34.csv", "myChart2");
                            </script>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                    <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-chart-line me-1"></i>
                            Pinza derecha Dr. Fernando P.E - Segundo
                            </div>
                            <div class="card-body">
                            <canvas id="myChart4"></canvas>
                            <script src="js/scripts.js"></script>
                            <script>
                                create_chartRight("data/Dr. Fernando P.E 2_2023-05-25_14-50-27.csv", "myChart4");
                            </script>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6">
                    <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-chart-line me-1"></i>
                            Pinza izquierda Dr. Fernando P.E - Segundo
                            </div>
                            <div class="card-body">
                            <canvas id="myChart3"></canvas>
                            <script src="js/scripts.js"></script>
                            <script>
                                create_chartLeft("data/Dr. Fernando P.E 2_2023-05-25_14-50-27.csv", "myChart3");
                            </script>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                    <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-chart-line me-1"></i>
                            Grafica 3D Dr. Fernando P.E
                            </div>
                            <div class="card-body">
                            <canvas id="myChart3"></canvas>
                            <script src="js/scripts.js"></script>.
                            <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

                            <script>
                                //create_chart3D("data/Datos_Sutura/Dr. Fernando P.E_2023-05-22_14-42-50.csv", "myChart3");
                                fetch("data/Datos_Sutura/Dr. Fernando P.E_2023-05-22_14-42-50.csv")
                                    .then(response => response.text())
                                    .then(data => {
                                        const rows = data.trim().split('\n');
                                        const x = [];
                                        const y = [];
                                        const z = [];
                                        const x2 = [];
                                        const y2 = [];
                                        const z2 = [];

                                        rows.forEach(row => {
                                        const columns = row.split(',');
                                        x.push(parseFloat(columns[0]));
                                        y.push(parseFloat(columns[1]));
                                        z.push(parseFloat(columns[2]));
                                        x2.push(parseFloat(columns[3]));
                                        y2.push(parseFloat(columns[4]));
                                        z2.push(parseFloat(columns[5]));
                                        });

                                        const trace1 = {
                                        x: x,
                                        y: y,
                                        z: z,
                                        mode: 'markers',
                                        marker: {
                                            size: 5,
                                            color: 'blue'
                                        },
                                        name: 'Pinza Azul',
                                        type: 'scatter3d'
                                        };

                                        const trace2 = {
                                        x: x2,
                                        y: y2,
                                        z: z2,
                                        mode: 'markers',
                                        marker: {
                                            size: 5,
                                            color: 'red'
                                        },
                                        name: 'Pinza Roja',
                                        type: 'scatter3d'
                                        };

                                        const datos = [trace1, trace2];

                                        const layout = {
                                        scene: {
                                            xaxis: { title: 'X' },
                                            yaxis: { title: 'Y' },
                                            zaxis: { title: 'Z' }
                                        }
                                        };

                                        Plotly.newPlot("myChart3", datos, layout);
                                    })
                                    .catch(error => {
                                        console.log('Error:', error);
                                    });
                            </script>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </main>
               
        <script src="assets\demo\bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="assets\demo\Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets\demo\simple-datatablesLatest.js" crossorigin="anonymous"></script>
        <script src="assets\demo\datatables-simple-demo.js"></script>
    </body>

    
</html>
