<article class="post sermon">
    <header class="post-title">
        <div class="row">
				<div class="large-12 medium-12 columns">
				<h3>
                <a href="<?= get_the_permalink() ?>">
                    <?= get_the_title() ?>
                </a>
                </h3>
                <span class="meta-data"><i class="icon ion-calendar"></i>&nbsp;<?= get_the_date() ?></span>
            </div>
     	</div>                        
    </header>
    <div class="post-content">
        <div class="row">
            
            <?php 
                
                get_template_part('template-parts/post-image');
                
           ?>
        
        </div>
    </div>
</article>