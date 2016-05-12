<?php
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

        if($feat_image == ""){
            
            $feat_image = wp_get_attachment_url(get_post_meta(get_the_ID(),'gallery',false)[0]);
            if($feat_image == ""){
                $feat_image = get_template_directory_uri().'/img/default.jpg';
            }
        }
?>

<div class="large-4 columns">
    <a href="<?= get_the_permalink() ?>" class="media-box">
        <img src="<?= $feat_image ?>" class="img-thumbnail" alt="<?= get_the_title() ?>">
    </a>
</div>
<div class="large-8 columns">
	<div class="page-content">
        <?php if(strlen(strip_tags(get_the_content())) > 0){ ?>
        <p><?= substr(strip_tags(get_the_content()),0,300) ?> ...</p>
        <?php } ?>
    </div>
    <p>
        <a href="<?= get_the_permalink() ?>" class="btn btn-primary">Continuar leyendo  <i class="icon ion-chevron-right"></i>
        </a>
    </p>
</div>