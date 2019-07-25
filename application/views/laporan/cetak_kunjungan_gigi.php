<!-- Bootstrap core CSS-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!--   <div class="wrapper">
    <div class="content"> -->
      <div class="card">
        <div class="card-header" align="center">
          <h2>Klinik Sehat Kota Salatiga</h2>
          <h5 style="padding-top: 0;">Jl. Argoboga No.58, Ledok, Argomulyo, Kota Salatiga, Jawa Tengah 50732</h5>
          <hr>
        </div>
        <div class="card-header" align="center">
          <h4 class="card-title">Kunjungan Pasien Pelayanan Dokter Gigi</h4>
        </div>
        <br>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-8" >
            <div id="kunjungan_gigi" style="width: 800px"></div>
          </div>
        </div>
      </div>
      <div id="testt">
       <?php 
       //bisa make ini juga kalo tanpa js
      // echo file_get_contents(base_url('manajemen/getPenyakitTahun/'.date("Y"))); 
       
       ?>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
    <script type="text/javascript">
    $(document).ready(function(){
    setTimeout(function(){ 
     window.print();
      window.history.back();
     return false;
    
    }, 1400);
    });
    </script>
    
    <script type="text/javascript">   
   var d = new Date();
   var n = d.getFullYear();
   if (sessionStorage.getItem("year") !== null) {
        var n = sessionStorage.getItem("year")
   }
           var url = "<?=base_url('manajemen/getKunjunganPasienGigiTahun/')?>"+n;
           sessionStorage.clear();
      $("#testt").load(url);
    function getTahun(data){
      var url = "<?=base_url('manajemen/getKunjunganPasienGigiTahun/')?>"+data.value;

      console.log( url);
      $("#testt").load(url);
    };
    </script>
