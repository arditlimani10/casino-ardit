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
        //checking if data variable is not null, if is null it will show a paragraph information with a message
        if($filteredData != null){
                //iterating through elements under 575 key
                foreach($filteredData as $casinoToplist){
             ?>
            <div class="casino-information">
                <div class="casino-image">
                    <a href="<?= get_bloginfo('wpurl').'/'.$casinoToplist->brand_id ?>"><img src="<?= $casinoToplist->logo ?>" alt="casino-logo">
                    <p>Review</p></a>
                </div>
                <div class="casino-bonus">
                    <div class="casino-bonus-rate">
                        <img src="<?= plugins_url( '/casino-ardit/assets/images/'.$casinoToplist->info->rating.'.png')?>" alt="rate">
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
        //if json file does not have any data, it will the show the message below 
        else{
            ?>
            <div>
                <p>There is no data on API</p>
            </div>
            <?php
        }
        ?>    
    </div>
</div>