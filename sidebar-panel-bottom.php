<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package gwt_wp
 */
?>

<?php if(is_active_sidebar('panel-bottom-1') || is_active_sidebar('panel-bottom-2') || is_active_sidebar('panel-bottom-3') || is_active_sidebar('panel-bottom-4')): ?>
<div id="panel-bottom" role="complementary">
	<div class="row">
		<?php if(is_active_sidebar('panel-bottom-1')): ?>
		<aside id="panel-bottom-1" class="<?php govph_displayoptions( 'govph_position_panel_bottom_1' ); ?>columns" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-bottom-1' ) ?>
		</aside>
		<?php endif; ?>
		<?php if(is_active_sidebar('panel-bottom-2')): ?>
		<aside id="panel-bottom-2" class="<?php govph_displayoptions( 'govph_position_panel_bottom_2' ); ?>columns" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-bottom-2' ) ?>
		</aside>
		<?php endif; ?>
		<?php if(is_active_sidebar('panel-bottom-3')): ?>
		<aside id="panel-bottom-3" class="<?php govph_displayoptions( 'govph_position_panel_bottom_3' ); ?>columns" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-bottom-3' ) ?>
		</aside>
		<?php endif; ?>
		<?php if(is_active_sidebar('panel-bottom-4')): ?>
		<aside id="panel-bottom-4" class="<?php govph_displayoptions( 'govph_position_panel_bottom_4' ); ?>columns" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'panel-bottom-4' ) ?>
		</aside>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>