<?php $this->load->view('backend/layout/header.php'); ?>
    <main>
        <div class="row">
            <div class="col s12 m6 l6 offset-l3 offset-m3">
                <div class="card red white-text">
                    <div class="card-content">
                        <div class="card-header">
                            Başarılı!
                        </div>
                        <p>
                            <?php echo $message; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $this->load->view('backend/layout/footer.php'); ?>
