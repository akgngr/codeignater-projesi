<?php $this->load->view('backend/layout/header.php'); ?>
<?php $user = $this->session->userdata('user'); ?>
    <main>
        <div class="row">
            <div class="col s12 m4">
                <div class="card white" style="height: 100vh;">
                    <div class="card-content center-align">
                        <img class="circle responsive-img" alt="<?php echo $user->fullName; ?>" src="https://avatars3.githubusercontent.com/u/606619?s=180&v=4" style="width: 150px;">
                        <h6><?php echo $user->fullName; ?></h6>
                        <p class="orange-text">Accoubts Manager Amix corp</p>
                        <div class="divider" style="margin-top: 20px;"></div>
                        <div class="row left-align">

                            <div class="col" style="padding-top: 20px;">
                                <small class="text-muted">E-posta Adresi:</small> <p><?php echo $user->email; ?></p>
                            </div>
                            <div class="col" style="padding-top: 20px;">
                                <small class="text-muted">Telefon :</small> <p>+905050831563</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m8">
                <div class="card white" style="height: 100vh;">
                    <div class="card-content">
                        <div class="col s12">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab col s3"><a class="active" href="#test1">Timeline</a></li>
                                <li class="tab col s3"><a  href="#test2">Profil Ayarları</a></li>
                                <li class="tab col s3"><a  href="#test3">Şifre Değişikliği</a></li>
                            </ul>
                        </div>
                        <div id="test1" class="col s12">Test 1</div>
                        <div id="test2" class="col s12">
                            <div class="row">
                                <?php echo form_open('admin/user/update', array('id'=>'formValidate')); ?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="fullName" type="text" class="validate <?php if (isset($class)) { echo $class; } ?>" name="fullName" value="<?php echo $user->fullName; ?>">
                                        <label for="fullName">Adınız, Soyadınız</label>
                                        <div class="helper-text red-text"> <?php echo form_error('fullName'); ?> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate <?php if (isset($class)) { echo $class; } ?>" name="email" value="<?php echo $user->email; ?>">
                                        <label for="email">E-posta</label>
                                        <div class="helper-text red-text"> <?php echo form_error('email'); ?> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="password" >
                                        <label for="password">Şifre</label>
                                        <div class="helper-text red-text"> <?php echo form_error('password'); ?> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input  id="re_password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="re_password" >
                                        <label for="re_password">Şifreyi Tekrarı</label>
                                        <div class="helper-text red-text"> <?php echo form_error('re_password'); ?> </div>
                                    </div>
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <button type="submit" class="btn primary">Kaydet</button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div id="test3" class="col s12">
                            <div class="row">
                                <?php echo form_open('admin/user/update', array('id'=>'formValidate')); ?>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="password" >
                                        <label for="password">Şifre</label>
                                        <div class="helper-text red-text"> <?php echo form_error('password'); ?> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input  id="re_password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="re_password" >
                                        <label for="re_password">Şifreyi Tekrarı</label>
                                        <div class="helper-text red-text"> <?php echo form_error('re_password'); ?> </div>
                                    </div>
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <button type="submit" class="btn primary">Kaydet</button>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->load->view('backend/layout/footer.php'); ?>
