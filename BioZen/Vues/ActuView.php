<?php
class ActuView
{
    public function actuRender($actu)
    { 
?>
        <div class="actuContainer" >
            <h2>Suivez notre actualité</h2>
            <?php foreach ($actu as $key => $val) {
              
            ?>
                <div class="actu">
                    <div class="actuTitre" >
                        <h4><?php echo $val['titre_actu'] ?></h4>
                        <p class="date"><?php echo date("d-m-Y", strtotime($val['date_actu'])) ?></p>
                    </div>
                    <?php if ($val['photo_actu'] != "") { ?>
                        <div class="actuPhoto "><img class="imgActu" src="<?php echo $val['photo_actu'] ?>" /></div>
                    <?php } ?>
                    <?php if ($val['video_actu'] != "") { ?>
                        <div class="actuVideo ">
                            <video width="600" controls>
                                <source src='<?php echo $val['video_actu'] ?>' type="video/mp4">
                                <source src='<?php echo $val['video_actu'] ?>' type="video/webm" />
                                <source src='<?php echo $val['video_actu'] ?>' type="video/ogg" />
                                <source src='<?php echo $val['video_actu'] ?>' type="video/mpeg">
                                <source src='<?php echo $val['video_actu'] ?>' type="video/quicktime">
                                <source src='<?php echo $val['video_actu'] ?>' type="video/msvideo">
                                <embed src='<?php echo $val['video_actu'] ?>' type="video/x-msvideo">
                                <source src='<?php echo $val['video_actu'] ?>' type="video/x-sgi-movie">
                            </video>
                        </div>
                    <?php } ?>
                    <div class="textActu" >
                        <p><?php echo $val['contenu_actu'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
<?php
    }
}