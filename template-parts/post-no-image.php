<div class="large-12 columns">
	<div class="page-content">
        <?php if(strlen(strip_tags(get_the_content())) > 0){ ?>
        <p><?= substr(strip_tags(get_the_content()),0,425) ?> ...</p>
        <?php } ?>
    </div>
    <p>
        <a href="<?= get_the_permalink() ?>" class="btn btn-primary">Continuar leyendo  <i class="icon ion-chevron-right"></i>
        </a>
    </p>
</div>