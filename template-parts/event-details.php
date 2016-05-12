<?php
$details = getEventDetails(get_the_ID());
$feat_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

if($feat_image != ""){
    ?>	
    	<div class="img-thumbnail" style="margin:0 0 20px 0">
			<img src="<?= $feat_image ?>" alt="<?= get_the_title() ?>">
		</div>
    <?php
}
?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Detalles del evento</h3>
	</div>
	<div class="panel-body">
		<ul class="info-table">
		<li class="event-custom"><i class="icon ion-calendar"></i> <?= $details['fecha'] ?></li>
		<li class="event-custom"><i class="icon ion-clock"></i> <?= $details['hora'] ?></li>
		<li class="event-custom"><i class="icon ion-location"></i> <?= $details['ubicacion'] ?>
			<?php if($details['coords'] != ""){ ?>
			<div id="mapa" data-coords="<?= $details['coords'] ?>"></div>
			<?php } ?>
		</li>        
		</ul>
	</div>
</div>
