<!doctype html>
<html lang="en">
<head>
  @include('admin.partials.head')
  <title>@yield('title')</title>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <!-- Header Section -->
      @include('admin.partials.header')
      <!-- End of Header Section -->
            <div class="app-main">
              <!-- Sidebar Section -->
              @include('admin.partials.sidebar')
              <!-- End of Sidebar Section -->
                <div class="app-main__outer">
                  <div class="app-main__inner">
                    <!-- Content Section -->
                    @yield('container')
                    <!-- End of Content Section -->
                  </div>
                    <!-- Footer Section -->
                    @include('admin.partials.footer')
                    <!-- End of Footer Section -->
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script> -->

@yield('customjs')

<script type="text/javascript">
  $(document).ready(function() {
    if ($('#toast-container').length) {
      setTimeout(function() {
        $('#toast-container').remove();
      }, 3000);
    }
    $('.showProdukDashboard').hide();
    $('.buttonShowProdukDashboard').click(function() {
      var ini = $(this).parent('.buttonProdukDashboard').parent('.produkDashboardRow').attr('id');
      $('#'+ini).children('.namaOrangDashboard').hide();
      $('#'+ini).children('.alamatDashboard').hide();
      $('#'+ini).children('.statusPesananDashboard').hide();
      $('#'+ini).children('.totalBiayaDashboard').hide();
      $('#'+ini).children('.buttonProdukDashboard').hide();
      $('#'+ini).children('.showProdukDashboard').show();
    });
    $('.hideProdukDashboard').click(function() {
      var ini = $(this).parent('.row').parent('.container').parent('.showProdukDashboard').parent('.produkDashboardRow').attr('id');
      $('#'+ini).children('.namaOrangDashboard').show();
      $('#'+ini).children('.alamatDashboard').show();
      $('#'+ini).children('.statusPesananDashboard').show();
      $('#'+ini).children('.totalBiayaDashboard').show();
      $('#'+ini).children('.buttonProdukDashboard').show();
      $('#'+ini).children('.showProdukDashboard').hide();
    });
    // Handler Bagian Select Status
    $('.showPilihanStatus').hide();
    $('.triggerUbahStatus').click(function() {
      // console.log('diklik');
      var ini = $(this).parent('.statusPesananDashboard').attr('id');
      $('#'+ini).children('.showPilihanStatus').show();
      $(this).hide();
    });
    $('.selectPilihanStatus').change(function () {
      var ini = $(this).attr('id');
      var ortu = $(this).parent('.showPilihanStatus').parent('.statusPesananDashboard').attr('id');
      var id = ini.replace(/\D/g, '');
      var ubahan = $('#'+ini).val();
      console.log(id);
      $.get("../controller/ubah_status.php?id=" + id + "&status=" + ubahan, function(data, status){
        var ya = JSON.parse(data);
        alert("" + ya.pesan + " menjadi " + ya.status);
        // + "\nStatus: " + id
        console.log('terubah ' + ya);
        $('#'+ortu).children('.triggerUbahStatus').text(ubahan);
      });
      // <?php if (isset($_SESSION['status'])): ?>
      // $.get("../controller/log_helper.php?id=" +
      //       <?=$_SESSION['id'];?> + "&module=transaksi&action=update Status");
      // <?php endif; ?>
      $('#'+ortu).children('.showPilihanStatus').hide();
      $('#'+ortu).children('.triggerUbahStatus').show();
    });

    // Handler Lunas Transaksi
    $('.buttonLunas').click(function() {
      var ini = $(this).attr('id')
      var id = $(this).attr('id').replace(/\D/g, '');
      // console.log(id);
      var yakin = confirm("Yakin ini sudah Lunas?");
      if (yakin) {
        // alert("iYa DhonK");
        $.get("../controller/ubah_status.php?id=" + id + "&status=lunas", function(data, status) {
          var response = JSON.parse(data);
          alert("" + response.pesan);
          if (response.pesan == "Oke, Pesanan Dianggap Lunas.") {
            $('#'+ini).parent('.buttonProdukDashboard').parent('.produkDashboardRow').remove();
          }
        });
        // <?php if (isset($_SESSION['status'])): ?>
        // $.get("../controller/log_helper.php?id=" +
        //       <?=$_SESSION['id'];?> + "&module=transaksi&action=update Lunas");
        // <?php endif; ?>
      } else {
        alert("Lah buat apa pencet Lunas? Jangan alasan kepencet.");
      }
    });
  });
</script>
</body>
</html>
