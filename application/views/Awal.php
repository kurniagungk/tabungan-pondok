<!DOCTYPE html>
<html>

<head>
  <title>WELCOM TO TABUNGAN ALKAHFI SOMALANGU</title>

  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/jquery/jquery-3.3.1.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/datatables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/popper/popper.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>


  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/jqueryui/jquery-ui.css">
  <link rel="stylesheet" type="<?php echo base_url() ?>asset/jqueryui/jquery-ui.theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/datatable/datatables.min.css">
  <link rel="stylesheet" type="<?php echo base_url() ?>asset/print/print.min.css">


  <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css">
  <style>
    body,
    html {
      height: 100%;
      background-repeat: no-repeat;
      background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    body {
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }

    .box {
      width: 1200px;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-top: 10px;
    }

    h3 {
      margin-top: 2px;
      text-align: center;
      font-size: 15px;

    }

    h1 {
      margin-top: 2px;
      text-align: center;
      font-size: 25px;

    }

    .box1 {
      width: 1200px;

      border: 0px solid #ccc;
      border-radius: 5px;

    }

    .head {
      border: 1px solid #ccc;
      ;
      background-color: #fff;
      padding: 10px;
      border-radius: 10px;
      margin-top: 10px;
    }

    .textboxx {
      text-align: center;
      font-size: 10px;
    }

    .textbok {
      text-align: center;
      font-size: 35px;
    }

    .boxxx {
      border: 1px solid #ccc;
      ;
      background-color: #99e6ff;
      padding: 5px;
      border-radius: 10px;
      margin-left: 30px;
      margin-right: 30px;
    }

    .ttk {
      border-bottom: 1px solid #ddd;
      text-align: right;
    }

    .uang {
      text-align: center;
      font-size: 15px;
    }

    .ttable {
      margin-top: 2px;
    }
  </style>
</head>

<body>
  <div class="container box1">
    <div class="row">
      <div class="col-sm head">
        <span>
          <a href="http://localhost/tabungan_pondok">
            <img src="http://localhost/tabungan_pondok/upload/icon/home.png" width="64px" class="rounded mx-auto d-block" alt="...">
            <h3>HOME</h3>
          </a>

        </span>
      </div>
      <div class="col-sm head">
        <span>
          <a href="http://localhost/tabungan_pondok/datansb">
            <img src="http://localhost/tabungan_pondok/upload/icon/data.png" width="64px" class="rounded mx-auto d-block" alt="...">
            <h3>DATA NASABAH</h3>
          </a>

        </span>
      </div>
      <div class="col-sm head">
        <span>
          <a href="http://localhost/tabungan_pondok/transaksi">
            <img src="http://localhost/tabungan_pondok/upload/icon/transaksi.png" width="64px" class="rounded mx-auto d-block" alt="...">
            <h3>TRANSAKSI</h3>
          </a>

        </span>


      </div>
      <div class="col-sm head">
        <div class="col-sm">
          <span>
            <a href="http://localhost/tabungan_pondok/laporan">
              <img src="http://localhost/tabungan_pondok/upload/icon/laporan.png" width="64px" class="rounded mx-auto d-block" alt="...">
              <h3>LAPORAN</h3>
            </a>

          </span>
        </div>
      </div>
      <div class="col-sm head">
        <div class="col-sm">
          <span>
            <a href="http://localhost/tabungan_pondok/login/logout">
              <img src="http://localhost/tabungan_pondok/upload/icon/logout.png" width="64px" class="rounded mx-auto d-block" alt="...">
              <h3>logout</h3>
            </a>

          </span>
        </div>
      </div>
    </div>
  </div>




  <div class="container box">
    <div class="row">
      <div class="col boxxx">

        <table border="0" class="ttable">
          <tr>
            <td rowspan="3">

              <span>
                <a href="http://localhost/tabungan_pondok/laporan">
                  <img src="http://localhost/tabungan_pondok/upload/icon/user.png" width="90px" class="rounded mx-auto d-block" alt="...">

            </td>
          </tr>
          <tr>
            <td colspan="" rowspan="" headers="" class="ttk">

              <input type="text" id="juser" class="form-control-plaintext textbok" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="" readonly>

            </td>

          </tr>

          <tr>
            <td colspan="" rowspan="" headers="">

              <input id="" type="text" class="form-control-plaintext textboxx" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="Jumlah Nasaba" readonly>

            </td>
          </tr>

        </table>

      </div>

      <div class="col boxxx">
        <table border="0" class="ttable">
          <tr>
            <td rowspan="3">

              <span>
                <a href="http://localhost/tabungan_pondok/laporan">
                  <img src="http://localhost/tabungan_pondok/upload/icon/uang.png" width="90px" class="rounded mx-auto d-block" alt="...">

            </td>
          </tr>
          <tr>
            <td colspan="" rowspan="" headers="" class="ttk">

              <input type="text" id="jsaldou" class="form-control-plaintext uang" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="" readonly>

            </td>

          </tr>

          <tr>
            <td colspan="" rowspan="" headers="">

              <input id="" type="text" class="form-control-plaintext textboxx" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="Jumlah Saldo Nasabah" readonly>

            </td>
          </tr>

        </table>



      </div>

      <div class="col boxxx">


        <table border="0" class="ttable">
          <tr>
            <td rowspan="3">

              <span>
                <a href="http://localhost/tabungan_pondok/laporan">
                  <img src="http://localhost/tabungan_pondok/upload/icon/tarik.png" width="90px" class="rounded mx-auto d-block" alt="...">

            </td>
          </tr>
          <tr>
            <td colspan="" rowspan="" headers="" class="ttk">

              <input type="text" id="jtarik" class="form-control-plaintext uang" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="" readonly>

            </td>

          </tr>

          <tr>
            <td colspan="" rowspan="" headers="">

              <input id="" type="text" class="form-control-plaintext textboxx" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="Jumlah Tarik Nasabah" readonly>

            </td>
          </tr>

        </table>




      </div>

      <div class="col boxxx">


        <table border="0" class="ttable">
          <tr>
            <td rowspan="3">

              <span>
                <a href="http://localhost/tabungan_pondok/laporan">
                  <img src="http://localhost/tabungan_pondok/upload/icon/setor.png" width="90px" class="rounded mx-auto d-block" alt="...">

            </td>
          </tr>
          <tr>
            <td colspan="" rowspan="" headers="" class="ttk">

              <input type="text" id="jsetor" class="form-control-plaintext uang" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="" readonly>

            </td>

          </tr>

          <tr>
            <td colspan="" rowspan="" headers="">

              <input id="" type="text" class="form-control-plaintext textboxx" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="Jumlah Setor Nasabah" readonly>

            </td>
          </tr>

        </table>


      </div>
    </div>
  </div>

  <div class="container box">
    <div class="row">
      <div class="col-sm-9">
        <h1>Setting Aplikasi</h1>
      </div>
    </div>
    <br>
    <br>
    <form method="post" id="setting">
      <div class="row">

        <div class="col-sm-3">
          <input type="text" readonly class="form-control-plaintext" value="Tanggal Pengambilan Biaya Admin">
        </div>
        <div class="col-sm-3">
          <input type="number" min="1" max="29" class="form-control" id="SettingTanggal">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-3">
          <input type="text" readonly class="form-control-plaintext" value="Biaya Admin Per Bulan">
        </div>
        <div class="col-sm-3">
          <input type="number" class="form-control" id="SettingJumlah">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-3">
          <input type="text" readonly class="form-control-plaintext" value="Saldo Minimal">
        </div>
        <div class="col-sm-3">
          <input type="number" class="form-control" id="SettingSaldo">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
        </div>
        <div class="col-sm-2">
        </div>
      </div>
    </form>

  </div>

  <!-- Write your comments here 

  <div class="container box">
    <div class="row">
      <div class="col-sm-9">
        <h1>REKAP HARIAN</h1>
      </div>
    </div>
    <br>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" value="SALDO AWAL">
      </div>
      <div class="col-sm-3">
        <input type="text" readonly="" class="form-control-plaintext" id="asaldo">
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-danger" id="okawal">ubah</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" value="UANG TAMBAHAN">
      </div>
      <div class="col-sm-3">
        <input type="text" readonly="" class="form-control-plaintext" id="tambahs">
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-primary" id="utambah">tambah</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" value="SETOR">
      </div>
      <div class="col-sm-3">
        <input type="text" readonly="" class="form-control-plaintext" id="rsetor">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" value="TARIK">
      </div>
      <div class="col-sm-3">
        <input type="text" readonly="" class="form-control-plaintext" id="rtarik">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" value="UANG YANG ADA">
      </div>
      <div class="col-sm-3">
        <input type="text" readonly="" class="form-control-plaintext" id="uangyada">
      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-primary" id="tUYADA">ubah</button>
      </div>
    </div>

    <br>
    <div class="row">
      <div class="col-sm-3">
        <input type="text" readonly class="form-control-plaintext" value="SELISIH">
      </div>
      <div class="col-sm-3">
        <input type="text" class="form-control-plaintext" readonly="" id="totalr">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-2">

      </div>
      <div class="col-sm-3">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="rekap">REKAP</button>
      </div>
      <div class="col-sm-2">
      </div>
    </div>

  </div>
-->

  <!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" id="spass">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <label>jumlah uang</label>
            <input type="number" id="juangt" class="form-control" />
            <label>keterangan</label>
            <input type="text" id="ket" class="form-control" />

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="submit" id="kutambah" name="action" class="btn btn-success" value="ok" />
          </div>

      </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" id="setting">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" id="judulm">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <label>jumlah uang</label>
            <input type="number" id="uangya" class="form-control" />
            <input type="hidden" id="action" name="action" class="btn btn-success" value="Add" " />
          
        </div>
        
        <!-- Modal footer -->
        <div class=" modal-footer">
            <input type="submit" id="kutambah" name="action" class="btn btn-success" value="ok" />
          </div>

      </div>
      </form>
    </div>
  </div>







</body>

</html>


<script type="text/javascript">
  function get_data() {
    $.ajax({
      url: '<?php echo base_url() . 'awal/jurnal' ?>',
      dataType: "json",
      success: function(data) {
        $('#juser').val(data.jnsb);
        $('#jsaldou').val(data.jsaldo);
        $('#jtarik').val(data.jtarik);
        $('#jsetor').val(data.jsetor);
        $('#rsetor').val(data.jsetor);
        $("#rtarik").val(data.jtarik);
        //      $('#asaldo').val(data.asaldo);
        //       $('#tambahs').val(data.tambahs);
        //     $("#totalr").val(data.rekap);
        //      $("#uangyada").val(data.uyada);


        $("#SettingJumlah").val(data.jumlah);
        $("#SettingTanggal").val(data.tanggal);
        $("#SettingSaldo").val(data.saldo);


      }
    });
  }




  $(document).ready(function() {

    get_data();

    setInterval(function() {

      data();


    }, 30000);

    $("#utambah").click(function() {
      $('#myModal').modal('show');
      $('.modal-title').text("UANG TAMBAH");

    });



    $(document).on('submit', '#spass', function(event) {
      event.preventDefault();

      var ket = $('#ket').val();
      var tambahs = $('#juangt').val();

      $.ajax({
        url: '<?php echo base_url() . 'awal/stambah' ?>',
        method: "post",
        data: {
          tambahs: tambahs,
          ket: ket
        },
        success: function() {
          $('#juangt').val('');
          $('#ket').val('');
          alert('berhasil di tambahkan');
          $('#myModal').modal('hide');
          $.ajax({
            url: '<?php echo base_url() . 'awal/jurnal' ?>',
            dataType: "json",
            success: function(data) {
              $('#juser').val(data.jnsb);
              $('#jsaldou').val(data.jsaldo);
              $('#jtarik').val(data.jtarik);
              $('#jsetor').val(data.jsetor);
              $('#rsetor').val(data.jsetor);
              $("#rtarik").val(data.jtarik);
              $('#asaldo').val(data.asaldo);
              $('#tambahs').val(data.tambahs);
              $("#totalr").val(data.rekap);
              $("#uangyada").val(data.uyada);
            }
          });

        }
      });



    });

    $("#rekap").click(function() {

      $.ajax({
        url: '<?php echo base_url() . 'awal/rekap' ?>',
        method: "post",
        success: function(data) {
          alert('berhasil rekap');
          $("#totalr").val(data);

        }
      });



    });





    $("#okawal").click(function() {
      $('#myModal1').modal('show');
      $('#judulm').text("SALDO AWAL");
      $('#action').val("SDAWAL");


    });



    $("#tUYADA").click(function() {
      $('#myModal1').modal('show');
      $('#judulm').text("UANG YANG ADA");
      $('#action').val("UADA");

    });

    $(document).on('submit', '#spass1', function(event) {
      event.preventDefault();

      var action = $('#action').val();
      var uang = $('#uangya').val();
      alert(uang);

      $.ajax({
        url: '<?php echo base_url() . 'awal/saua' ?>',
        method: "post",
        data: {
          action: action,
          uang: uang,
        },
        success: function() {
          $('#action').val('');
          $('#uangya').val('');
          alert('berhasil');
          $('#myModal1').modal('hide');
          $.ajax({
            url: '<?php echo base_url() . 'awal/jurnal' ?>',
            dataType: "json",
            success: function(data) {
              $('#juser').val(data.jnsb);
              $('#jsaldou').val(data.jsaldo);
              $('#jtarik').val(data.jtarik);
              $('#jsetor').val(data.jsetor);
              $('#rsetor').val(data.jsetor);
              $("#rtarik").val(data.jtarik);
              $('#asaldo').val(data.asaldo);
              $('#tambahs').val(data.tambahs);
              $("#totalr").val(data.rekap);
              $("#uangyada").val(data.uyada);
            }
          });

        }
      });



    });



    $(document).on('submit', '#setting', function(event) {
      event.preventDefault();

      let jumlah = $("#SettingJumlah").val();
      let tanggal = $("#SettingTanggal").val();
      let saldo = $("#SettingSaldo").val();



      $.ajax({
        url: '<?php echo base_url() . 'awal/setting' ?>',
        method: "post",
        data: {
          tanggal: tanggal,
          jumlah: jumlah,
          saldo: saldo,
        },
        success: function() {
          $('#action').val('');
          $('#uangya').val('');
          alert('berhasil');
          $('#myModal1').modal('hide');

          get_data();

        }
      });



    });








  });
</script>