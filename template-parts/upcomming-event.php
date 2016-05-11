<?php $event = getFollowingEvent() ?>
<div class="row notice-bar">
	<div class="large-3 medium-6 small-6 columns notice-bar-title"> 
		<span class="notice-bar-title-icon hidden-for-small-only">
		<i class="icon ion-calendar"></i>
		</span> 
		<span class="title-note">Siguiente</span> 
		<strong>Próximo evento</strong>
	</div>
	<div class="large-3 medium-6 small-6 columns notice-bar-event-title">
		<h5><a href="<?= $event['link'] ?>"><?= $event['titulo'] ?></a></h5>
		<span class="meta-data"><?= $event['fecha_text'] ?></span>
	</div>
	<div id="countdown"></div>
	<div id="counter" class="large-4 medium-6 small-12 columns counter" data-date="<?= $event['fecha'] ?>">
	</div>
	<div class="large-2 medium-6 small-6 columns hidden-for-small-only"> 
		<a href="<?= site_url().'/eventos/' ?>" class="btn btn-primary btn-lg btn-block">Ver todos</a> 
	</div>
</div>