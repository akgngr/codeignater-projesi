<?php $user = $this->session->userdata('user'); ?>
<nav class="nav blue-grey-text">
    <ul id="slide-out" class="sidenav sidenav-fixed collapsible ">
        <li class="row" style="margin-top: 20px;">
            <div class="col s4">
                    <img class="circle responsive-img" alt="<?php echo $user->fullName; ?>" src="https://avatars3.githubusercontent.com/u/606619?s=180&v=4" alt="">
            </div>
            <div class="col s8">
                <p class="orange-text" style="line-height: 0; margin-bottom: 0;">Hoş Geldin</p> <?php echo $user->fullName; ?>
            </div>
        </li>
        <li class="divider"></li>
        <li >
            <a href="<?php base_url(''); ?>/admin"><i class="material-icons">dashboard</i>Anasayfa</a>
        </li>
        <li>
            <a href="#" class="collapsible-header waves-effect waves-teal"><i class="material-icons">supervisor_account</i>Üyeler</a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="<?php echo base_url('admin/users')?>" class="waves-effect waves-teal">Üyeleri Göster</a></li>
                    <li><a href="<?php echo base_url('admin/users/new')?>" class="waves-effect waves-teal">Üye Ekle</a></li>
                    <li><a href="#" class="waves-effect waves-teal">İzinleri Düzenle</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#" class="collapsible-header waves-effect waves-teal"><i class="material-icons">assignment</i>İçerikler</a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="<?php echo base_url('admin/posts') ?>" class="waves-effect waves-teal">İçerikler</a></li>
                    <li><a href="<?php echo base_url('admin/posts/ekle') ?>" class="waves-effect waves-teal">İçerik Ekle</a></li>
                    <li><a href="#" class="waves-effect waves-teal">Yorumlar</a></li>
                    <li><a href="#" class="waves-effect waves-teal">İçerik Ayarlar</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#" class="collapsible-header waves-effect waves-teal"><i class="material-icons">pages</i>Sayfalar</a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="#" class="waves-effect waves-teal">Sabit Sayfalar</a></li>
                    <li><a href="#" class="waves-effect waves-teal">Sabit Sayfa Ekle</a></li>
                    <li><a href="#" class="waves-effect waves-teal">Bloglar</a></li>
                    <li><a href="#" class="waves-effect waves-teal">Blog Ekle</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#" class="collapsible-header waves-effect waves-teal"><i class="material-icons">settings</i>Ayarlar</a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="#" class="waves-effect waves-teal">Sistem Ayarları</a></li>
                </ul>
            </div>
        </li>

    </ul>
    <ul class="right">
        <li><a class="btn btn-flat hide-on-med-and-down" href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a class="btn btn-flat hide-on-med-and-down" href="badges.html"><i class="material-icons">view_module</i></a></li>
        <li><a class="btn btn-flat hide-on-med-and-down" href="collapsible.html"><i class="material-icons">refresh</i></a></li>
        <!-- Dropdown Trigger -->
        <li class="right">
            <a class='dropdown-trigger btn btn-flat cikis ' href='#' data-target='dropdown1'><i class="material-icons">more_vert</i></a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="<?php echo base_url('admin/users/profile')?>">Profil</a></li>
                <li><a href="#">Mesajlar</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="<?php echo base_url('user/login/logout') ?>">Çıkış Yap</a></li>

            </ul>
        </li>

    </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>

