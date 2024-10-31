<?php
namespace WPT_ImageSrcset_Divi_Modules\FullwidthDiviImageSrcsetModule;

use WPT_ImageSrcset_Divi_Modules\DiviImageSrcsetModule\DiviImageSrcsetModule;

/**
 * Full width divi module.
 */
class FullwidthDiviImageSrcsetModule extends DiviImageSrcsetModule
{
    public $name = 'Fullwidth Responsive Image';

    public $slug = 'et_pb_wptools_fullwidth_image';

    /**
     * Constructor
     */
    public function __construct($container)
    {
        parent::__construct($container);
    }

    /**
     * Init divi module
     */
    public function init()
    {
        $this->fullwidth = true;

    }
}
