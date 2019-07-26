<?php
if (!defined('ABSPATH')) {
    exit; // disable direct access
}

if (!class_exists('WP_Mega_Menu_Widget')) :

    /**
     * Outputs a registered menu location using wp_nav_menu
     */
    class WP_Mega_Menu_Widget extends WP_Widget {

        public function __construct() {
            parent::__construct('wpmegamenu_widget', // Base ID
                    'AP Mega Menu Widget', // Name
                    array('description' => __('Display AP Mega Menu Location on selected area.', APMM_TD)));
        }

        /**
         * Front-end display of widget.
         */
        public function widget($args, $instance) {
            extract($args);

            if (isset($instance['location'])) {
                $location = $instance['location'];

                $title = apply_filters('widget_title', $instance['title']);

                echo $before_widget;

                if (!empty($title)) {
                    echo $before_title . $title . $after_title;
                }

                if (has_nav_menu($location)) {
                    wp_nav_menu(array('theme_location' => $location));
                }

                echo $after_widget;
            }
        }

        /**
         * Sanitize widget form values as they are saved.
         */
        public function update($new_instance, $old_instance) {
            $instance = array();
            $instance['location'] = strip_tags($new_instance['location']);
            $instance['title'] = strip_tags($new_instance['title']);

            return $instance;
        }

        /**
         * Back-end widget form.
         */
        public function form($instance) {

            $selected_location = 0;
            $title = "";
            $locations = get_registered_nav_menus();

            if (isset($instance['location'])) {
                $selected_location = $instance['location'];
            }

            if (isset($instance['title'])) {
                $title = $instance['title'];
            }
            ?>
            <p>
                <?php if ($locations) { ?>
                <p>
                    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', APMM_TD); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                </p>
                <label for="<?php echo $this->get_field_id('location'); ?>"><?php _e('Menu Location:', APMM_TD); ?></label>
                <select id="<?php echo $this->get_field_id('location'); ?>" name="<?php echo $this->get_field_name('location'); ?>">
                    <?php
                    foreach ($locations as $location => $description) {
                        echo "<option value='{$location}'" . selected($location, $selected_location) . ">{$description}</option>";
                    }
                    ?>
                </select>
            <?php
            } else {
                _e('No menu locations found', APMM_TD);
            }
            ?>
            </p>
            <?php
        }

    }

    endif;

if (!class_exists('WP_Mega_Menu_Contact_Info')) :

    /**
     * Outputs a contact information from widget
     */
    class WP_Mega_Menu_Contact_Info extends WP_Widget {

        public function __construct() {
            parent::__construct('wpmegamenu_contact_info', // Base ID
                    'AP Mega Menu Contact Info', // Name
                    array('description' => __('Display AP Mega Menu Contact Information.', APMM_TD)));
        }

        /**
         * Front-end display of widget.
         */
        public function widget($args, $instance) {
            echo $args['before_widget'];
            if (!empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            }

            echo "<div class='wpmegamenu-contact-info'>";

            if (isset($instance['address_font_icon']) || isset($instance['address'])) {
                echo "<p>";
                if (isset($instance['address_font_icon']) && $instance['address_font_icon'] != '') {
                    echo "<i class='" . $instance['address_font_icon'] . "'></i>";
                }
                if (isset($instance['address']) && $instance['address'] != '') {
                    echo $instance['address'];
                }
                echo "</p>";
            }

            if (isset($instance['phone_font_icon']) || isset($instance['phone'])) {
                echo "<p>";
                if (isset($instance['phone_font_icon']) && $instance['phone_font_icon'] != '') {
                    echo "<i class='" . $instance['phone_font_icon'] . "'></i>";
                }
                if (isset($instance['phone']) && $instance['phone'] != '') {
                    echo $instance['phone'];
                }
                echo "</p>";
            }

            if (isset($instance['email_font_icon']) || isset($instance['email'])) {
                echo "<p>";
                if (isset($instance['email_font_icon']) && $instance['email_font_icon'] != '') {
                    echo "<i class='" . $instance['email_font_icon'] . "'></i>";
                }
                if (isset($instance['email']) && $instance['email'] != '') {
                    echo $instance['email'];
                }
                echo "</p>";
            }

            if (isset($instance['website_font_icon']) || isset($instance['website'])) {
                echo "<p>";
                if (isset($instance['website_font_icon']) && $instance['website_font_icon'] != '') {
                    echo "<i class='" . $instance['website_font_icon'] . "'></i>";
                }
                if (isset($instance['website']) && $instance['website'] != '') {
                    echo $instance['website'];
                }
                echo "</p>";
            }

            if (isset($instance['custom_shortcode_title']) || (isset($instance['custom_shortcode']))) {
                echo "<div class='wpmm-social-shortcodes'>";
                echo "<h4>" . $instance['custom_shortcode_title'] . "</h4>";
                if ($instance['custom_shortcode'] != '') {
                    echo do_shortcode($instance['custom_shortcode']);
                }
                echo "</div>";
            }

            echo "</div>";
            echo $args['after_widget'];
        }

        /**
         * Sanitize widget form values as they are saved.
         * @param array   $new_instance Values just sent to be saved.
         * @param array   $old_instance Previously saved values from database.
         * @return array Updated safe values to be saved.
         */
        public function update($new_instance, $old_instance) {
            $instance = array();
            $instance['title'] = strip_tags($new_instance['title']);
            $instance['address'] = strip_tags($new_instance['address']);
            $instance['address_font_icon'] = strip_tags($new_instance['address_font_icon']);
            $instance['phone'] = strip_tags($new_instance['phone']);
            $instance['phone_font_icon'] = strip_tags($new_instance['phone_font_icon']);
            $instance['email'] = strip_tags($new_instance['email']);
            $instance['email_font_icon'] = strip_tags($new_instance['email_font_icon']);
            $instance['website'] = strip_tags($new_instance['website']);
            $instance['website_font_icon'] = strip_tags($new_instance['website_font_icon']);
            $instance['custom_shortcode'] = strip_tags($new_instance['custom_shortcode']);
            $instance['custom_shortcode_title'] = strip_tags($new_instance['custom_shortcode_title']);

            return $instance;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance) {
            if (isset($instance['title'])) {
                $title = $instance['title'];
            } else {
                $title = '';
            }
            if (isset($instance['address'])) {
                $address = $instance['address'];
            } else {
                $address = '';
            }
            if (isset($instance['address_font_icon'])) {
                $address_font_icon = $instance['address_font_icon'];
            } else {
                $address_font_icon = '';
            }
            if (isset($instance['phone'])) {
                $phone = $instance['phone'];
            } else {
                $phone = '';
            }
            if (isset($instance['phone_font_icon'])) {
                $phone_font_icon = $instance['phone_font_icon'];
            } else {
                $phone_font_icon = '';
            }
            if (isset($instance['email'])) {
                $email = $instance['email'];
            } else {
                $email = '';
            }
            if (isset($instance['email_font_icon'])) {
                $email_font_icon = $instance['email_font_icon'];
            } else {
                $email_font_icon = '';
            }
            if (isset($instance['website'])) {
                $website = $instance['website'];
            } else {
                $website = '';
            }
            if (isset($instance['website_font_icon'])) {
                $website_font_icon = $instance['website_font_icon'];
            } else {
                $website_font_icon = '';
            }
            if (isset($instance['custom_shortcode'])) {
                $custom_shortcode = $instance['custom_shortcode'];
            } else {
                $custom_shortcode = '';
            }
            if (isset($instance['custom_shortcode_title'])) {
                $custom_shortcode_title = $instance['custom_shortcode_title'];
            } else {
                $custom_shortcode_title = '';
            }
            ?>
            <p>

                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', APMM_TD); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('address_font_icon'); ?>"><?php _e('Address Icon:', APMM_TD); ?></label> 
            <p class="description"><?php _e('Use Fontawesome Class for Address Icon such as fa fa-home', APMM_TD); ?></p>
            <input class="widefat" id="<?php echo $this->get_field_id('address_font_icon'); ?>" name="<?php echo $this->get_field_name('address_font_icon'); ?>" type="text" value="<?php echo esc_attr($address_font_icon); ?>" placeholder="<?php _e('E.g., fa fa-home', APMM_TD); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address', APMM_TD) ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_attr($address); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('phone_font_icon'); ?>"><?php _e('Phone Icon:', APMM_TD); ?></label> 
            <p class="description"><?php _e('Use Fontawesome Class for Phone Icon such as fa fa-phone', APMM_TD); ?></p>
            <input class="widefat" id="<?php echo $this->get_field_id('phone_font_icon'); ?>" name="<?php echo $this->get_field_name('phone_font_icon'); ?>" type="text" value="<?php echo esc_attr($phone_font_icon); ?>" placeholder="<?php _e('E.g., fa fa-phone', APMM_TD); ?>">
            </p>
            <p>

                <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', APMM_TD); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('email_font_icon'); ?>"><?php _e('Email Icon:', APMM_TD); ?></label> 
            <p class="description"><?php _e('Use Fontawesome Class for Email Icon such as fa fa-phone', APMM_TD); ?></p>
            <input class="widefat" id="<?php echo $this->get_field_id('email_font_icon'); ?>" name="<?php echo $this->get_field_name('email_font_icon'); ?>" type="text" value="<?php echo esc_attr($email_font_icon); ?>" placeholder="<?php _e('E.g., fa fa-email', APMM_TD); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', APMM_TD); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="email" value="<?php echo esc_attr($email); ?>">
            </p>

            <p>

                <label for="<?php echo $this->get_field_id('website_font_icon'); ?>"><?php _e('Website Icon:', APMM_TD); ?></label> 
            <p class="description"><?php _e('Use Fontawesome Class for Website Icon such as fa fa-phone', APMM_TD); ?></p>
            <input class="widefat" id="<?php echo $this->get_field_id('website_font_icon'); ?>" name="<?php echo $this->get_field_name('website_font_icon'); ?>" type="text" value="<?php echo esc_attr($website_font_icon); ?>" placeholder="<?php _e('E.g., fa fa-globe', APMM_TD); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('website'); ?>"><?php _e('Website:', APMM_TD); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id('website'); ?>" name="<?php echo $this->get_field_name('website'); ?>" type="text" value="<?php echo esc_attr($website); ?>">
            </p>



            <p>
                <label for="<?php echo $this->get_field_id('custom_shortcode_title'); ?>"><?php _e('Custom Title', APMM_TD) ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('custom_shortcode_title'); ?>" name="<?php echo $this->get_field_name('custom_shortcode_title'); ?>" value="<?php echo esc_attr($custom_shortcode_title); ?>"/>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('custom_shortcode'); ?>"><?php _e('Custom Shortcode', APMM_TD) ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('custom_shortcode'); ?>" name="<?php echo $this->get_field_name('custom_shortcode'); ?>"><?php echo esc_attr($custom_shortcode); ?></textarea>
            </p>
            <?php
        }

    }

    

endif;


if ( ! class_exists('WP_Mega_Menu_PRO_LinkImage') ) :

/**
 * Outputs a contact information from widget
 */
class WP_Mega_Menu_PRO_LinkImage extends WP_Widget {

    
        public function __construct() {
            parent::__construct('wpmegamenu_pro_linkimage', // Base ID
                                'AP Mega Menu: Custom Image Widget', // Name
                                 array('description' => __('A widget to show uplaoded image with url link.', APMM_TD)));
        }

/**
     * Front-end display of widget.
     * @see WP_Widget::widget()
     * @param array   $args     Widget arguments.
     * @param array   $instance Saved values from database.
     */
   public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

         $linktarget =(isset($instance['linktarget']) && $instance['linktarget'] != '')?$instance['linktarget']:'';
         $url_link =(isset($instance['url_link']) && $instance['url_link'] != '')?$instance['url_link']:'#';
         $customimage =(isset($instance['customimage']) && $instance['customimage'] != '')?$instance['customimage']:'';
         $cwidth =(isset($instance['cwidth']) && $instance['cwidth'] != '')?$instance['cwidth']:'';
         $cheight =(isset($instance['cheight']) && $instance['cheight'] != '')?$instance['cheight']:'';

      if($customimage != ''){ ?>
       <div class="wpmm-image-link-wrapper">
        <a href="<?php echo esc_url($url_link);?>" target="<?php echo esc_attr($linktarget);?>">
          <img src="<?php echo esc_url($customimage);?>" class="wpmm-custom-image" <?php if($cwidth != '' || $cheight != '') 
           echo 'style="width:'.$cwidth.'px;height:'.$cheight.'px"';?>>
        </a>
      </div>
       <?php 
         }
        echo $args['after_widget'];
    }

    /**
     * Sanitize widget form values as they are saved.
     * @see WP_Widget::update()
     * @param array   $new_instance Values just sent to be saved.
     * @param array   $old_instance Previously saved values from database.
     * @return array Updated safe values to be saved.
     */

     function update( $new_instance, $old_instance ) {
     $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['linktarget'] = strip_tags($new_instance['linktarget']);
    $instance['url_link'] = strip_tags($new_instance['url_link']);
    $instance['customimage'] = strip_tags($new_instance['customimage']);
    $instance['cwidth'] = strip_tags($new_instance['cwidth']);
    $instance['cheight'] = strip_tags($new_instance['cheight']);

    return $instance;
}


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

            $title           = isset($instance[ 'title' ])?$instance[ 'title' ]:'';
            $linktarget        = isset($instance[ 'linktarget' ])?$instance[ 'linktarget' ]:'';
            $url_link    = isset($instance[ 'url_link' ])?$instance[ 'url_link' ]:'';
            $customimage    = (isset($instance[ 'customimage' ]) && $instance[ 'customimage' ] != '') ?$instance[ 'customimage' ]:APMM_IMG_DIR.'/no_preview.jpg';
            $cwidth    = isset($instance[ 'cwidth' ])?$instance[ 'cwidth' ]:'';
            $cheight    = isset($instance[ 'cheight' ])?$instance[ 'cheight' ]:'';


        ?>
       <p>  
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,APMM_TD); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
      </p>

            <p>
              <label for="<?php echo $this->get_field_id('url_link');?>"><?php _e('URL Link',APMM_TD)?></label>
             <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'url_link' ); ?>"
             name="<?php echo $this->get_field_name( 'url_link' ); ?>" value="<?php echo esc_url( $url_link ); ?>"/>
            </p> 
            <p>
                <label for="<?php echo $this->get_field_id('linktarget'); ?>">
                <?php _e('Select Image Link Target',APMM_TD)?>:</label>
                <select name="<?php echo $this->get_field_name('linktarget'); ?>" 
                id="<?php echo $this->get_field_id('linktarget'); ?>" class="widefat">
                         <option value="_blank"  <?php selected('_blank', $linktarget); ?>><?php _e('_blank',APMM_TD);?></option>
                         <option value="_self"  <?php selected('_self', $linktarget); ?>><?php _e('_self',APMM_TD);?></option>
                         <option value="_parent" <?php selected('_parent', $linktarget); ?>><?php _e('_parent',APMM_TD);?></option>
                         <option value="_top"  <?php selected('_top', $linktarget); ?>><?php _e('_top',APMM_TD);?></option>
                </select>
            </p>
            <p>
            <label for="<?php echo $this->get_field_id('customimage');?>"><?php _e('Choose Custom Image',APMM_TD)?></label>
             <input type="hidden" class="widefat wpmm-image-url" id="<?php echo $this->get_field_id( 'customimage' ); ?>"
             name="<?php echo $this->get_field_name( 'customimage' ); ?>" value="<?php echo esc_url( $customimage ); ?>"/>
            <input type="button" class="wpmm_image_url button button-primary button-large"
             id="<?php echo $this->get_field_id( 'customimage' ); ?>" name="wpmm_image_url"  value="Upload Image" 
            size="25"/> 
            <br/>
               <img style="width: 15%;" class="wpmm-image" src="<?php echo esc_url( $customimage ); ?>">
            </p>
             <p>
              <label for="<?php echo $this->get_field_id('cwidth');?>"><?php _e('Custom Width',APMM_TD)?></label>
             <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'cwidth' ); ?>"
             name="<?php echo $this->get_field_name( 'cwidth' ); ?>" value="<?php echo esc_attr( $cwidth ); ?>"/>
            </p> 
             <p>
              <label for="<?php echo $this->get_field_id('cheight');?>"><?php _e('Custom Height',APMM_TD)?></label>
             <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'cheight' ); ?>"
             name="<?php echo $this->get_field_name( 'cheight' ); ?>" value="<?php echo esc_attr( $cheight ); ?>"/>
            </p> 
        <?php 
    }
}

endif;


if ( ! class_exists('WP_Mega_Menu_PRO_HtmlText') ) :
/**
 * Outputs a html text from widget
 */
class WP_Mega_Menu_PRO_HtmlText extends WP_Widget {

    
        public function __construct() {
            parent::__construct('wpmegamenu_pro_html_text', // Base ID
                                'AP Mega Menu : HTML Text Widget', // Name
                                 array('description' => __('A widget to show html text content.', APMM_TD)));
        }

/**
     * Front-end display of widget.
     * @see WP_Widget::widget()
     * @param array   $args     Widget arguments.
     * @param array   $instance Saved values from database.
     */
   public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
         $content =(isset($instance['content']) && $instance['content'] != '')?$instance['content']:'';
         $text = apply_filters( 'widget_text',$content, $instance, $this );
       ?>
          
         <div class="textwidget"><?php echo $text; ?></div>
       <?php 
        echo $args['after_widget'];
    }

    /**
     * Sanitize widget form values as they are saved.
     * @see WP_Widget::update()
     * @param array   $new_instance Values just sent to be saved.
     * @param array   $old_instance Previously saved values from database.
     * @return array Updated safe values to be saved.
     */

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $allowed_tags = wp_kses_allowed_html('post');
    $allowed_tags['iframe'] = array(
        'src' => 1,
        'width' => 1,
        'height' => 1,
        'frameborder' => 1,
        'style' => 1,
        'allowfullscreen' => 1
        );
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['content'] =  wp_kses(stripslashes_deep($new_instance['content']), $allowed_tags);
    return $instance;
}


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

            $title           = isset($instance[ 'title' ])?$instance[ 'title' ]:'';
            $content   = isset($instance[ 'content' ])?$instance[ 'content' ]:'';
        ?>
       <p>  
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,APMM_TD); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
      </p>
          
        <p>
              <label for="<?php echo $this->get_field_id('content');?>"><?php _e('Content',APMM_TD)?></label>
             <textarea rows="16" cols="20" class="widefat text wp-editor-area" style="height: 200px" id="<?php echo $this->get_field_id( 'content' ); ?>"
             name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo esc_attr( $content ); ?></textarea>
         </p>
        <?php 
    }
}

endif;



      