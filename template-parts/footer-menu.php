<div class="footer-menu">
	<div class="row">
		<div class="large-4 medium-12 columns descripcion">
			<h3>Nosotros</h3>
			<a href="#">
				<img src="<?= get_template_directory_uri() ?>/img/diocesis-piedras-negras.png" alt="Mi Diocesis" class="branding" style="width:80%">
			</a>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis consectetur adipiscing elit. Nulla convallis egestas rhoncus
			</p>
		</div>
		<div class="large-8 medium-12 columns">
			<?php wp_nav_menu( array('menu' => 'footer','menu_class'=>'footer_menu','menu_id' => 'footer-menu-id') ); ?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>