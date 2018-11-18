<?php
    global $wpdb;
    $datapenduduk = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'penduduk where nik='.$_GET['id1']);
    $datafoto = wp_get_attachment_image($_GET['id2'])
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    <link href="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/css/style.css') ?>" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/js/bootstrap.min.js') ?>" type="text/javascript">
    <title>Detail Data Diri Penduduk</title>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center" style="padding:10px 0px;">
          <h2>Detail Data Diri <b>Penduduk</b></h2>
          <h1 style="color:#d92732;">DAPIL Rohmad Hadiwijoyo</h1>
          <img style="padding:10px 0px;" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '/vendor/twbs/bootstrap/dist/img/logo.png'; ?>" alt="Gerindra"/>
        </div>
        <table class="table table-bordered col-md-12">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">DATA DIRI</th>
              <th scope="col">KETERANGAN</th>
              <th scope="col">FOTO</th>
            </tr>
          </thead>
            <tr>
              <td>1.</td>
              <td>Nomor Induk Kependudukan</td>
              <td><?php echo $datapenduduk->nik ?></td>
              <td rowspan="8" align="center" class="align-middle"><?php echo $datafoto ?></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Nama</td>
                <td><?php echo $datapenduduk->nama ?></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Email</td>
                <td><?php echo $datapenduduk->email ?></td>
            </tr>
            <!-- <tr>
                <td>3.</td>
                <td>Telp Rumah</td>
                <td><?php //echo $datapenduduk->telp_rumah ?></td>
            </tr> -->
            <tr>
                <td>4.</td>
                <td>No HP</td>
                <td><?php echo $datapenduduk->no_hp ?></td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Tempat Lahir</td>
                <td><?php echo $datapenduduk->tempat_lahir ?></td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Tanggal Lahir</td>
                <td><?php echo $datapenduduk->tanggal_lahir ?></td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Jenis Kelamin</td>
                <td><?php echo $datapenduduk->jenis_kelamin ?></td>
            </tr>
            <!-- <tr>
                <td>8.</td>
                <td>Golongan Darah</td>
                <td><?php //echo $datapenduduk->golongan_darah ?></td>
            </tr> -->
            <tr>
                <td>8.</td>
                <td>Alamat</td>
                <td><?php echo $datapenduduk->alamat ?></td>
            </tr>
            <tr id="print">
                <td colspan="4" align="right">
                  <a href="<?php echo home_url("/") ?>" class="btn btn-warning" role="button">Kembali</a>
                  <button class="btn btn-primary" onclick="myFunction()">Print</button>
                </td>
            </tr>
        </table>
      </div>
    </div>
</body>
<script>
    function myFunction() {
        var id = document.getElementById('print');
        id.style.display = 'none';
        window.print();
        var id = document.getElementById('print');
        id.style.display = 'table-row';
    }
</script>
</html>
