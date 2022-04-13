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
        //iterated through object to find the 575 key
        foreach($data->toplists as $dt => $casinoToplists){
            if($dt==575){
                //iterated through elements to order them by their position value
                foreach($casinoToplists as $casinoToplist->position => $casinoToplist){
             ?>
        <div class="casino-information">
            <div class="casino-image">
                <img src="<?= $casinoToplist->logo ?>" alt="casino-image">
                <a href="<?= get_bloginfo('wpurl').'/'.$casinoToplist->brand_id ?>">Review</a>
            </div>
            <div class="casino-bonus">
                <div class="casino-bonus-rate">
                    <img src="<?= plugins_url( '/casino-ardit/assets/images/'.$casinoToplist->info->rating.'.png')?>" alt="">
                </div>
                <div class="casino-bonus-information">
                    <p><?= $casinoToplist->info->bonus ?></p>
                </div>        
            </div>
            <ul class="casino-features">
                <?php foreach($casinoToplist->info->features as $feature){
                    ?>
                    <li><?= $feature ?></li> 
               <?php }?>
                 
                </ul>
                <div class="casino-play">
                    <a class="play-now-btn" href="<?= $casinoToplist->play_url ?>" target="_blank">PLAY NOW</a>
                    <span class="terms-conditions"><?= $casinoToplist->terms_and_conditions ?></span>
            </div>
        </div>
        <?php 
        }            
    }   
}
?>    
    </div>
</div>