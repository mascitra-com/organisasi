<ol class="breadcrumb">
    <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-home fa-lg"></i></a></li>
    <?php
    $url = explode('/', uri_string());
    $link = '';
    for ($i = 0; $i < count($url) - 1; $i++) {
        $link .= '/' . $url[$i];
        if (!is_numeric($url[$i + 1]) && $url[$i + 1] !== 'index' && strpos($url[$i + 1], '-') === FALSE) {
            echo "<li><a href='" . site_url($link) . "'>" . ucfirst($url[$i]) . "</a></li>";
        } else {
            echo "<li class='active'>" . ucfirst($url[$i]) . "</li>";
        }
    }
    if (!is_numeric($url[$i]) && $url[$i] !== 'index' && strpos($url[$i], '-') === FALSE) {
        echo '<li class="active">' . ucfirst($url[$i]) . '</li>';
    }
    ?>
</ol>