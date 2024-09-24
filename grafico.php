<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Alumnos y Carreras</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Estilos CSS -->    
    <link rel="stylesheet" type="text/css" href="css/graficoescolar.css">
</head>
    <body>
    <h1 class="chart-title">Gráfico de alumnos y carreras</h1>
    <button id="btnRegresar" onclick="Regresar()">REGRESAR</button>
    <div class="chart-container">
        <canvas id="pieChart" width="400" height="400"></canvas>
    </div>
   
    <script>
        // Función para obtener el total de alumnos y carreras desde "data.php"
        function obtenerTotalAlumnosDesdeBD() {
            return <?php include 'Conexion/datosEscolares.php'; echo $totalAlumnos; ?>;
        }

        function obtenerTotalCarrerasDesdeBD() {
            return <?php include 'Conexion/datosEscolares.php'; echo $totalCarreras; ?>;
        }

        // Configuración del gráfico
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Alumnos', 'Carreras'],
                datasets: [{
                    data: [obtenerTotalAlumnosDesdeBD(), obtenerTotalCarrerasDesdeBD()],
                    backgroundColor: ['rgba(176, 1, 4, 0.8)', 'rgba(54, 162, 235, 0.8)'], 
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontSize: 16,
                        fontColor: '#333'
                    }
                },
                title: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                            return percentage + "%";
                        }
                    }
                }
            }
        });
    </script>


            <script>
                 function Regresar(){
                window.location.href = 'MenuCoordinador.php';
                 }
            </script>
    </body>
</html>
