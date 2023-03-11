<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta http-equiv="refresh" content="60"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Early Warning System </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fonts/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/Navbar-Right-Links-icons.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body style="font-family: Poppins, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span class="d-flex justify-content-center align-items-center me-2">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo">
                </span>
                <span style="font-size: 17px;font-family: Poppins, sans-serif;">
                    <strong>Early Warning System</strong>
                </span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto"></ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-a">
                        <div id="chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card" style="margin-top: 5px;">
                            <div class="card-header">
                                <strong>Hide column</strong>
                            </div>
                            <div class="card-body" style="background: #eadcdc;">
                                <div class="form-check" style="margin-top: 5px;"><input class="form-check-input"
                                        type="checkbox" id="hide-col-1"><label class="form-check-label"
                                        for="hide-col-1">Temperature</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox"
                                        id="hide-col-2"><label class="form-check-label"
                                        for="hide-col-2">Humidity</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox"
                                        id="hide-col-3"><label class="form-check-label" for="hide-col-3">Fire
                                        anomaly</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="margin-top: 5px;">
                            <div class="card-header">
                                <strong>Print report</strong>
                            </div>
                            <div class="card-body" style="background: #eadcdc;">
                            <form>
                                <label for="date">Date:</label>
                                <input type="date" id="date" name="date"><br>

                                <label for="temperature">Type:</label>
                                <select id="temperature" name="temperature">
                                    <option value="cold">Temperature</option>
                                    <option value="mild">Humidity</option>
                                </select><br>
                            </form>
                            <br>
                            <input type="button" value="Print" onclick="window.open('<?php echo site_url('/printpdf')?>','blank')"/>
                                <!-- <button class="unique-btn" onclick="window.print()">Print</button> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped" id="mydatatable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Temperature</th>
                                <th>Humidity</th>
                                <th>Fire anomaly</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ews as $value): ?>
                            <tr>
                                <td><?php echo $value['date'] ?></td>
                                <td><?php echo $value['time'] ?></td>
                                <td><?php echo $value['temp'] ?> °C</td>
                                <td><?php echo $value['hum'] ?> %</td>
                                <td><?php echo $value['fa'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 10px;margin-bottom: 2px;">
        <footer class="text-center">
            <div class="container text-muted py-4 py-lg-5">
                <ul class="list-inline">
                    <li class="list-inline-item me-4"><a class="link-secondary"
                            href="https://www.petrochina.co.id/">Official Website</a></li>
                    <li class="list-inline-item me-4"><a class="link-secondary"
                            href="https://www.instagram.com/petrochina_id">Instagram</a></li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                            </path>
                        </svg></li>
                    <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                            </path>
                        </svg></li>
                    <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                            </path>
                        </svg></li>
                </ul>
                <p class="mb-0">PetroChina International Jabung Ltd.</p>
            </div>
        </footer>
    </div>

    <script>
        $(document).ready(function(){
            // Show the modal when the button is clicked
            $('[data-toggle="modal"]').click(function(){
                $($(this).data("target")).show();
            });

            // Hide the modal when the close button is clicked
            $(".modal-footer button").click(function(){
                $(this).closest(".modal").hide();
            });
        });
    </script>

    <!-- JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        const checkbox1 = document.getElementById('hide-col-1');
        const checkbox2 = document.getElementById('hide-col-2');
        const checkbox3 = document.getElementById('hide-col-3');
        const table = document.getElementById('mydatatable');

        checkbox1.addEventListener('change', function() {
            if (this.checked) {
                hideColumn(3);
            } else {
                showColumn(3);
            }
        });

        checkbox2.addEventListener('change', function() {
            if (this.checked) {
                hideColumn(4);
            } else {
                showColumn(4);
            }
        });

        checkbox3.addEventListener('change', function() {
            if (this.checked) {
                hideColumn(5);
            } else {
                showColumn(5);
            }
        });

        function hideColumn(columnIndex) {
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[columnIndex - 1].style.display = 'none';
            }
        }

        function showColumn(columnIndex) {
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[columnIndex - 1].style.display = '';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#mydatatable').DataTable({
                paging: true
            });
        });
    </script>
    <!-- <script>
        setInterval(function(){
            location.reload();
        }, 5000); // refresh every 60 seconds
    </script> -->
    <script>
    var ews = <?php echo json_encode($ews); ?>;
    var times = [];
    var temps = [];
    var hums = [];

    var count = 0; // variabel hitungan

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Temperature',
                data: [],
                backgroundColor: 'red',
                borderColor: 'red',
                borderWidth: 1
            },
            {
                label: 'Humidity',
                data: [],
                backgroundColor: 'blue',
                borderColor: 'blue',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    type: 'time',
                    time: {
                        displayFormats: {
                            hour: 'HH:mm'
                        }
                    }
                }]
            }
        }
    });

    for (var i = 0; i < ews.length; i++) {
        if (count == 20) { // reset setiap 50 data
            chart.data.labels = [];
            chart.data.datasets[0].data = [];
            chart.data.datasets[1].data = [];
            count = 0;
        }

        chart.data.labels.push(ews[i].time);
        chart.data.datasets[0].data.push(ews[i].temp);
        chart.data.datasets[1].data.push(ews[i].hum);

        count++;
    }

    chart.update();
</script>

</body>

</html>