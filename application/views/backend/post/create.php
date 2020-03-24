<main>
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">Yeni içerik oluştur.</div>
                    <div class="row">
                        <?php echo form_open('admin/posts/create', array('class' => 'col s12')); ?>
                            <div class="col s12 m8">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="title" type="text" class="validate" name="title">
                                        <label for="title">Başlık</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="slug" type="text" class="validate" name="slug">
                                        <label for="slug">Slug (Url Yolu)</label>
                                        <p class="helper-text">Eğer kendi url yolunuzu girmezseniz otomatik olarak sistem tarafından oluşturulacaktır.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description" class="materialize-textarea" cols="8" name="description"></textarea>
                                        <label for="description">Özet</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="body" class="materialize-textarea" cols="8" name="body"></textarea>
                                        <label for="body">Gövde</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="fronted_on">
                                            <option value="" disabled selected>Seçim yapınız!</option>
                                            <option value="1">Evet</option>
                                            <option value="0">Hayır</option>
                                        </select>
                                        <label>Anasayfada Gösterilsin mi?</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <select name="comment_on">
                                            <option value="" disabled selected>Seçim yapınız!</option>
                                            <option value="1">Evet</option>
                                            <option value="0">Hayır</option>
                                        </select>
                                        <label>Yorumlar açılsın mi?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Resim</span>
                                            <input type="file" name="image">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Buraya içeriğin ayarlarıyla ilgili inputlar gelecek. -->
                    </div>
                </div>
                <div class="card-action right-align">
                    <button type="submit" class="btn waves-effect">Gönder</button>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</main>
