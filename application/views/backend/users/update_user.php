<?php $this->load->view('backend/layout/header.php'); ?>

    <main>
        <div class="row">
            <div class="col s12 m12">
                <div class="card white-grey darken-1 ">
                    <div class="card-content ">
                        <span class="card-title orange-text">Kullanıcı Düzenle</span>

                        <?php echo form_open('admin/users/update', array('id'=>'formValidate')); ?>
                        <input type="hidden" value="<?php echo $user->id ?>" name="id">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="fullName" type="text" class="validate <?php if (isset($class)) { echo $class; } ?>" name="fullName" value="<?php echo $user->fullName; ?>">
                                <label for="fullName">Kuallanıcının Adı, Soyadı</label>
                                <div class="helper-text red-text"> <?php echo form_error('fullName'); ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate <?php if (isset($class)) { echo $class; } ?>" name="email" value="<?php echo $user->email; ?>">
                                <label for="email">E-posta Adresi</label>
                                <div class="helper-text red-text"> <?php echo form_error('email'); ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="password" >
                                <label for="password">Şifresi</label>
                                <div class="helper-text red-text"> <?php echo form_error('password'); ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input  id="re_password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="re_password" >
                                <label for="re_password">Şifre Tekrarı</label>
                                <div class="helper-text red-text"> <?php echo form_error('re_password'); ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                            <label>
                                <input type="checkbox" name="isActive" value="1" <?php if($user->isActive == 1){ echo ' checked '; }?> />
                                <span>Aktif olsun!</span>
                                <div class="helper-text">Eğer bu seçeneği seçerseniz girdiğiniz kullanıcı aktif olacaktır!</div>
                            </label>
                            </div>
                        </div>

                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">


                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn primary">Kaydet</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $this->load->view('backend/layout/footer.php'); ?>
