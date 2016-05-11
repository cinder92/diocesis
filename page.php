<?php get_header(); ?>

	<header class="page-header">
		<div class="row">
			<h1><?= get_the_title() ?></h1>
		</div>
	</header>

	<div class="content">

		<div class="row">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

		</div>

	</div>

<?php get_footer();