<?php
namespace WPT\DiviImageModule\WP;

/**
 * Attachment.
 */
class Attachment
{
    protected $container;

    /**
     * Constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Get attachment ID using the given url.
     *
     * @param  [type] $url            [description]
     * @return [type] [description]
     */
    public function get_id_by_url($url)
    {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url));

        return isset($attachment[0]) ? $attachment[0] : false;
    }

    /**
     * Get the responsive image srcset sizes for the given properties.
     */
    public function get_image_srcset_sizes($props)
    {
        $sizes = [];

        if ($props['responsive_width_phone_portrait']) {
            $sizes[] = sprintf('(min-width: 0) and (max-width: 479px) %s', $props['responsive_width_phone_portrait']);
        }

        if ($props['responsive_width_phone_landscape']) {
            $sizes[] = sprintf('(min-width: 480px) and (max-width: 768px) %s', $props['responsive_width_phone_landscape']);
        }

        if ($props['responsive_width_tablet_portrait']) {
            $sizes[] = sprintf('(min-width: 768px) and (max-width: 980px) %s', $props['responsive_width_tablet_portrait']);
        }

        if ($props['responsive_width_tablet_landscape']) {
            $sizes[] = sprintf('(min-width: 981px) and (max-width: 1100px) %s', $props['responsive_width_tablet_landscape']);
        }

        if ($props['responsive_width_desktop']) {
            $sizes[] = sprintf('(min-width: 1100px) and (max-width: 1405px) %s', $props['responsive_width_desktop']);
        }

        if ($props['responsive_width_large_desktop']) {
            $sizes[] = sprintf('(min-width: 1405px) %s', $props['responsive_width_large_desktop']);
        }

        if ($props['responsive_width_default']) {
            $sizes[] = sprintf('%s', $props['responsive_width_default']);
        }

        return implode(',', $sizes);

    }
}
