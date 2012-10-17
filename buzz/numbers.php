<!--<ul id="screen">
    <li id="box1"><iframe name="all_count" frameborder="0" src="../apis/iframe_all.php" width="994" height="318"></iframe></li>
    <li id="box2" class="bottom"><iframe name="fb_count" frameborder="0" src="../apis/iframe_facebook.php" width="328" height="160"></iframe></li>
    <li id="box3" class="bottom"><iframe name="google_count" frameborder="0" src="../apis/iframe_google.php" width="328" height="160"></iframe></li>
    <li id="box4" class="bottom"><iframe name="total_count" frameborder="0" src="../apis/iframe_totals.php" width="328" height="160"></iframe></li>
</ul>-->



<ul id="screen">

    <li id="box1" class="bgTextureLight">
        <div class="headlineMediumGray">
            <img src="../images/buzz_sign.png"><span>SFSUPERBOWL BUZZ</span>
        </div>
<!--        <span id="totalBG" class="largNumbersGrey">
            
        </span>-->
        
        <ul class="numbers_large">
            <li class="nil">0</li>
            <li class="comma_gray">,</li>
            <li class="nil">0</li>
            <li class="nil">0</li>
            <li class="nil">0</li>
            <li class="comma_gray">,</li>
            <li class="nil">0</li>
            <li class="nil">0</li>
            <li class="nil">0</li>
        </ul>
        
        <div id="total" class="largeNumbersOrange large"></div>
    </li>
    
    <li class="train">

        <?php
        
            if(DEVICE_TYPE == 'computer') {
                include_once 'train-full.php';
            } elseif(DEVICE_TYPE == 'tablet') {
                include_once 'train-full.php';
            } elseif(DEVICE_TYPE == 'phone') {
                include_once 'train-mobile.php';
            } else {
                // we dont know what the hell you are, so include the full experience
                include_once 'train-full.php';
            }    
            
        ?>

    </li>
    
</ul>