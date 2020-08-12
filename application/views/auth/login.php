
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <?= form_open(base_url('auth'));  ?>
            <div class="nk-form">
                <h4 class="mb-1 text-uppercase">SURVEY KEJIWAAN</h4>
                <h6 class="mb-2">Silahkan Autentikasi diri anda !</h6>
                <?= $this->session->flashdata('message');  ?>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" name="mail" class="form-control" value="<?= set_value('mail');  ?>" placeholder="Your email">
                    </div>
                     <?= form_error('mail','<small class=\'text-danger pull-left\'>','</small>');  ?>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                     <?= form_error('password','<small class=\'text-danger pull-left\'>','</small>');  ?>
                </div>
                <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
            </div>
            <?= form_close();  ?>
            <div class="nk-navigation nk-lg-ic">
                <a href="<?= base_url('auth/registrasi');  ?> "  data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
                <a href="<?= base_url('auth/forgot')  ?>" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
        </div>
    <!-- Login Register area End-->
    