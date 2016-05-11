<div class="featured-blocks clearfix">
	<div class="owl-carousel">
	<?php 
    	$noticias = getNoticias();
    	$contador = 1;
    	foreach($noticias as $noticia){
    		if($contador > 3){
    		?>
				<div class="large-4 medium-4 columns featured-block item">
					<a href="<?= $noticia['link'] ?>" class="img-thumbnail">
						<img src="<?= $noticia['image'] ?>" alt="<?= $noticia['titulo'] ?>" style="opacity: 0.9;">
						<strong><?= $noticia['titulo'] ?></strong> 
						<span class="more">Ver más</span> 
					</a> 
				</div>
    		<?php
    		}
    		$contador++;
    	}
    ?>
	</div>
</div>