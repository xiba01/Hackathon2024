<script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                responsive: true,
                theme: "light3",
                title: {
                    text: "Laureat Valider dans les 15 derniers jours"
                },
                axisY: {
                    title: "Nombre de Laureat Valider",
                    interval: 1
                },
                axisX: {
                    title: "Jours"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($data1, JSON_NUMERIC_CHECK); ?>
                }]
            });
            
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                theme: "light1",
                title: {
                    text: "Demande d'Inscription dans les 15 derniers jours"
                },
                axisY: {
                    title: "Nombre des Demande d'Inscription",
                    interval: 1
                },
                axisX: {
                    title: "Jours"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($data2, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            chart2.render();
        }
    </script>