 <!--Mobile Menu start -->
 <div class="mobile-menu-area">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="mobile-menu">
                     <nav id="dropdown">
                         <ul class="mobile-menu-nav">
                            <?php
                            $a = $this->menu->showMenu();
                            foreach ($a as $men) :
                            ?>
                             <li>
                                <?php if($men['menu'] === "Home"): ?>
                                 <a data-toggle="collapse" data-target="#<?php echo $men['kode_menu'] ?>" href="<?= base_url('admin') ?>">
                                     <i class="<?= $men['icon']  ?>"></i> <?= $men['menu'] ?>
                                 </a>
                                <?php elseif($men['menu'] === "User"): ?>
                                 <a data-toggle="collapse" data-target="#<?php echo $men['kode_menu'] ?>" href="<?= base_url('admin/user') ?>">
                                     <i class="<?= $men['icon']  ?>"></i> <?= $men['menu'] ?>
                                 </a>
                                <?php else: ?>
                                 <a data-toggle="collapse" data-target="#<?php echo $men['kode_menu'] ?>" href="#<?php echo $men['kode_menu'] ?>">
                                     <i class="<?= $men['icon']  ?>"></i> <?= $men['menu'] ?>
                                 </a>
                                <?php endif; ?>
                                 <ul id="<?php echo $men['kode_menu'] ?>" class="collapse dropdown-header-top">
                                 <?php
                                    // $a = $this->menu->showMenu();
                                    // foreach ($a as $men) :
                                    $r = $men['kode_menu'];

                                    $data = $this->menu->getSubmenu($r);
                                    foreach ($data as $sub) :
                                            
                                 ?>
                                     <li><a href="<?= base_url('' . $sub['url']);  ?>"><?= $sub['title'] ?></a></li>
                                 <?php 
                                    endforeach;
                                 ?>
                             </ul>
                         </li>
                        <?php  
                        endforeach;
                        ?>
                         </ul>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Mobile Menu end -->


 <!-- Main Menu area start-->
 <div class="main-menu-area mg-tb-40">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                     <?php
                        //$active = $ma;
                        $ab = $this->menu->showMenu();
                        foreach ($ab as $mena) :
                            ?>
                         <?php
                            if ($title == $mena['menu']) {
                                ?>
                             <li class="active">
                             <?php
                            } else {
                                ?>
                             <li class="">
                             <?php
                            }
                            ?>
                             <?php if ($mena['menu'] === "Home") : ?>
                                 <a href="<?= base_url('admin') ?>" style="cursor: pointer;"><i class="<?= $mena['icon']  ?>"></i> <?= $mena['menu']  ?></a>
                             <?php elseif ($mena['menu'] === "User") : ?>
                                 <a href="<?= base_url('admin/user') ?>" style="cursor: pointer;"><i class="<?= $mena['icon']  ?>"></i> <?= $mena['menu']  ?></a>
                             <?php else : ?>
                                 <a data-toggle="tab" href="#<?= $mena['kode_menu'] ?>1" style="cursor: pointer;"><i class="<?= $mena['icon']  ?>"></i> <?= $mena['menu']  ?></a>
                             <?php endif; ?>
                         </li>
                     <?php
                    endforeach;
                    ?>
                 </ul>
                 <div class="tab-content custom-menu-content">
                     <?php
                        $ac = $this->menu->showMenu();
                        foreach ($ac as $meni) :
                            $q = $meni['kode_menu'];
                            //echo $q;
                            ?>
                         <?php if ($title == $meni['menu']) : ?>
                             <div id="<?= $meni['kode_menu'] ?>" class="tab-pane active notika-tab-menu-bg animated flipInX">
                             <?php else : ?>
                                 <div id="<?= $meni['kode_menu'] ?>1" class="tab-pane notika-tab-menu-bg animated flipInX">
                                 <?php endif; ?>
                                 <ul class="notika-main-menu-dropdown">
                                     <?php
                                        $datasub2 = $this->menu->getSubmenu($q);
                                        foreach ($datasub2 as $sub1) :
                                            ?>
                                         <li><a href="<?= base_url('' . $sub1['url']);  ?>"><?= $sub1['title'] ?></a></li>
                                     <?php endforeach; ?>
                                 </ul>
                             </div>
                         <?php
                        endforeach;
                        ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Main Menu area End-->