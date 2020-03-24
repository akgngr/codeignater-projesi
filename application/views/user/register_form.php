<?php $this->load->view('user/layout/header') ?>

<div class="container">

    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="row">
                <div class="card grey lighten-5">
                    <div class="card-content blue-text">
                        <span class="card-title">Yeni Üye Kayı Formu</span>
                        <?php echo form_open('user/register/save', array('id'=>'formValidate')); ?>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="fullName" type="text" class="validate <?php if (isset($class)) { echo $class; } ?>" name="fullName" >
                                <label for="fullName">Adınız, Soyadınız</label>
                                <div class="helper-text red-text"> <?php echo form_error('fullName'); ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate <?php if (isset($class)) { echo $class; } ?>" name="email" >
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


                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn primary">Kaydet</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('user/layout/libraries/js'); ?>
<?php $this->load->view('user/layout/footer') ?>

