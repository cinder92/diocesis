<?php 
    $stickyid = "selected_post-2";
    if(is_front_page() || is_home()){
        $stickyid = "";
    } 
?>
<div id="<?= $stickyid ?>" class="widget sidebar-widget widget_selected_post">
<div class="sidebar-widget-title" style="border-bottom: 1px solid #eceae4;">
<h3 class="widgettitle">Destacadas</h3></div>

<ul>
	<?php 
    	$noticias = getNoticias();
    	$contador = 1;
    	foreach($noticias as $noticia){
    		if($contador <= 4){
    		?>
				<li class="clearfix"><a href="<?= $noticia['link'] ?>" class="media-box post-image"><img src="<?= $noticia['image'] ?>" class="img-thumbnail wp-post-image" alt="newhere"></a><div class="widget-blog-content"><a href="<?= $noticia['link'] ?>" class="text"><?= $noticia['titulo'] ?></a>
						<span class="meta-data"><i class="fa fa-calendar"></i> <?= $noticia['fecha'] ?></span>
						</div>
					</li>
    		<?php
    		}
    		$contador++;
    	}
    ?>
</ul>
</div>