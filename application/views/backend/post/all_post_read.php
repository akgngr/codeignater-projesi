<main>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">İçerikler</div>
                    <?php if (isset($message)){ ?>
                    <div class="row center-align">
                        <div class="container">
                            <div class="col s12 m6">
                                <div class="card green lighten-3">
                                    <div class="card-content white-text">
                                        <p><?php echo $message; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Başlık</th>
                            <th>Oluşturma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i =1;
                            foreach ($posts as $post) {
                                echo '<tr>';
                                echo '<td>'.$i++.'</td>';
                                echo '<td>'.$post->title.'</td>';
                                echo '<td>'.$post->createdAt.'</td>';
                                echo '<td>'.$post->updatedAt.'</td>';
                                echo '<td style="width: 120px;"><a style="margin-right:5px;" class="left btn btn-small red waves-effect waves-orange" href="'.base_url('admin/posts/update_form/').$post->id.' "><i class="material-icons">edit</i></a>
                                    '.form_open('admin/posts/delete').'
                                        <input type="hidden" value="'.$post->id.'" name="id">
                                        <button onclick="alert(\'Eminmisiniz?\');" class="btn btn-small blue waves-effect waves-purple circle"><i class="material-icons">delete</i></button>
                                    '.form_close().'
                                    </td>';
                                echo '<tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
