<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CCMath Assignment</title>
</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container" style="margin-top: 5%">
    <div class="row">
        <div class="col-sm-8">
            <div class="alert alert-danger" role="alert" id="error_message" hidden>
                Something went wrong
            </div>
            <div class="alert alert-success" role="alert" id="success_message" hidden>
                Action completed successfully
            </div>
            <div class="col-sm-8">
                <canvas id="barChart" height="100"></canvas>
            </div>
            <div class="col-sm-6" style="margin-top: 5%">
                <canvas id="piChart"></canvas>
            </div>
        </div>
        <div class="col-sm-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add New Car
            </button>
            <div class="alert alert-info" role="alert" id="no-records-found"  style="margin-top: 2%" hidden>
                No records found!
            </div>
            <table id="cars-table" class="table mt-2" hidden>
                <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include("partials/modal.php"); ?>

<script src="js/drawCarsBar.js"></script>
<script src="js/drawPiChart.js"></script>
<script src="js/renderCarsTable.js"></script>
<script src="js/storeNewCar.js"></script>

<script>renderCarsTable();</script>
</body>
</html>