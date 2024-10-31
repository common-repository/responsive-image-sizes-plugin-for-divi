<?php
namespace WPT\DiviImageModule\Divi;

use WPT_ImageSrcset_Divi_Modules\DiviImageSrcsetExtension;
use WPT_ImageSrcset_Divi_Modules\DiviImageSrcsetModule\DiviImageSrcsetModule;
use WPT_ImageSrcset_Divi_Modules\FullwidthDiviImageSrcsetModule\FullwidthDiviImageSrcsetModule;

/**
 * Divi.
 */
class Divi
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
     * Register divi extension
     *
     * @return [type] [description]
     */
    public function divi_extensions_init()
    {
        new DiviImageSrcsetExtension($this->container);
    }

    /**
     * ET builder ready hook
     *
     * @return [type] [description]
     */
    public function et_builder_ready()
    {
        new DiviImageSrcsetModule($this->container);
        new FullwidthDiviImageSrcsetModule($this->container);
    }
}
