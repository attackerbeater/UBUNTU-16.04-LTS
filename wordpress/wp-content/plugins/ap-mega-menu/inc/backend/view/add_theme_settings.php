<?php defined('ABSPATH') or die("No script kiddies please!"); 
if(isset($_GET['action']) && $_GET['action'] == 'edit_theme'){
	if(isset($_GET['theme_id'])){
		$themeid = $_GET['theme_id'];
		$theme_object = new AP_Theme_Settings();
		$custom_theme = $theme_object->get_custom_theme_data($themeid);
		$custom_themes = $custom_theme[0];
		$theme_title = $custom_themes->title;
		$created = $custom_themes->created;
		$modified = $custom_themes->modified;
		$theme_settings = unserialize($custom_themes->theme_settings);
	}
}
?>
<div class="apmm-settings-main-wrapper wpmm-add-theme-page">
	<div class="apmm-header">
		<?php include_once(APMM_PATH.'/inc/backend/panel_head.php');?>
	</div>

	<?php if(isset($_GET['error_message'])){
		if($_GET['error_message'] == 1){ ?>
			<div class="notice notice-error apmm-message">
				<p><?php _e('Something went wrong. Please try again later.',APMM_TD);?></p>
			</div>
		<?php }else if($_GET['error_message'] == 2){?>
			<div class="notice notice-error apmm-message">
				<p><?php _e('Something went wrong. Please check the write permission of temp folder inside the plugin\'s folder',APMM_TD);?></p>
			</div>
		<?php }else if($_GET['error_message'] == 3){?>
			<div class="notice notice-error apmm-message">
				<p><?php _e('Invalid File Extension',APMM_TD);?></p>
			</div>
		<?php }else if($_GET['error_message'] == 4){?>
			<div class="notice notice-error apmm-message">
				<p><?php _e('No any file uploaded.',APMM_TD);?></p>
			</div>
		<?php }
	} ?>

	<?php 
	if(isset($_GET['message'])){ 
		if($_GET['message'] == 1){?>
			<div class="notice notice-success apmm-message">
				<p><?php _e('Custom Theme Updated Successfully.',APMM_TD);?></p>
			</div>
		<?php }else if($_GET['message'] == 2){?>
			<div class="notice notice-success apmm-message">
				<p><?php _e('Custom Theme Added Successfully.',APMM_TD);?></p>
			</div>
		<?php }else if($_GET['message'] == 3){?>
         <div class="notice notice-success apmm-message">
            <p><?php _e('Custom theme Copied Successfully.',APMM_TD);?></p>
         </div>
    <?php }else if($_GET['message'] == 4){?>
         <div class="notice notice-success apmm-message">
            <p><?php _e('Custom Theme deleted successfully.',APMM_TD);?></p>
         </div>
    <?php }
	} ?>

	<div class="container apmm-tab-container">
		<div class="row">
			<div  class="col-sm-12">

				<div id="poststuff">
					<div id="post-body" class="metabox-holder columns-2">

						<form class="apmm-theme-form" action="<?php echo admin_url('admin-post.php');?>" method="post">
							<input type="hidden" name="action" value="<?php echo (isset($_GET['theme_id']))?'wpmm_edit_action':'wpmm_add_action';?>"/>
							<input type="hidden" name="themeid" value="<?php echo (!isset($_GET['theme_id']))?'':$_GET['theme_id']; ?>"/>
							<input type="hidden" name="_nonce" value="<?php echo (!isset($_GET['_wpnonce']))?'':$_GET['_wpnonce']; ?>"/>
							<div id="post-body-content">

								<div class="meta-box-sortables ui-sortable">

									<div class="postbox">
										<div class="apmm_info_section">
											<p class="apmm-info"><?php 
											if(isset($_GET['action']) && $_GET['action'] == 'edit_theme'){
												_e('Edit Custom Theme',APMM_TD);
											}else{
												_e('Create Custom Theme',APMM_TD);
											}
											?></p>
											<a href="<?php echo admin_url('admin.php?page=wpmm-theme-settings'); ?>" class="button button-primary"><?php _e('Back',APMM_TD);?></a>
										</div>

										<div class="inside">

											<div class="main_settings_section">
												<?php include_once('editor/main_settings_editor.php');?>
											</div>

											<div class="menu_bar_settings_section">
												<?php include_once('editor/menubar_settings_editor.php');?>
											</div>

											<div class="top_level_settings_section">
												<?php include_once('editor/toplevel_settings_editor.php');?>
											</div>

											<div class="megamenu_settings_section">
												<?php include_once('editor/megamenu_settings_editor.php');?>
											</div>

											<div class="flyout_settings_section">
												<?php include_once('editor/flyout_settings_editor.php');?>
											</div>

											<div class="resposivemobile_settings_section">
												<?php include_once('editor/resposivemobile_settings_editor.php');?>
											</div>

											<div class="searchbar_settings_section">
												<?php include_once('editor/searchbar_settings_editor.php');?>
											</div>

										</div>             
										<!-- .inside -->
									</div>
									<!-- .postbox -->
								</div>
								<!-- .meta-box-sortables .ui-sortable -->
							</div>
							<div class="postbox-container" id="postbox-container-1">
								<div class="meta-box-sortables">
									<div class="postbox follow-scroll">

										<h2><span><?php _e('SAVE CUSTOM THEME',APMM_TD);?></span></h2>

										<div class="inside">
											<?php if(isset($_GET['action']) && $_GET['action'] == 'edit_theme'){?>
												<p><?php _e('Status: ',APMM_TD);?><?php _e('Saved',APMM_TD);?></p>
												<p><?php _e('Created Date: ',APMM_TD);?><?php 
												$date = $created;
												echo date( 'h:i:s A M jS, Y ', strtotime( $date ) );  ?></p>
												<p><?php _e('Last Modified Date: ',APMM_TD);?><?php $date2 = $modified;
												echo date( 'h:i:s A M jS, Y ', strtotime( $date2 ) ); ?></p>
												<?php wp_nonce_field('wpmm-edit-nonce','wpmm_edit_nonce_field');
											}else{
												wp_nonce_field('wpmm-add-nonce','wpmm_add_nonce_field');
											} ?>

											<input type="submit" class="button button-primary" id="wpmm-add-button" name="settings_submit" value="<?php _e('Save Theme',APMM_TD);?>"/>
										</div>

									</div>


								</div>
								<!-- .meta-box-sortables -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>  
</div>