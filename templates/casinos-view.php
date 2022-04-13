<div class="main-casino-section">
    <div class="container">
        <div class="casino-nav">
            <ul>
                <li class="casino">Casino</li>
                <li class="bonus">Bonus</li>
                <li class="features">Features</li>
                <li class="play">Play</li>
            </ul>
        </div>
        <?php
        foreach($data->toplists as $dt => $casinoToplists){
            if($dt==575){
                foreach($casinoToplists as $casinoToplist->position => $casinoToplist){
             ?>
        <div class="casino-information">
            <div class="casino-image">
                <img src="<?= $casinoToplist->logo ?>" alt="casino-image">
                <a href="<?= home_url().'/'.$casinoToplist->brand_id ?>">Review</a>
            </div>
            <div class="casino-bonus">
                <div class="casino-bonus-rate">
                    <p><?= $casinoToplist->info->rating ?></p><br>
                    <img src="<?php //echo plugins_url( '/casino-ardit/assets/'.$casinoToplist->info->rating.'.png')?>" alt="">
                </div>
                <div class="casino-bonus-information">
                    <p><?= $casinoToplist->info->bonus ?></p>
                </div>        
            </div>
            <div class="casino-features">
                <?php foreach($casinoToplist->info->features as $feature){
                    ?>
                    <p><?= $feature ?></p> 
               <?php }?>
                 
            </div>
            <div class="casino-play">
                <a href="<?= $casinoToplist->play_url ?>" target="_blank">PLAY NOW</a>
                <small></small>
            </div>
        </div>
        <?php 
        }            
    }   
}
?>    
    </div>
</div>