<div class="widget news-events">
    <h5 class="widget-title">News/Events<span></span></h5>
    <div class="thumbnail-widget news-slider">
        <!--        <marquee direction="down" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()">-->
        <?php
        if ( $newses ) {
            foreach ( $newses as $key => $news ) {
                ?>

                <div class="text-justify">
                    <?= character_limiter( $news->news_title, 50 ); ?><br>
                    <small class="text-muted"><?= user_formated_datetime( $news->created_at ); ?></small>
                    <a href="<?= site_url( "news-details/{$news->id}" ); ?>" style='font-size:17px;text-decoration:none;color:#6CCEE7;'>Read More</a>
                    <hr>
                </div>

                <?php
            }
        }
        ?>
        <!--        </marquee>-->
    </div>
</div>