<?php
/*
Title: Datos del evento
Post Type: eventos
Context: normal
Priority: high
Order: 1
Locked: true
New: true
Collapse: false
Meta box: true
*/

piklist('field', array(
'type' => 'datetimepicker',
'scope' => 'post_meta',
'field' => 'created_at',
'label' => 'Fecha y hora de inicio',
'options' => array(
    'format' => 'YYYY-MM-DD hh:mm',
    'pick12HourFormat' => false,
    'sideBySide' => true,
),
));

$args = array(
	'post_type' => 'ubicaciones',
	'posts_per_page' => -1
);

$query = new WP_Query($args);

if($query->have_posts()){
	$results = array();

	while($query->have_posts()) : $query->the_post();
		$registros = array();
		$registros['title'] = get_the_title();
		$registros['id'] = get_the_ID();
		array_push($results,$registros);
	endwhile;
}

foreach ($results as $value){
    $singleArray[$value['id']] = $value['title'];
}


piklist('field', array(
'type' => 'select'
,'scope' => 'post_meta' // Not used for settings sections
,'field' => 'location'
,'value' =>  get_post_meta($_REQUEST['post'], 'location', true)
,'label' => 'Ubicación'
,'description' => 'Ubicación del evento'
,'attributes' => array(
  'class' => 'text'
)
,'choices' => $singleArray
));


 ?>