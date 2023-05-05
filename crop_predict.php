<?php
ini_set('memory_limit', '-1');
// $userlogin=$_SESSION['customer_login_user'];
$servername="localhost";
$username="root";
$password="";
$dbname="agriculture_portal";
$conn =mysqli_connect($servername, $username, $password, $dbname);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<style>
    body{
        margin: 30px;
    }
    #charts{
        width: 900px;
    height: 1500px;
    text-align: center;
    margin-left : 100px;
    }
    #myChart {
    width: 100px;
    height: 50px;
}

a{
    background : black;
    padding: 10px;
    text-decoration:none;
    color: white;
}
</style>
<body>
<a href="farmer_index.php">Home</a>
<a href="php/logout.php">Logout</a>
<h3 style="text-align:center;text-transform:uppercase;">Analysis based on the orders</h3>
<br><br>

<!-- <button>Quantity</button>
<button>Revenue</button> -->
<div>
<div id="charts">
<canvas id="myChart" ></canvas>
</div>
<!-- <div id="charts">
<canvas id="myChart1" ></canvas>
</div> -->
</div>
<?php
$query = "SELECT cropname,SUM(quantity) as quantity , SUM(price) as Revenue FROM crop_data GROUP BY cropname";
$result = $conn->query($query);

$crop_names = array();
$quantities = array();
$revenue = array();

while ($row = $result->fetch_assoc()) {
    $crop_names[] = $row['cropname'];
    $quantities[] = $row['quantity'];
    $revenue[] = $row['Revenue'];
}
?>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($crop_names); ?>,
        datasets: [{
            label: 'Crop Quantities',
            data: <?php echo json_encode($quantities); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var myChart1 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($crop_names); ?>,
        datasets: [{
            label: 'Crop Quantities',
            data: <?php echo json_encode($revenue); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<!-- <script>
    $column1_data_json = json_encode($column1_data);
$column2_data_json = json_encode($column2_data);
var xArray = $column1_data_json;
var yArray = $column2_data_json;

//     var xArray = ["Italy","France","Spain","USA","Argentina"];
// var yArray = [55, 49, 44, 24, 15];

var data = [{
  x: xArray,
  y: yArray,
  type: "bar"  }];
var layout = {title:"World Wide Wine Production"};

Plotly.newPlot("myPlot", data, layout);
</script> -->
</html>