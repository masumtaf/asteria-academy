<?php 

/**
 * Insert a new address to database table
 * 
 * @param array $args
 * 
 * @return int|WP_Error
 */

 function asteria_ac_insert_address( $args = [] ) {

    global $wpdb;

    if ( empty ( $args['name']) ){
        return new \WP_Error('NO -Name', __( 'You must be provide a name', 'asteria-academy') );
    }

    $defaults = [
        'name' => '',
        'phone' => '',
        'email' => '',
        'address' => '',
        'created_by' => get_current_user_id(),
        'created_at' => current_time('mysql'),
    ];

    $data = wp_parse_args( $args, $defaults );

    $inserted = $wpdb->insert(
        $wpdb->prefix . 'asteria_addresses',
        $data,
        [
            '%s',
            '%s',
            '%s',
            '%s',
            '%d',
            '%s',
        ]
    );

    if ( ! $inserted ) {
        return new \WP_Error( 'failed-to-insert', __( 'Faild to insert data' , 'asteria-academy' ) );
    }

    return $wpdb->insert_id;
}
