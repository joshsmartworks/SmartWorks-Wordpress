<?php

if (class_exists('WP_Customize_Control')){


	class Info_Custom_control extends WP_Customize_Control{
		public $type = 'info';
		public function render_content(){
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo $this->description; ?></p>
			<?php
		}
	}


	class Separator_Custom_control extends WP_Customize_Control{
		public $type = 'separator';
		public function render_content(){
			?>
			<p><hr></p>
			<?php
		}
	}


	class Multi_Input_Custom_control extends WP_Customize_Control{
		public $type = 'multi_input';
		public function enqueue(){
			wp_enqueue_script( 'custom_controls', TEMPPATH.'/inc/customizer/js/custom_controls.js', array( 'jquery' ),'', true );
			wp_enqueue_style( 'custom_controls_css', TEMPPATH.'/inc/customizer/css/custom_controls.css');
		}
		public function render_content(){
			?>
			<label class="customize_multi_input">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo $this->description; ?></p>
				<input type="hidden" id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" value="<?php echo $this->value(); ?>" class="customize_multi_value_field" data-customize-setting-link="<?php echo $this->id; ?>"/>
				<div class="customize_multi_fields">
					<div class="set">
						<input type="text" value="" class="customize_multi_single_field"/>
						<a href="#" class="customize_multi_remove_field">X</a>
					</div>
				</div>
				<a href="#" class="button button-primary customize_multi_add_field"><?php _e('Add More', 'ABdev_incomeup') ?></a>
			</label>
			<?php
		}
	}


	class Toggle_Checkbox_Custom_control extends WP_Customize_Control{
		public $type = 'toogle_checkbox';
		public function enqueue(){
			wp_enqueue_script( 'custom_controls', TEMPPATH.'/inc/customizer/js/custom_controls.js', array( 'jquery' ),'', true );
			wp_enqueue_style( 'custom_controls_css', TEMPPATH.'/inc/customizer/css/custom_controls.css');
		}
		public function render_content(){
			?>
			<div class="checkbox_switch">
				<div class="onoffswitch">
				    <input type="checkbox" id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
				    <label class="onoffswitch-label" for="<?php echo $this->id; ?>"></label>
				</div>
				<span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo $this->description; ?></p>
			</div>
			<?php
		}
	}


	class Sidebar_Dropdown_Custom_Control extends WP_Customize_Control{
		public $type = 'sidebar_dropdown';
		public function enqueue(){
			wp_enqueue_script( 'custom_controls', TEMPPATH.'/inc/customizer/js/custom_controls.js', array( 'jquery' ),'', true );
			wp_enqueue_style( 'custom_controls_css', TEMPPATH.'/inc/customizer/css/custom_controls.css');
		}
	    public function render_content(){
		?>
			<label class="customize_dropdown_input">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo $this->description; ?></p>
				<?php
				global $wp_registered_sidebars;
				 ?>
				<select id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" data-customize-setting-link="<?php echo $this->id; ?>">
				<?php
				$sidebar_shop = $wp_registered_sidebars;
				if(is_array($sidebar_shop) && !empty($sidebar_shop)){
					foreach($sidebar_shop as $sidebar){
						echo '<option value="'.$sidebar['name'].'" ' . selected( $this->value(), $sidebar['name'], false ) . '>'.$sidebar['name'].'</option>';
					}
				}
				?>
				</select>
				<br>
			</label>
		<?php
	    }
	}


	class Layout_Picker_Products_Custom_Control extends WP_Customize_Control{
		public $type = 'woo_products_per_row';
		public function enqueue(){
			wp_enqueue_style( 'custom_controls_css', TEMPPATH.'/inc/customizer/css/custom_controls.css');
		}
		public function render_content(){
		?>
			<div class="customize_products_image_select">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo $this->description; ?></p>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="3" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('3', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/3col.png'?>" alt="<?php esc_attr_e('3 Column', 'ABdev_incomeup'); ?>" title="<?php esc_attr_e('3 Column', 'ABdev_incomeup'); ?>" />
					</label>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="4" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('4', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/4col.png'?>" alt="<?php esc_attr_e('4 Column', 'ABdev_incomeup'); ?>" title="<?php esc_attr_e('4 Column', 'ABdev_incomeup'); ?>" />
					</label>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="5" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('5', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/5col.png'?>" alt="<?php esc_attr_e('5 Column', 'ABdev_incomeup'); ?>"  title="<?php esc_attr_e('5 Column', 'ABdev_incomeup'); ?>" />
					</label>
			</div>
		<?php
		}
	}


	class Layout_Picker_Shop_Layout_Custom_Control extends WP_Customize_Control{
		public $type = 'woo_shop_layout';
		public function enqueue(){
			wp_enqueue_style( 'custom_controls_css', TEMPPATH.'/inc/customizer/css/custom_controls.css');
		}
		public function render_content(){
		?>
			<div class="customize_shop_layout_image_select">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo $this->description; ?></p>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="left_sidebar" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('left_sidebar', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/left_sidebar.png'?>" alt="<?php esc_attr_e('Left Sidebar', 'ABdev_incomeup'); ?>"  title="<?php esc_attr_e('Left Sidebar', 'ABdev_incomeup'); ?>" />
					</label>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="right_sidebar" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('right_sidebar', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/right_sidebar.png'?>" alt="<?php esc_attr_e('Right Sidebar', 'ABdev_incomeup'); ?>" title="<?php esc_attr_e('Right Sidebar', 'ABdev_incomeup'); ?>" />
					</label>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="no_sidebar" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('no_sidebar', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/no_sidebar.png'?>" alt="<?php esc_attr_e('No Sidebar', 'ABdev_incomeup'); ?>" title="<?php esc_attr_e('No Sidebar', 'ABdev_incomeup'); ?>" />
					</label>
			</div>
		<?php
		}
	}


	class Layout_Picker_Single_Product_Layout_Custom_Control extends WP_Customize_Control{
		public $type = 'woo_shop_layout';
		public function enqueue(){
			wp_enqueue_style( 'custom_controls_css', TEMPPATH.'/inc/customizer/css/custom_controls.css');
		}
		public function render_content(){
		?>
			<div class="customize_single_product_layout_image_select">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo $this->description; ?></p>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="sp_left_sidebar" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('sp_left_sidebar', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/left_sidebar.png'?>" alt="<?php esc_attr_e('Left Sidebar', 'ABdev_incomeup'); ?>" title="<?php esc_attr_e('Left Sidebar', 'ABdev_incomeup'); ?>" />
					</label>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="sp_right_sidebar" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('sp_right_sidebar', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/right_sidebar.png'?>" alt="<?php esc_attr_e('Right Sidebar', 'ABdev_incomeup'); ?>" title="<?php esc_attr_e('Right Sidebar', 'ABdev_incomeup'); ?>" />
					</label>
					<label>
						<input type="radio" name="<?php echo $this->id; ?>" value="sp_no_sidebar" data-customize-setting-link="<?php echo $this->id; ?>" <?php checked('sp_no_sidebar', $this->value());?>/>
						<img src="<?php echo TEMPPATH.'/images/no_sidebar.png'?>" alt="<?php esc_attr_e('No Sidebar', 'ABdev_incomeup'); ?>"  title="<?php esc_attr_e('No Sidebar', 'ABdev_incomeup'); ?>" />
					</label>
			</div>
		<?php
		}
	}



	class Single_Product_Sidebar_Dropdown_Custom_Control extends WP_Customize_Control{
		public $type = 'single_product_sidebar_dropdown';
		public function enqueue(){
			wp_enqueue_script( 'custom_controls', TEMPPATH.'/inc/customizer/js/custom_controls.js', array( 'jquery' ),'', true );
			wp_enqueue_style( 'custom_controls_css', TEMPPATH.'/inc/customizer/css/custom_controls.css');
		}
	    public function render_content(){
		?>

			<label class="customize_dropdown_input">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<p><?php echo $this->description; ?></p>
					<?php
					global $wp_registered_sidebars;
					 ?>
					<select id="<?php echo $this->id; ?>" name="<?php echo $this->id; ?>" data-customize-setting-link="<?php echo $this->id; ?>">
						<?php
						$sidebar_replacements = $wp_registered_sidebars;
						if(is_array($sidebar_replacements) && !empty($sidebar_replacements)){
							foreach($sidebar_replacements as $sidebar){
								echo '<option value="'.$sidebar['name'].'" ' . selected( $this->value(), $sidebar['name'], false ) . '>'.$sidebar['name'].'</option>';
							}
						}
						?>
					</select>
					<br>
			</label>
		<?php
	    }
	}



}

