</div>
<!-- /.content-wrapper -->

<!-- <footer class="main-footer" style="margin-top: 62px;">
  <div class="float-right d-none d-sm-block">
  </div>
  <strong>Copyright &copy; 2024 <a href="https://github.com/Raqanzaa/PustakaSyabab">Pustaka Syabab</a>.</strong> All rights reserved.
</footer> -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/adminlte.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Include Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- Custom scripts -->
<script defer>
document.addEventListener('DOMContentLoaded', function() {

  var navLinks = document.querySelectorAll('.nav-link');

  navLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {

      navLinks.forEach(function(link) {
        link.classList.remove('active');
      });

      this.classList.add('active');
    });
  });

  var currentPath = window.location.pathname;
  var foundActive = false;
  navLinks.forEach(function(link) {
    var linkPath = new URL(link.href).pathname;
    if (linkPath === currentPath) {
      navLinks.forEach(function(link) {
        link.classList.remove('active');
      });
      link.classList.add('active');
      foundActive = true;
    }
  });

  if (!foundActive) {
    navLinks.forEach(function(link) {
      link.classList.remove('active');
    });
    document.querySelector('.nav-link[href="<?= site_url('dashboard') ?>"]').classList.add('active');
  }

  var artikelPaths = ['artikel-sampah', 'artikel-sampah/index', 'artikel-sampah/tambah', 'artikel-sampah/edit'];
  artikelPaths.forEach(function(path) {
    if (currentPath.includes(path)) {
      navLinks.forEach(function(link) {
        link.classList.remove('active');
      });
      document.querySelector('.nav-link[href*="artikel-sampah"]').classList.add('active');
      foundActive = true;
    }
  });
});
</script>
<script>
$(document).ready(function() {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d');

    var areaChartData = {
        labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
          {
                label               : 'Sampah',
                backgroundColor     : 'rgba(90, 178, 255, 0.9)', // #5AB2FF
                borderColor         : 'rgba(90, 178, 255, 0.8)',
                pointRadius         : false,
                pointColor          : '#5AB2FF',
                pointStrokeColor    : 'rgba(90, 178, 255, 1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(90, 178, 255, 1)',
                data                : <?php echo json_encode($total_sampah_bulanan); ?>
            },
            {
                label               : 'Daur Ulang',
                backgroundColor     : 'rgba(160, 222, 255, 1)', // #A0DEFF
                borderColor         : 'rgba(160, 222, 255, 0.8)',
                pointRadius         : false,
                pointColor          : '#A0DEFF',
                pointStrokeColor    : 'rgba(160, 222, 255, 1)',
                data                : <?php echo json_encode($total_daur_ulang_bulanan); ?>
            },
            {
                label               : 'Residu',
                backgroundColor     : 'rgba(80, 140, 155, 0.9)', // #508C9B
                borderColor         : 'rgba(80, 140, 155, 0.8)',
                pointRadius         : false,
                pointColor          : '#508C9B',
                pointStrokeColor    : 'rgba(80, 140, 155, 1)',
                data                : <?php echo json_encode($total_residu_bulanan); ?>
            }
        ]
    };

    var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
            display: true,
            labels: {
                fontColor: '#ffffff' 
            }
        },
        scales: {
            xAxes: [{
                gridLines : {
                    display : false,
                },
                ticks: {
                    fontColor: '#ffffff'
                }
            }],
            yAxes: [{
                gridLines : {
                    display : false,
                },
                ticks: {
                    fontColor: '#ffffff' 
                }
            }]
        }
    };

    new Chart(areaChartCanvas, {
        type: 'bar',
        data: areaChartData,
        options: areaChartOptions
    });
});
</script>
