<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Materias Aprobadas y Reprobadas</title>
    <!-- Importar chart.JS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <!-- Estilos CSS -->    
    <link rel="stylesheet" type="text/css" href="css/graficoalumno.css">
</head>
<body>
    <h1 class="chart-title">Gráfico de materias aprobadas y reprobadas </h1>
    <div class="chart-container">
        <canvas id="pieChart" width="400" height="400"></canvas>
    </div>

    <script>
        // Función para obtener el total de alumnos y carreras desde "data.php"
        function obtenerTotalAlumnosDesdeBD() {
            return <?php include 'datalumno.php'; echo $totalAlumnos; ?>;
        }

        function obtenerTotalCarrerasDesdeBD() {
            return <?php include 'datalumno.php'; echo $totalCarreras; ?>;
        }

        // Configuración del gráfico
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Aprobados', 'Reprobados'],
                datasets: [{
                    data: [obtenerTotalAlumnosDesdeBD(), obtenerTotalCarrerasDesdeBD()],
                    backgroundColor: ['rgba(56, 193, 124, 0.8)', 'rgba(226, 28, 28, 0.8)'], 
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
</body>
</html>