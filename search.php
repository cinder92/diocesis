<?php get_header(); ?>
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="row">
					<h1>
						<?php printf( esc_html__( 'Resultados de: %s', 'midiocesis' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				</div>
			</header>

			<div class="content">
			
				<div class="row">
					<div class="large-9 medium-12 columns post-list">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/post' );

					endwhile;

					wpbeginner_numeric_posts_nav();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
					</div>
					<div class="large-3 medium-12 columns">&nbsp;</div>

				</div>

			</div>

<?php get_footer();
