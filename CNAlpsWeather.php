<?php

/**
 * Plugin Name: cnalpsWeather
 */

class CNAlpsWeather extends WP_Widget
{
    public $pluginName;

    public function __construct()
    {
        parent::__construct(
            'cnalps-weather',
            __('cnalps weather', 'text_domain'),
            array(
                'customize_selective_refresh' => true,
            )
        );
        add_action('wp_footer', array($this, 'enqueueAssets'));
    }

    public function enqueueAssets()
    {
        wp_register_script('cnalps-weather', plugins_url('callApi.js', __FILE__));
        wp_enqueue_script('cnalps-weather');
    }

    // The widget form (for the backend )
    public function form($instance)
    {

        // Set widget defaults
        $defaults = array(
            'city'    => '',
            'country'     => '',
        );

        // Parse current settings with defaults
        extract(wp_parse_args((array) $instance, $defaults)); ?>

        <?php // Text Field 
        ?>
        <p>
            <label for="<?= esc_attr($this->get_field_id('city')); ?>"><?php _e('Which city do you want to see the weather:', 'text_domain'); ?></label>
            <input class="widefat" id="<?= esc_attr($this->get_field_id('city')); ?>" name="<?= esc_attr($this->get_field_name('city')); ?>" type="text" value="<?= esc_attr($city); ?>" />
        </p>

        <?php // Text Field 
        ?>
        <p>
            <label for="<?= esc_attr($this->get_field_id('country')); ?>"><?php _e('Which country do you want to see the weather:', 'text_domain'); ?></label>
            <input class="widefat" id="<?= esc_attr($this->get_field_id('country')); ?>" name="<?= esc_attr($this->get_field_name('country')); ?>" type="text" value="<?= esc_attr($country); ?>" />
        </p>

<?php }


    // Update widget settings
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['city']     = isset($new_instance['city']) ? wp_strip_all_tags($new_instance['city']) : '';
        $instance['country']     = isset($new_instance['country']) ? wp_strip_all_tags($new_instance['country']) : '';
        return $instance;
    }

    // Display the widget
    public function widget($args, $instance)
    {
        extract($args);

        // Check the widget options
        $city     = isset($instance['city']) ? $instance['city'] : 'Paris';
        $country     = isset($instance['country']) ? $instance['country'] : 'France';

        // WordPress core before_widget hook (always include )
        echo $before_widget;
        echo "<p id='city'>$city</p>";
        echo "<p id='country'>$country</p>";
        

        // WordPress core after_widget hook (always include )
        echo $after_widget;
    }
}

// Register the widget
function my_register_custom_widget()
{
    register_widget('CNAlpsWeather');
}
add_action('widgets_init', 'my_register_custom_widget');
