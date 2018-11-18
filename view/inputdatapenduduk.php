
<?php
    // require __DIR__.'/../vendor/autoload.php';
    use Carbon\Carbon;
    if (isset($_POST['action'])){
        global $wpdb;
        $attachment_id = "";
        $table_name = $wpdb->prefix . "penduduk";

        // These files need to be included as dependencies when on the front end.
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );
        // Let WordPress handle the upload.
        // Remember, 'my_image_upload' is the name of our file input in our form above.
        $attachment_id = media_handle_upload( 'uploadfoto', 0 );

        if ( is_wp_error( $attachment_id ) ) {
            echo "Error Uploading File";
            // There was an error uploading the image.
        } else {
            // The image was uploaded successfully!
        }

        $insert  = $wpdb->insert( $table_name, array(
            'nik' => $_POST['nik'],
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            // 'telp_rumah' => $_POST['telprumah'],
            'no_hp' => $_POST['nohp'],
            'tempat_lahir' => $_POST['tempatlahir'],
            'tanggal_lahir' => $_POST['tanggallahir'],
            'jenis_kelamin' => $_POST['jeniskelamin'],
            // 'golongan_darah' => $_POST['golongandarah'],
            'alamat' => $_POST['alamat'],
            'created_at' =>  Carbon::now('Asia/Jakarta'),
            'foto' => $attachment_id
        ) );

        if ($insert === FALSE){
            wp_die( __('Input Gagal ! ' . $wpdb->last_error) );
        }else{
            wp_redirect(  home_url( '/viewpenduduk?id1='.$_POST['nik'].'&id2='.$attachment_id ) );
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    <link href="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/css/style.css') ?>" rel="stylesheet" type="text/css" media="all">
    <script src="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <title>Data Penduduk</title>
</head>
<body>
  <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '/vendor/twbs/bootstrap/dist/img/logo_gerindra.svg'; ?>" alt="Gerindra"/>
                <h3>Selamat datang!</h3>
                <p>Di halaman input data penduduk DAPIL Rohmad Hadiwijoyo Partai Gerindra</p>
              </br>
            </div>
            <div class="col-md-9 register-right">
                <h3 class="register-heading">Form Data Penduduk</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                              <form method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input id="nik" name="nik" type="text" class="form-control" placeholder="Nomor Induk Kependudukan *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama Lengkap *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input id="nohp" name="nohp" type="text" class="form-control"  placeholder="Nomor Handphone *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input id="tempatlahir" name="tempatlahir" type="text" class="form-control" placeholder="Tempat Lahir *" value="" required/>
                                </div>
                                <div class="form-group">
                                    <input id="tanggallahir" name="tanggallahir" type="date" class="form-control" placeholder="Tanggal Lahir *" value="" required/>
                                </div>
                                <div class="form-group">
                                  <label for="nama" class="col-form-label">Jenis Kelamin</label>
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="jeniskelamin" id="lakilaki" value="pria" checked>
                                            <span> Laki-laki </span>
                                        </label>
                                        <label class="radio inline" style="padding-left:10px">
                                            <input type="radio" name="jeniskelamin" id="perempuan" value="wanita">
                                            <span>Perempuan </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Alamat Lengkap *" required></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="uploadfoto" class="col-form-label">Upload Foto KTP</label>
                                  <input type="file" name="uploadfoto" id="uploadfoto" class="form-control-file" multiple="false" required />
                                </div>
                                <input type='hidden' name='action' value='add_population' />
                                <input type="submit" class="btnRegister"  value="Simpan"/>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</body>
</html>
