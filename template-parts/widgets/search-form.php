<form role="search" method="get" class="search-form d-flex align-items-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _e( 'Search for:', 'text-domain' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php _e( 'Search...', 'text-domain' ); ?>" value="" name="s" title="<?php _e( 'Search for:', 'text-domain' ); ?>" />
    </label>
    <button>
    <i class="fas fa-search"></i>
    <span class="screen-reader-text"><?php _e( 'Search', 'text-domain' ); ?></span>
    </button>
</form>
