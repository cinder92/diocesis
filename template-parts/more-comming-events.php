<!-- Events Listing -->
<div class="listing events-listing">
    <header class="listing-header">
        <div class="large-6 medium-6 small-12 columns" style="padding:0">
            <h3>Próximos eventos</h3>
        </div>
        <div class="large-6 medium-6 small-12 columns" style="padding:0">
            <select id="eventsMonths">
                <?php
                    $meses = array(
                        '01' => 'Enero',
                        '02' => 'Febrero',
                        '03' => 'Marzo',
                        '04' => 'Abril',
                        '05' => 'Mayo',
                        '06' => 'Junio',
                        '07' => 'Julio',
                        '08' => 'Agosto',
                        '09' => 'Septiembre',
                        '10' => 'Octubre',
                        '11' => 'Noviembre',
                        '12' => 'Diciembre'
                    );

                    $currentMonth = date('m');
                    
                    foreach($meses as $num => $let){
                        if($num >= $currentMonth){
                            ?>
                            <option value="<?= $num ?>">
                                <?= $let ?> | <?= date('Y') ?>
                            </option>
                            <?php
                       }
                    }
                ?>
            </select>
        </div>
        <div class="clearfix"></div>                 
    </header>
    <section class="listing-cont">
        <div id="spinnerEvent" class="hide">
            <?php get_template_part('template-parts/spinner') ?>
        </div>
        <ul id="eventsList">
        <?php
            $eventos = getEvents();
            foreach($eventos as $evento){
                ?>
                    <li class="item event-item">
                        <div class="event-date"> <span class="date"><?= $evento['dianum'] ?></span> <span class="month"><?= $evento['mes'] ?></span> </div>
                        <div class="event-detail">
                            <h4><a href="<?= $evento['link'] ?>"><?= $evento['title'] ?></a></h4>
                            <span class="event-dayntime meta-data"><?= $evento['dia'] ?> | <?= $evento['hora'] ?></span> 
                        </div>
                        <div class="to-event-url" style="height: 54px;">
                            <div><a href="<?= $evento['link'] ?>" class="btn btn-default btn-sm">Detalles</a></div>
                        </div>
                    </li>
                <?php
            }
        ?>                            
        </ul>
    </section>
</div>