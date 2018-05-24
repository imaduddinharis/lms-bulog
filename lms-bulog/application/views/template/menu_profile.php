<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="profile">
              <div class="profile_pic">
                <?php 
//                  if($foto==''){
                  ?>
                  <img src="<?= $foto;?>" alt=""class="img-circle profile_img">
                  <?php
//                  }else{
                  ?>
<!--                  <img src="<?= $assets;?>images/<?=$active;?>/<?= $foto;?>" alt=""class="img-circle profile_img">-->
                  <?php
//                  }
                  ?>
              </div>
              <div class="profile_info">
                <span>Welcome, <?= $username?></span>
                <h2>Desa Sutawinangun</h2>
              </div>
            </div>
