<?php
/**
 * Images list item template
 */
$settings       = $this->get_settings_for_display();
$perPage        = $settings['per_page'];
$is_more_button = $settings['view_more_button'];
$is_lightbox    = 'lightbox' == $this->_loop_item( array( 'item_image_link' ) ) ? true : false;
$lightbox_title = isset( $settings['lightbox_show_title'] ) ? $settings['lightbox_show_title'] : 'false';
$lightbox_desc  = isset( $settings['lightbox_show_desc'] ) ? $settings['lightbox_show_desc'] : 'false';
$item_instance  = 'item-instance-' . $this->item_counter;
$more_item      = ( $this->item_counter >= $perPage && filter_var( $is_more_button, FILTER_VALIDATE_BOOLEAN ) ) ? true : false;

$this->add_render_attribute( $item_instance, 'class', array(
	'jet-portfolio__item',
	! $more_item ? 'visible-status' : 'hidden-status',
) );

if ( 'justify' == $settings['layout_type'] ) {
	$this->add_render_attribute( $item_instance, 'class', $this->get_justify_item_layout() );
}

$this->add_render_attribute( $item_instance, 'data-slug', $this->get_item_slug_list() );

$link_instance = 'link-instance-' . $this->item_counter;

$this->add_render_attribute( $link_instance, 'class', array(
	'jet-portfolio__link',
	// Ocean Theme lightbox compatibility
	class_exists( 'OCEANWP_Theme_Class' ) ? 'no-lightbox' : '',
) );

if ( $is_lightbox ) {
	$link_href = $this->_loop_item( array( 'item_image', 'url' ) );
} else {
	$link_href   = $this->_loop_item( array( 'item_button_url', 'url' ) );
	$is_external = $this->_loop_item( array( 'item_button_url', 'is_external') );
	$link_target = 'on' === $is_external ? '_blank' : '';
	$this->add_render_attribute( $link_instance, 'target', $link_target );
	$is_nofollow = $this->_loop_item( array( 'item_button_url', 'nofollow') );
	$rel = 'on' === $is_nofollow ? 'nofollow' : '';
	$this->add_render_attribute( $link_instance, 'rel', $rel );
}

$this->add_render_attribute( $link_instance, 'href', $link_href );

if ( $is_lightbox ) {
	$this->add_render_attribute( $link_instance, 'data-elementor-open-lightbox', 'yes' );

	if ( 'true' === $lightbox_title ) {
		$this->add_render_attribute( $link_instance, 'data-elementor-lightbox-title', $this->_loop_item( array( 'item_title', '%s' ) ) );
	}

	if ( 'true' === $lightbox_desc ) {
		$this->add_render_attribute( $link_instance, 'data-elementor-lightbox-description', wp_strip_all_tags( $this->_loop_item( array( 'item_desc', '%s' ) ) ) );
	}
}

?>
<article <?php echo $this->get_render_attribute_string( $item_instance ); ?>>
	<div class="jet-portfolio__inner">
		<a <?php echo $this->get_render_attribute_string( $link_instance ); ?>>
			<div class="jet-portfolio__image">
				<?php echo $this->_loop_image_item(); ?>
				<div class="jet-portfolio__image-loader"><span></span></div>

				<?php if ( ! $this->trp_edit_mode() ) :?>
					<div class="jet-portfolio__cover"><?php echo $cover_icon; ?></div>
				<?php endif;?>
			</div>
		</a>
	</div>
</article><?php

$this->item_counter++;
?>
