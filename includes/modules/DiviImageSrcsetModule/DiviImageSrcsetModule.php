<?php
namespace WPT_ImageSrcset_Divi_Modules\DiviImageSrcsetModule;

use ET_Builder_Module;
use ET_Builder_Element;

/**
 * DiviImageSrcsetModule.
 */
class DiviImageSrcsetModule extends ET_Builder_Module
{
    public $main_css_element = '%%order_class%% figure';

    public $name = 'Responsive Image';

    public $slug = 'et_pb_wptools_image';

    public $vb_support = 'on';

    protected $container;

    protected $module_credits = [
        'module_uri' => 'https://wptools.app',
        'author'     => 'WP Tools',
        'author_uri' => 'https://wptools.app',
    ];

    /**
     * Constructor.
     */
    public function __construct($container)
    {
        $this->container = $container;
        parent::__construct();
    }

    /**
     * Advanced fields
     *
     * @return [type] [description]
     */
    public function get_advanced_fields_config()
    {
        return [
            // 'border'                => false,
            'borders'      => [
                'default' => [
                    'css' => [
                        'main' => [
                            'border_styles' => "{$this->main_css_element} img",
                        ],
                    ],
                ],
            ],
            'text'         => false,
            'box_shadow'   => [
                'default' => [
                    'css' => [
                        'main' => "{$this->main_css_element} img",
                    ],
                ],
            ],
            'filters'      => [
                'css' => [
                    'main' => '%%order_class%% img',
                ],
            ],
            'animation'    => false,
            'text_shadow'  => false,
            'max_width'    => [
                'css' => [
                    'module_alignment' => "{$this->main_css_element} figure",
                ],
            ],
            // 'margin_padding'        => false,
            // 'custom_margin_padding' => false,
            'background'   => false,
            'fonts'        => [
                'caption' => [
                    'css'   => [
                        'main' => "{$this->main_css_element} figcaption",
                    ],
                    'label' => esc_html__('Caption', $this->container['slug']),
                ],
            ],
            'link_options' => false,
        ];
    }

    /**
     * Custom css fields.
     *
     * @return [type] [description]
     */
    public function get_custom_css_fields_config()
    {
        return [
            'figure'      => [
                'label'    => esc_html__('Figure Tag', $this->container['slug']),
                'selector' => '%%order_class%% figure',
            ],
            'image'       => [
                'label'    => esc_html__('Image Tag', $this->container['slug']),
                'selector' => '%%order_class%% img',
            ],
            'image_hover' => [
                'label'    => esc_html__('Image Tag (Hover)', $this->container['slug']),
                'selector' => '%%order_class%% img:hover',
            ],
            'figcaption'  => [
                'label'    => esc_html__('Fig Caption Tag', $this->container['slug']),
                'selector' => '%%order_class%% figcaption',
            ],
        ];
    }

    /**
     * Divi module field default values
     */
    public function get_field_defaults()
    {
        return [
            'src'                               => '',
            'alt'                               => '',
            'show_caption'                      => 'off',
            'caption'                           => '',
            'responsive_width_default'          => '100vw',
            'responsive_width_large_desktop'    => '',
            'responsive_width_desktop'          => '',
            'responsive_width_tablet_landscape' => '',
            'responsive_width_tablet_portrait'  => '',
            'responsive_width_phone_landscape'  => '',
            'responsive_width_phone_portrait'   => '',
        ];
    }

    /**
     * Divi module fields.
     *
     * @return [type] [description]
     */
    public function get_fields()
    {
        return [
            'src'                               => [
                'label'              => esc_html__('Image', 'et_builder'),
                'type'               => 'upload',
                'option_category'    => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'et_builder'),
                'choose_text'        => esc_attr__('Choose an Image', 'et_builder'),
                'update_text'        => esc_attr__('Set As Image', 'et_builder'),
                'hide_metadata'      => true,
                'description'        => esc_html__('Upload your desired image, or type in the URL to the image you would like to display.', 'et_builder'),
                'toggle_slug'        => 'main_content',
                'dynamic_content'    => 'image',
            ],
            'alt'                               => [
                'label'           => esc_html__('Image Alternative Text', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('This defines the HTML ALT text. A short description of your image can be placed here. Leave blank to get alt text from database', 'et_builder'),
                'toggle_slug'     => 'main_content',
            ],
            'show_caption'                      => [
                'label'            => esc_html__('Show Caption', 'et_builder'),
                'type'             => 'yes_no_button',
                'option_category'  => 'layout',
                'options'          => [
                    'off' => esc_html__('No', 'et_builder'),
                    'on'  => esc_html__('Yes', 'et_builder'),
                ],
                'default_on_front' => 'off',
                'toggle_slug'      => 'main_content',
                'affects'          => [
                    'caption',
                ],
            ],
            'caption'                           => [
                'label'           => esc_html__('Image Caption', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'show_if'         => [
                    'show_caption' => 'on',
                ],
                'description'     => esc_html__('This defines the figcaption text. Leave blank to read   caption from database.', 'et_builder'),
                'toggle_slug'     => 'main_content',
            ],

            'responsive_width_default'          => [
                'label'           => esc_html__('Default', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Image representing this size will be loaded on the browser if there is no match in the breakpoint width size', 'et_builder'),
                'toggle_slug'     => 'responsive_widths',
                'default'         => '100vw',
            ],

            'responsive_width_large_desktop'    => [
                'label'           => esc_html__('Large screens (1405px upwards)', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Devices with min width 1405px. Optional field. An empty value ignores this breakpoint size.', 'et_builder'),
                'toggle_slug'     => 'responsive_widths',
            ],

            'responsive_width_desktop'          => [
                'label'           => esc_html__('Laptops and desktops (1100-1405px)', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Devices with width between 1100px - 1405px. Optional field. An empty value ignores this breakpoint size.', 'et_builder'),
                'toggle_slug'     => 'responsive_widths',
            ],

            'responsive_width_tablet_landscape' => [
                'label'           => esc_html__('Tablets in landscape mode (981-1100px)', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Devices with width between 981px - 1100px. Optional field. An empty value ignores this breakpoint size.', 'et_builder'),
                'toggle_slug'     => 'responsive_widths',
            ],

            'responsive_width_tablet_portrait'  => [
                'label'           => esc_html__('Tablets in portrait mode (768-980px)', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Devices with width between 768px - 980px. Optional field. An empty value ignores this breakpoint size.', 'et_builder'),
                'toggle_slug'     => 'responsive_widths',
            ],

            'responsive_width_phone_landscape'  => [
                'label'           => esc_html__('Smart phones in landscape mode (480-768px)', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Devices with width between 480px - 768px. Optional field. An empty value ignores this breakpoint size.', 'et_builder'),
                'toggle_slug'     => 'responsive_widths',
            ],

            'responsive_width_phone_portrait'   => [
                'label'           => esc_html__('Smart phones in portrait mode (0-479px)', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Devices with width between 0 - 479px. Optional field. An empty value ignores this breakpoint size.', 'et_builder'),
                'toggle_slug'     => 'responsive_widths',
            ],

            'admin_label'                       => [
                'label'       => __('Admin Label', 'et_builder'),
                'type'        => 'text',
                'description' => 'This will change the label of the module in the builder for easy identification.',
            ],
        ];
    }

    /**
     * Settings modal toggle
     *
     * @return [type] [description]
     */
    public function get_settings_modal_toggles()
    {
        return [
            'general' => [
                'toggles' => [
                    'main_content'      => esc_html__('Image', 'et_builder'),
                    'responsive_widths' => esc_html__('Responsive Image Widths', 'et_builder'),
                ],
            ],
        ];
    }

    /**
     * Init
     *
     * @return [type] [description]
     */
    public function init()
    {
    }

    /**
     * Render function
     *
     * @param  [type] $unprocessed_props [description]
     * @param  [type] $content           [description]
     * @param  [type] $render_slug       [description]
     * @return [type] [description]
     */
    public function render($unprocessed_props, $content = null, $render_slug)
    {
        $module_classes = $this->module_classname($render_slug);
        $module_class   = trim(ET_Builder_Element::add_module_order_class('', $render_slug));

        $defaults = $this->get_field_defaults();

        $props = wp_parse_args($unprocessed_props, $defaults);

        if (!$props['src']) {
            return '';
        }

        $attachment_id = $this->container['attachment']->get_id_by_url($props['src']);

        if ($attachment_id) {
            if (!$props['alt']) {
                $props['alt'] = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
            }

            $img_srcset = wp_get_attachment_image_srcset($attachment_id, 'full');

            $sizes = $this->container['attachment']->get_image_srcset_sizes($props);

            if (($props['show_caption'] == 'on') && !$props['caption']) {
                $image            = get_post($attachment_id);
                $props['caption'] = $image->post_excerpt;
            }
        }

        // inline css

        ET_Builder_Element::set_style($render_slug, [
            'selector'    => "div." . $module_class,
            'declaration' => 'max-width:100% !important',
        ]);

        if (isset($props['module_alignment'])) {
            switch ($props['module_alignment']) {
                case 'right':
                    ET_Builder_Element::set_style($render_slug, [
                        'selector'    => "figure." . $module_class,
                        'declaration' => 'float:right !important;',
                    ]);
                    break;

                case 'left':
                    ET_Builder_Element::set_style($render_slug, [
                        'selector'    => "figure." . $module_class,
                        'declaration' => 'float:left !important;',
                    ]);
                    break;

                case 'center':
                    ET_Builder_Element::set_style($render_slug, [
                        'selector'    => "figure." . $module_class,
                        'declaration' => 'float:none !important; margin: 0 auto !important;',
                    ]);
                    break;

                default:
                    # code...
                    break;
            }
        }
        // inline css

        ob_start();
        require $this->container['dir'] . '/resources/views/divi-image-srcset-module.php';
        return ob_get_clean();
    }
}
