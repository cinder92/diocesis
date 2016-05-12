<div class="featured-blocks clearfix">
	<div class="owl-carousel">
	<?php 
    	$noticias = getNoticias();
    	$contador = 1;
    	foreach($noticias as $noticia){
    		if($contador > 3){
    		?>
				<div class="large-4 medium-4 columns featured-block item img-thumbnail">
					<a href="<?= $noticia['link'] ?>" style="background-image:url('<?= $noticia['image'] ?>')">
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