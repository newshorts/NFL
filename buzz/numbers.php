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
        <span id="totalBG" class="largNumbersGrey">8,888,888</span>
        <span id="total" class="largeNumbersOrange"></span>
    </li>
    <li id="box2" class="bottom bgTextureLight">
        <a href="<?php echo ROOT; ?>tweets/" class="ajaxify">
            <span class="headlineSmallGray smallBoxHeading">TWEETS</span>
            <img class="smallBoxIcon" src="../images/icon_twitter.png">
            <hr class="smallBoxHR" />
            <span id="twitter_countBG" class="smallNumbersGrey countGrey">8,888,888</span>
            <span id="twitter_count" class="smallNumbersOrange countOrange"></span>
        </a>
    </li>
    <li id="box3" class="bottom bgTextureLight">
        <a href="<?php echo ROOT; ?>instagram/" class="ajaxify">
            <span class="headlineSmallGray smallBoxHeading">PHOTOS</span>
            <img class="smallBoxIcon" src="../images/icon_instagram.png">
            <hr class="smallBoxHR" />
            <span id="instagram_photo_countBG" class="smallNumbersGrey countGrey">8,888,888</span>
            <span id="instagram_photo_count" class="smallNumbersOrange countOrange"></span>
        </a>
    </li>
    <li id="box4" class="bottom bgTextureLight">
        <a href="<?php echo ROOT; ?>supporters/" class="ajaxify">
            <span class="headlineSmallGray smallBoxHeading">SUPPORTERS</span>
            <img class="smallBoxIconLeft" src="../images/icon_facebook.png"><img class="smallBoxIcon" src="../images/icon_google.png">
            <hr class="smallBoxHR" />
            <span id="gfb_countBG" class="smallNumbersGrey countGrey">8,888,888</span>
            <span id="gfb_count" class="smallNumbersOrange countOrange"></span>
        </a>
    </li>
</ul>