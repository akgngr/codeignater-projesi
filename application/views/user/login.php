<?php $this->load->view('user/layout/header') ?>

<div class="container" >
    <?php if (isset($error)){ ?>
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card red white-text center-align">
                <div class="card-content">
                    <div class="card-title">HATA!</div>
                    <p>  <?php echo $error; ?>  </p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="valign-wrapper" style="height: 100vh; width: 100%">
                <div class="card grey lighten-5"  style="width: 100%">
                    <div class="card-content blue-text"">
                        <span class="card-title">Giriş Formu</span>
                        <?php echo form_open( '/user/login/actions', array('class' => 'col s12')) ?>
                        <div class="row">
                            <div class="input-field col s12 m12">
                                <input id="email" type="email" class="validate <?php if (isset($class)) { echo $class; } ?>" name="email" >
                                <label for="email">E-posta</label>
                                <div class="helper-text red-text"> <?php echo form_error('email'); ?> </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12">
                                <input id="password" type="password" class="validate <?php if (isset($class)) { echo $class; } ?>" name="password" >
                                <label for="password">Şifre</label>
                                <div class="helper-text red-text"> <?php echo form_error('password'); ?> </div>
                            </div>
                        </div>
                        <p>
                            <label>
                                <input type="checkbox" name="remember_me"/>
                                <span>Beni hatırla</span>
                            </label>
                        </p>
                        <div class="card-action flex" style="border-top: 0;">
                            <button type="submit" class="waves-effect waves-light btn primary">Giriş Yap</button>
                            <?php echo form_close() ?>
                            <!-- Modal Trigger -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="float:right;">Şifremi unuttum</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <?php echo form_open('user/forgot'); ?>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" class="validate" type="text" name="email">
                <label for="email">E-posta Adresiniz</label>
                <div class="helper-text red-text"> <?php echo form_error('email'); ?> </div>
            </div>
            <div class="small-text">Lütfen Eposta adresinizi buraya yazınız..</div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" type="submit">Gönder</button>
        <?php echo form_close(); ?>
    </div>
</div>

<?php $this->load->view('user/layout/libraries/js'); ?>
<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>
<?php $this->load->view('user/layout/footer') ?>
