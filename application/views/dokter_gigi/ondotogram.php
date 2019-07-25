                    <?php 
                        $gigi = array_fill(1, 53, 'gigi_normal');
                        foreach($cekGigi as $rowGigi):
                            $gigi[$rowGigi->id_gigi] = $rowGigi->kode_ICD_10;
                        endforeach;
                         $i=1; foreach($gigiAll as $gs):?>
                            <?php if($i <= 16):?>
                                <?php if($i == 1): ?>
                                <div class="form-inline">
                                    <div class="row">
                                <?php endif; ?>
                                 <div class="col-sm-0.5">
                                 <label><?=$gs->nomor_gigi?></label>
                                    <img id="tesModal" data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                </div>
                                <?php if($i == 16): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                             <?php elseif($i <= 26):?>
                                <?php if($i == 17): ?>
                                <div class="form-inline">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="row">
                                <?php endif; ?>
                                 <div class="col-sm-0.5">
                                 <br>
                                 <label><?=$gs->nomor_gigi?></label>
                                    <img data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                </div>
                                <?php if($i == 26): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                             <?php elseif($i <= 36):?>
                                <?php if($i == 27): ?>
                                <div class="form-inline">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="row">
                                <?php endif; ?>

                                 <div class="col-sm-0.5">
                                 <br>
                                    <img data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                    <label><?=$gs->nomor_gigi?></label>
                                </div>
                                <?php if($i == 36): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                             <?php elseif($i <= 52):?>
                                <?php if($i == 37): ?>
                                <div class="form-inline">
                                    <div class="row">
                                <?php endif; ?>
                                 <div class="col-sm-0.5">
                                 <br>
                                    <img data-toggle="modal" data-gigi-id="<?=$i?>" data-target="#myModal" src="<?=base_url()?>assets/gambar_gigi/<?=$gigi[$i]?>.PNG" style="width: 60px;cursor:pointer">
                                    <label><?=$gs->nomor_gigi?></label>
                                </div>
                                <?php if($i == 52): ?> 
                                    </div>
                                </div>
                                <?php endif;?>
                            <?php endif; ?>
                        <?php $i++; endforeach;?>