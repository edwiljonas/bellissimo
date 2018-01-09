<div class="row">
    <div class="col-md-12">
        <span class="cart-total-cost">
            <?php esc_html_e('Total: ', 'knack'); echo wp_kses($total, $GLOBALS['knack_html']); ?>
        </span>
    </div>
</div>