<?php $this->load->view('user/layout/header') ?>

<div class="container" >
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="valign-wrapper" style="height: 100vh; width: 100%">
                <div class="card grey lighten-5"  style="width: 100%">
                    <div class="card-content blue-text"">

                        <span class="card-title">Şifre Sıfırlama Formu</span>
                        <?php echo form_open( '/user/forgot/forgot_pas', array('class' => 'col s12')) ?>

                        <div class="row">
                            <div class="input-field col s12 m12">
                                <input id="password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="password" >
                                <label for="password">Şifre</label>
                                <div class="helper-text red-text"> <?php echo form_error('password'); ?> </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12">
                                <input id="re_password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="re_password" >
                                <label for="re_password">Şifre Tekrarı</label>
                                <div class="helper-text red-text"> <?php echo form_error('password'); ?> </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="card-action right-align" style="border-top: 0;">
                            <button type="submit" class="btn primary">Şifre Sıfırlar</button>
                            <?php echo form_close() ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('user/layout/libraries/js'); ?>
<?php $this->load->view('user/layout/footer') ?>
