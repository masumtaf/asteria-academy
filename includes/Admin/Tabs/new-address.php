<div class="wrap">
    <h2 class="wp-heading-inline"><?php _e( 'New Address Book' , 'asteria-academy' );?></h2>
    <?php var_dump($this->errors);?> 
    <form action="" method="post">
        <table class="form-tabel">
        <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e( 'Name', 'asteria-academy' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e( 'Phone', 'asteria-academy' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="email"><?php _e( 'E-mail', 'asteria-academy' ); ?></label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e( 'Address', 'asteria-academy' ); ?></label>
                    </th>
                    <td>
                        <textarea class="regular-text" name="address" id="address"></textarea>
                    </td>
                </tr>
</tbody>
        </table>
<?php wp_nonce_field( 'asteris-new-address' ) ;?>
<?php submit_button( __('Add Address', 'asteria-academy' ), 'primary', 'asteria_submit_address' ) ?>




    </form>

</div>