<?php

<a href="<?php echo admin_url( 'admin.php?page=myplugin-settings-page' ) ?>&action=download_csv&_wpnonce=<?php echo wp_create_nonce( 'download_csv' )?>" class="page-title-action"><?php _e('Export to CSV','my-plugin-slug');?></a>

if ( isset($_GET['action'] ) && $_GET['action'] == 'download_csv' )  {
    csv_export();
    die();
}

function csv_export() {
    // Check for current user privileges
    if( !current_user_can( 'manage_options' ) ){ return false; }
    // Check if we are in WP-Admin
    if( !is_admin() ){ return false; }

    ob_start();

    $fileName = 'Avene-Contest-Subscribers.csv';
    $tableName = 'av_subscriptions';

    $header_row = array(
        'Id',
        'Name',
        'Surname',
        'Phone',
        'Email',
        'Birthdate',
        'Town',
        'Postal code',
        'Avene newsletter',
        'Pierre fabre newsletter'
    );

    $data_rows = array();
    global $wpdb;
    $sql = "SELECT * FROM $tableName";
    $subs = $wpdb->get_results( $sql, 'ARRAY_A' );
    foreach ( $subs as $sub ) {
        $row = array(
            $sub['id'],
            $sub['name'],
            $sub['surname'],
            $sub['phone'],
            $sub['email'],
            $sub['birthdate'],
            $sub['town'],
            $sub['postal_code'],
            $sub['avene_newsletter'],
            $sub['pierre_fabre_newsletter']
        );
        $data_rows[] = $row;
    }
    $fh = @fopen( 'php://output', 'w' );
    fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv' );
    header( "Content-Disposition: attachment; filename={$fileName}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    fputcsv( $fh, $header_row );
    foreach ( $data_rows as $data_row ) {
        fputcsv( $fh, $data_row );
    }
    fclose( $fh );

    ob_end_flush();

    die();
}

?>