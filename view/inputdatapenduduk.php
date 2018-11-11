
<?php
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
            'telephone' => $_POST['telephone'],
            'tempat_lahir' => $_POST['tempatlahir'], 
            'tanggal_lahir' => $_POST['tanggallahir'], 
            'jenis_kelamin' => $_POST['jeniskelamin'], 
            'golongan_darah' => $_POST['golongandarah'],
            'alamat' => $_POST['alamat'],
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
    <link href="<?php echo plugins_url('inputdatapendudukpluginwordpress/vendor/twbs/bootstrap/dist/js/bootstrap.min.js') ?>" type="text/javascript">

    <title>Input Data Penduduk</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
                <div class="col-sm-10">
                <input type="telephone" class="form-control" id="telephone" name="telephone" placeholder="Telephone">
                </div>
            </div>
            <div class="form-group row">
                <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="Tanggal Lahir" required>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="pria" checked>
                        <label class="form-check-label" for="gridRadios1">
                            Laki - laki
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="wanita">
                        <label class="form-check-label" for="gridRadios2">
                            Perempuan
                        </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="golongandarah" class="col-sm-2 col-form-label">Golongan Darah</label>
                <div class="col-sm-10">
                <select name="golongandarah" id="golongandarah" class="form-control">
                    <option selected value="-" > - </option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="uploadfoto" class="col-sm-2 col-form-label">Upload Foto KTP</label>
                <div class="col-sm-10">
                <!-- <input type="file" class="form-control-file" id="uploadfoto" name="foto"> -->
                <input type="file" name="uploadfoto" id="uploadfoto" class="form-control-file" multiple="false" required />
                </div>
            </div>
            <!-- <div class="form-group row">
                <div class="col-sm-2">Checkbox</div>
                <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                    Example checkbox
                    </label>
                </div>
                </div>
            </div> -->
            <input type='hidden' name='action' value='add_population' /></table>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
