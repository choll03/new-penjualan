<?php 
    include('template/header.php');

    $query = 'SELECT
                helm.nama,
                helm.merk,
                IFNULL(SUM(faktur_detail.jumlah), 0) as total
            FROM
                helm

            LEFT JOIN faktur_detail ON helm.id = faktur_detail.helm_id
            GROUP BY helm.merk
            ORDER BY helm.merk';
    $result = $db->query($query);
    $label = array();
    $dataset = array();

    while($row = $result->fetch_array()){
        $label[] = $row['merk'];
        $dataset[] = $row['total'];
    }

?>

<!-- <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Helm Sang Juara</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div> -->


<div class="container mt50">
<div class="text-center">
    <h2>Grafik Penjualan Helm</h2>
</div>
<canvas class="my-4" id="myChart" width="600" height="200"></canvas>
<h2>Informasi Terkini</h2>
<div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
</div>

<script src="plugins/cart.js"></script>
<script>
    var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo json_encode($label) ?>,
          datasets: [{
            data: <?php echo json_encode($dataset) ?>,
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
</script>
<?php include('template/footer.php') ?>