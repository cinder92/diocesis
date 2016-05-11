<?php get_header() ?>

	<header class="page-header">
		<div class="row">
			<h1>Eventos</h1>
		</div>
	</header>

	<div class="content">
		<div class="row">
			<div class="large-8 medium-8 columns">

			<?php get_template_part('template-parts/more-comming-events') ?>

			</div>

			<div class="large-4 medium-4 columns">
				<?php get_template_part('template-parts/upcomming-event-widget'); ?>
			</div>
		</div>
	</div>

<?php get_footer() ?>