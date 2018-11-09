<?php

function dcc_cimb_settings_add_func() {
	global $wpdb;
	
	if ( !current_user_can( 'manage_options' ) ) {
      wp_die( __('You are not allowed to be on this page.','nation') );
	}
	// Check that nonce field
	check_admin_referer( 'dcc_cimb_settings_edit' );
	
	$dccCimbEnabled = (isset($_POST['dcc_cimb_enabled']))?$_POST['dcc_cimb_enabled']:0;
	$dccCimbSandboxEnabled = (isset($_POST['dcc_cimb_sandbox_enabled']))?$_POST['dcc_cimb_sandbox_enabled']:0;
	
	$table_name = $wpdb->prefix . "dcc_cimb_conf";

	$wpdb->update( $table_name, array( 
		'plugin_status' => $dccCimbEnabled,
		'sandbox_status' => $dccCimbSandboxEnabled,
		'merchant_acc_no' => $_POST['merchant_acc_code'], 
		'txn_password' => $_POST['txn_pass'], 
		'company_code' => $_POST['company_code']
	), array( 'id' => 1 ) );
	
	wp_redirect(  admin_url( "admin.php?page=pg-cimb-setting" ) );
	exit;
}
add_action( 'admin_post_dcc_cimb_settings_edit', 'dcc_cimb_settings_edit_func' );



?>