<?php get_header(); ?>
	
	<header class="page-header">
		<div class="row">
			<?php if(get_post_type() == 'eventos'){ ?>
			<div class="large-6 small-6 columns">
				<h1>Eventos</h1>
			</div>
			<div class="large-6 small-6 columns" style="text-align: right;">
				<a href="<?= site_url().'/eventos/' ?>" class="btn btn-primary btn-lg btn-block">Ver todos</a> 
			</div>
			
			<?php }else{ ?>
				<h1><?= get_the_category()[0]->cat_name; ?></h1>
			<?php } ?>
		</div>
	</header>

	<div class="content">
		<div class="row">
			<div class="large-8 medium-8 columns">
				<?php
					while ( have_posts() ) : the_post();

				?>

				<header class="single-post-header clearfix">
					<h2 class="post-title"><?= get_the_title() ?></h2>
				</header>
				<div class="post-content">
				<?php

						//validar que sea un evento
						$type = get_post_type();

						if($type == 'eventos'){
							get_template_part('template-parts/event-details');

							the_content();
						}else{
							the_content();
						}

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
				</div>
			</div>
			<div class="large-4 medium-4 columns">
				<?php if(get_post_type() == 'eventos'){
					get_template_part('template-parts/upcomming-events-widget');
				 }else{
				 	get_template_part('template-parts/more-posts');
				 }?>
			</div>
		</div>
	</div>

		

<?php get_footer();