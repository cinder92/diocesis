<?php $details = getEventDetails(get_the_ID());?>

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
