<?php 
    global $wpdb;
    $datapenduduk = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'penduduk where id='.$_GET['id1']);
    $datafoto = wp_get_attachment_image($_GET['id2'])
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    
    <link href="<?php echo plugins_url('inputpenduduk/vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo plugins_url('inputpenduduk/vendor/twbs/bootstrap/dist/js/bootstrap.min.js') ?>" type="text/javascript">

    <title>View Data Penduduk</title>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $datapenduduk->nik ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $datapenduduk->nama ?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?php echo $datapenduduk->tempat_lahir ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?php echo $datapenduduk->jenis_kelamin ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?php echo $datapenduduk->jenis_kelamin ?></td>
            </tr>
            <tr>
                <td>Golongan Darah</td>
                <td>:</td>
                <td><?php echo $datapenduduk->golongan_darah ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $datapenduduk->alamat ?></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td><?php echo $datafoto ?></td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
            </tr>
            <tr>
                <td><a href="<?php echo home_url("/") ?>" class="btn btn-warning" role="button">Kembali</a></td>
                <td></td>
                <td><button class="btn btn-primary" onclick="myFunction()">Print</button></td>
            </tr>
        </table>
    </div>
</body>
<script>
    function myFunction() {
        window.print();
    }
</script>
</html>
