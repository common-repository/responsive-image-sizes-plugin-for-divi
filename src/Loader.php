<?php
namespace WPT\DiviImageModule;

use Pimple\Container;

/**
 * Container
 */
class Loader extends Container
{
    /**
     *
     * @var mixed
     */
    public static $instance;

    public function __construct()
    {
        parent::__construct();

        $this['bootstrap'] = function ($container) {
            return new WP\Bootstrap($container);
        };

        $this['divi'] = function ($container) {
            return new Divi\Divi($container);
        };

        $this['attachment'] = function ($container) {
            return new WP\Attachment($container);
        };

        $this['wptools_hub'] = function ($container) {
            return new \WPTools_Hub\Menu($container);
        };

    }

    /**
     * Get container instance.
     */
    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new Loader();
        }

        return self::$instance;
    }

    /**
     * Plugin run
     */
    public function run()
    {
        // activation hook
        register_activation_hook($this['file'], [$this['bootstrap'], 'register_activation_hook']);

        //divi actions
        add_action('et_builder_ready', [$this['divi'], 'et_builder_ready'], 1);
        add_action('divi_extensions_init', [$this['divi'], 'divi_extensions_init']);

        $loader = $this;
        //admin menu
        add_action('admin_menu', function () use ($loader) {
            $loader['wptools_hub']->add_main_menu_page();

            add_submenu_page(
                'wptools',
                'Divi Responsive Image',
                'Divi Responsive Image',
                'manage_options',
                'wptools-divi-imgsrcset',
                function () use ($loader) {
                    ob_start();
                    require $loader['dir'] . '/resources/views/menu.php';
                    echo ob_get_clean();
                }
            );
        });

    }
}
