<!-- Exclusive Collection -->
<div class="video-container">
    <div class="container-fluid">
        <div class="row mgl-15">
            <?php 
                $i = 1; 
                foreach ($community as $community): 
                if($i%2 == 0):
            ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video-content-right">
                <h2 class="text-uppercase"><?= $community->title ?></h2>
                <p class="text-justify"><?= $community->discription ?></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 exclusive">
                <iframe src="https://www.youtube.com/embed/<?= $community->video_code ?>?rel=0"></iframe>
            </div>
            <div class="clearfix"></div>
            <?php else: ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 exclusive">
                <iframe src="https://www.youtube.com/embed/<?= $community->video_code ?>?rel=0"></iframe>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video-content-right">
                <h2 class="text-uppercase"><?= $community->title ?></h2>
                <p class="text-justify"><?= $community->discription ?></p>
            </div>
            <div class="clearfix"></div>
            <?php endif; $i++; endforeach; ?>
        </div>
    </div>
</div>