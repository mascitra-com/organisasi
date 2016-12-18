<!-- Load JQUERY -->
<script src="<?= base_url('assets/plugins/jquery/jquery-3.1.1.min.js') ?>"></script>

<!-- Load BOOTSRAP -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>

<!-- Load jQuery UI -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

<!-- Load CUSTOM JAVASCRIPT -->
<?php if (isset($_view['js']) && !empty($_view['js'])): ?>

    <!-- Load Tiny MCE -->
    <?php if (in_array($_view['js'], array('news', 'gallery'))): ?>
        <script src="<?= base_url('assets/plugins/tinymce/tinymce.min.js') ?>"></script>
    <?php endif ?>

    <?php if (in_array($_view['js'], array('gallery'))): ?>
        <script src="<?= base_url('assets/plugins/dropzone/dropzone.js') ?>"></script>
    <?php endif ?>

    <script src="<?= base_url('assets/js/' . $_view['js'] . '.js') ?>"></script>
<?php endif; ?>

<script type="text/javascript">
    $("input[type='date']").datepicker();
</script>