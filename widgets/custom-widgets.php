<?php
class wpse97411_Widget_Recent_Posts extends WP_Widget
{

    function __construct()
    {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __("The most recent posts on your site"));
        parent::__construct('recent-posts', __('Recent Posts'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

        add_action('save_post', array($this, 'flush_widget_cache'));
        add_action('deleted_post', array($this, 'flush_widget_cache'));
        add_action('switch_theme', array($this, 'flush_widget_cache'));
    }

    function widget($args, $instance)
    {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if (!is_array($cache))
            $cache = array();

        if (!isset($args['widget_id']))
            $args['widget_id'] = $this->id;

        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

        $title = (!empty($instance['title'])) ? $instance['title'] : __('Recent Posts');
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        $number = (!empty($instance['number'])) ? absint($instance['number']) : 10;
        if (!$number)
            $number = 10;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        $r = new WP_Query(apply_filters('widget_posts_args', array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true)));
        if ($r->have_posts()) :
            ?>
        <?php echo '<div class="mdc-card mdc-card--outlined widget-card mdc-typography mdc-elevation--z24" data-aos="zoom-in-left" style="margin-bottom: 16px;">'; ?>
        <?php if ($title) echo '<h3 class="mdc-typography--subtitle1" style="margin: 16px 0 8px 0">' . $title . '</h3>'; ?>
        <ul class="mdc-list">
            <li role="seperator" class="mdc-list-divider"></li>
        </ul>
        <nav class="mdc-list">
            <?php while ($r->have_posts()) : $r->the_post(); ?>

                <a class="mdc-typography--subtitle2 mdc-list-item" style="justify-content: center" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if (get_the_title()) the_title();
                                                                                                                                                                                                                        else the_ID(); ?></a>
                <?php if ($show_date) : ?>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                <?php endif; ?>

            <?php endwhile; ?>
        </nav>
        <?php echo '</div>' ?>
        <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

    endif;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_recent_posts', $cache, 'widget');
}

function update($new_instance, $old_instance)
{
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = (int)$new_instance['number'];
    $instance['show_date'] = (bool)$new_instance['show_date'];
    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');
    if (isset($alloptions['widget_recent_entries']))
        delete_option('widget_recent_entries');

    return $instance;
}

function flush_widget_cache()
{
    wp_cache_delete('widget_recent_posts', 'widget');
}

function form($instance)
{
    $title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
    $number    = isset($instance['number']) ? absint($instance['number']) : 5;
    $show_date = isset($instance['show_date']) ? (bool)$instance['show_date'] : false;
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

    <p><input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" />
        <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date?'); ?></label></p>
<?php
}
}

class wpse97411_Widget_Categories extends WP_Widget
{

    /**
     * Sets up a new Categories widget instance.
     *
     * @since 2.8.0
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname'                   => 'widget_categories',
            'description'                 => __('A list or dropdown of categories.'),
            'customize_selective_refresh' => true,
        );
        parent::__construct('categories', __('Categories'), $widget_ops);
    }

    /**
     * Outputs the content for the current Categories widget instance.
     *
     * @since 2.8.0
     *
     * @staticvar bool $first_dropdown
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Categories widget instance.
     */
    public function widget($args, $instance)
    {
        static $first_dropdown = true;

        $title = !empty($instance['title']) ? $instance['title'] : __('Categories');

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $c = !empty($instance['count']) ? '1' : '0';
        $h = !empty($instance['hierarchical']) ? '1' : '0';
        $d = !empty($instance['dropdown']) ? '1' : '0';

        echo '<div class="mdc-card mdc-card--outlined widget-card mdc-typography mdc-elevation--z24" data-aos="zoom-in-left" style="margin-bottom: 16px;">';

        if ($title) {
            echo '<h3 class="mdc-typography--subtitle1" style="margin: 16px 0 8px 0">' . $title . '</h3>';
            echo '<ul class="mdc-list">';
            echo '<li role="seperator" class="mdc-list-divider"></li>';
            echo '</ul>';
        }

        $cat_args = array(
            'orderby'      => 'name',
            'show_count'   => $c,
            'hierarchical' => $h,
        );

        if ($d) {
            echo sprintf('<form action="%s" method="get">', esc_url(home_url()));
            $dropdown_id    = ($first_dropdown) ? 'cat' : "{$this->id_base}-dropdown-{$this->number}";
            $first_dropdown = false;

            echo '<label class="screen-reader-text" for="' . esc_attr($dropdown_id) . '">' . $title . '</label>';

            $cat_args['show_option_none'] = __('Select Category');
            $cat_args['id']               = $dropdown_id;

            /**
             * Filters the arguments for the Categories widget drop-down.
             *
             * @since 2.8.0
             * @since 4.9.0 Added the `$instance` parameter.
             *
             * @see wp_dropdown_categories()
             *
             * @param array $cat_args An array of Categories widget drop-down arguments.
             * @param array $instance Array of settings for the current widget.
             */
            wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args, $instance));

            echo '</form>';
            ?>

        <script type='text/javascript'>
            /* <![CDATA[ */
            (function() {
                var dropdown = document.getElementById("<?php echo esc_js($dropdown_id); ?>");

                function onCatChange() {
                    if (dropdown.options[dropdown.selectedIndex].value > 0) {
                        dropdown.parentNode.submit();
                    }
                }
                dropdown.onchange = onCatChange;
            })();
            /* ]]> */
        </script>

    <?php
} else {
    ?>
        <nav class="mdc-list">
            <?php
            $categories = get_categories(array(
                'orderby' => 'name',
                'order'   => 'ASC'
            ));
            foreach ($categories as $category) :
                echo '<a class="mdc-typography--subtitle2 mdc-list-item" style="justify-content: center" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';
            endforeach;
           
            ?>
        </nav>
    <?php
}

echo '</div>';
}

/**
 * Handles updating settings for the current Categories widget instance.
 *
 * @since 2.8.0
 *
 * @param array $new_instance New settings for this instance as input by the user via
 *                            WP_Widget::form().
 * @param array $old_instance Old settings for this instance.
 * @return array Updated settings to save.
 */
public function update($new_instance, $old_instance)
{
    $instance                 = $old_instance;
    $instance['title']        = sanitize_text_field($new_instance['title']);
    $instance['count']        = !empty($new_instance['count']) ? 1 : 0;
    $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
    $instance['dropdown']     = !empty($new_instance['dropdown']) ? 1 : 0;

    return $instance;
}

/**
 * Outputs the settings form for the Categories widget.
 *
 * @since 2.8.0
 *
 * @param array $instance Current settings.
 */
public function form($instance)
{
    //Defaults
    $instance     = wp_parse_args((array)$instance, array('title' => ''));
    $count        = isset($instance['count']) ? (bool)$instance['count'] : false;
    $hierarchical = isset($instance['hierarchical']) ? (bool)$instance['hierarchical'] : false;
    $dropdown     = isset($instance['dropdown']) ? (bool)$instance['dropdown'] : false;
    ?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></p>

    <p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" <?php checked($dropdown); ?> />
        <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label><br />

        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" <?php checked($count); ?> />
        <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label><br />

        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>" <?php checked($hierarchical); ?> />
        <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e('Show hierarchy'); ?></label></p>
<?php
}
}
