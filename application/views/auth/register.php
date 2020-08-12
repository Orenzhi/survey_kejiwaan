
<!-- Register -->
        <div class="nk-block toggled" id="l-register">
        	<?= form_open(base_url('auth/registrasi'));  ?>
            <div class="nk-form">
                <h4 class="mb-2">Membuat akun !</h4>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" placeholder="Username">
                    </div>
                    <?= form_error('nama','<small class=\'text-danger pull-left\'>','</small>');  ?>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input type="text" name="mail" class="form-control" value="<?= set_value('mail'); ?>" placeholder="Email Address">
                    </div>
                    <?= form_error('mail','<small class=\'text-danger pull-left\'>','</small>');  ?>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="password1" class="form-control" placeholder="Password">
                    </div>
                    <?= form_error('password1','<small class=\'text-danger pull-left\'>','</small>');  ?>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="password2" class="form-control" placeholder="Repeated Password">
                    </div>
                    <?= form_error('password2','<small class=\'text-danger pull-left\'>','</small>');  ?>
                </div>

                <!-- <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a> -->
                <button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></button>
            </div>
            <div class="nk-navigation rg-ic-stl">
                <a href="<?= base_url(''); ?>" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
                <a href="forgot"  data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
            <?= form_close();  ?>
        </div>
