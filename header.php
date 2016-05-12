<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--roboto font -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500italic,700italic,900italic' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
<script type="text/javascript">	
	//set ajax url
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
</head>

<body <?php body_class(); ?>>

<div class="large-12 columns barra-top">
	<div class="row">
		<div class="large-6 columns">
			<nav class="top-menus">
	        	<ul><li><a href="https://www.facebook.com/" target="_blank"><i class="icon ion-social-facebook"></i></a></li><li><a href="https://twitter.com/" target="_blank"><i class="icon ion-social-twitter"></i></a></li><li><a href="https://www.google.co.in/" target="_blank"><i class="icon ion-social-googleplus"></i></a></li><li><a href="http://youtube.com/" target="_blank"><i class="icon ion-social-youtube"></i></a></li><li><a href="http://instagram.com/" target="_blank"><i class="icon ion-social-instagram"></i></a></li><li><a href="http://vimeo.com/" target="_blank"><i class="icon ion-social-vimeo"></i></a></li><li><a href="http://imithemes.com/preview/native-church-wp/feed/" target="_blank"><i class="icon ion-social-rss"></i></a></li></ul>
	      	</nav>
	      	<div class="clearfix"></div>
		</div>
		<div class="large-6 columns">&nbsp;</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="large-12 columns" id="header">
	<div class="row">
		<div class="large-4 medium-4 small-6 columns" id="branding">
			<h1>
				<a href="<?= site_url() ?>">
					<img src="<?= get_template_directory_uri() ?>/img/diocesis-piedras-negras.png" alt="Mi Diocesis" class="branding">
				</a>
			</h1>
		</div>
		<div class="large-4 medium-4 small-4 columns">&nbsp;</div>
		<div class="large-4 medium-4 small-6 columns hidden-for-small-only">
			<div class="top-search">
	           <form method="get" id="searchform" action="<?= site_url() ?>">
		     	   <div class="row collapse">
		     	   		<div class="small-2 columns">
				          <button type="submit" class="postfix"><i class="icon ion-search"></i></button>
				        </div>
				        <div class="small-10 columns">
				          <input type="text" placeholder="Buscar ..." name="s" id="s" style="margin:0;border-top-right-radius: 4px;
    border-top-right-radius: 4px;" />
				        </div>
				      </div>
  	          </form>
              </div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="row">
		<div class="menu-container">
        	
			<?php wp_nav_menu( array('menu' => 'menu') ); ?>
			
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>

<?php if(is_home() || is_front_page()){ ?>

<div class="large-12 columns" id="slider">
	<div class="flexslider slider" style="background-image:url('<?= get_template_directory_uri() ?>/img/noticias-bg.jpg')">
	  <ul class="slides">
	    <?php 
	    	$noticias = getNoticias();
	    	$contador = 1;
	    	foreach($noticias as $noticia){
	    		if($contador <= 3){
	    		?>
					<li>
	    				<p class="flex-caption">
							<a href="<?= $noticia['link'] ?>">
								<?= $noticia['titulo'] ?>
							</a>
							<a href="<?= $noticia['link'] ?>" class="btn">
								Ver noticia
							</a>
	    				</p>
	    			</li>
	    		<?php
	    		}
	    		$contador++;
	    	}
	    ?>
	  </ul>
	</div>
</div>

<?php }else{ ?>
	
<div class="nav-backed-header parallax" style="background-image:url();">
    <div class="row">
        <div class="large-12 columns" style="padding:0;">
            <?php custom_breadcrumbs(); ?>
        </div>
    </div>
</div>

<?php } ?>