<?php

add_action( 'admin_post_add_population', 'add_population_func' );

function add_population_func() {
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
        // There was an error uploading the image.
    } else {
        // The image was uploaded successfully!
    }
    
    $wpdb->insert( $table_name, array( 
		'nik' => $_POST['nik'],
		'nama' => $_POST['nama'],
		'tempat_lahir' => $_POST['tempatlahir'], 
		'jenis_kelamin' => $_POST['tanggallahir'], 
		'golongan_darah' => $_POST['golongandarah'],
        'alamat' => $_POST['alamat'],
        'foto' => $attachment_id
	) );
	
	wp_redirect(  home_url( '/viewpenduduk?id1='.$wpdb->insert_id.'&id2='.$attachment_id ) );
	exit;
}



?>