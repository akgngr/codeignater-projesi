<?php $this->load->view('backend/layout/header.php'); ?>

<main>
    <div class="row">
        <div class="col s12 m12">
            <div class="card white-grey darken-1 ">
                <div class="card-content ">
                    <span class="card-title orange-text">Üyeler</span>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>E-posta</th>
                            <th>Oluşturma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($users as $user) {
                                    echo '<tr>';
                                    echo '<td>'.$user->fullName.'</td>';
                                    echo '<td>'.$user->email.'</td>';
                                    echo '<td>'.$user->createdAt.'</td>';
                                    echo '<td><a style="margin-right:5px;" class="left btn btn-small red waves-effect waves-orange" href="'.base_url('admin/users/updateform/').$user->id.' "><i class="material-icons">edit</i></a> 
                                    '.form_open('admin/users/delete').'
                                        <input type="hidden" value="'.$user->id.'" name="id">
                                        <button onclick="alert(\'Eminmisiniz?\');" class="btn btn-small blue waves-effect waves-purple circle"><i class="material-icons">delete</i></button>
                                    '.form_close().'
                                    </td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Structure -->
    <div id="delete" class="modal">
        <div class="modal-content">
        <h6> <?php echo $user->fullName ?> adlı üyeyi silmek istiyormusunuz?</h6>
        <p class="data-view" data="get data-value"></p>
        </div>
        <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

</main>

<?php $this->load->view('backend/layout/footer.php'); ?>
<script>
  $(document).ready(function(){
    $('.modal').modal();

    $("#delete-button").click(function(){
        alert("Yazı: " + $("#hidden").val());
    });
  });
</script>
