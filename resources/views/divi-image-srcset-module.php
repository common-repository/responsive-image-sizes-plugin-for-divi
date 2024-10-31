<figure class='<?php echo $module_classes; ?>' id="<?php echo $this->module_id(false); ?>">
    <?php if ($attachment_id) : ?>
        <img src="<?php echo $props['src']; ?>" alt="<?php echo $props['alt']; ?>" srcset='<?php echo $img_srcset; ?>' sizes='<?php echo $sizes; ?>'/>
    <?php else : ?>
        <img src="<?php echo $props['src']; ?>" alt="<?php echo $props['alt']; ?>"/>
    <?php endif;?>
<?php if ($props['show_caption'] == 'on') : ?>
        <figcaption>
            <?php echo $props['caption']; ?>
        </figcaption>
<?php endif?>
</figure>
