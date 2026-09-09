<?php
/**
 * Search Form Template
 *
 * @package MILEYM3DIA
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php esc_html_e('Search for:', 'mileym3dia'); ?></span>
        <input 
            type="search" 
            class="search-field" 
            placeholder="<?php esc_attr_e('Search...', 'mileym3dia'); ?>" 
            value="<?php echo get_search_query(); ?>" 
            name="s"
            aria-label="<?php esc_attr_e('Search', 'mileym3dia'); ?>"
        />
    </label>
    <button type="submit" class="search-submit" aria-label="<?php esc_attr_e('Submit search', 'mileym3dia'); ?>">
        <?php mileym3dia_icon('arrow-right'); ?>
    </button>
</form>
