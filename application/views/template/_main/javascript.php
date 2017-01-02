<!-- Load JQUERY -->
<script src="<?= base_url('assets/plugins/jquery/jquery-3.1.1.min.js') ?>"></script>

<!-- Load BOOTSRAP -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>

<!-- Load jQuery UI -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

<!-- Load CUSTOM JAVASCRIPT -->
<?php if (isset($_view['js']) && !empty($_view['js'])): ?>

    <?php if (in_array($_view['js'], array('news', 'gallery', 'profile'))): ?>
        <!-- Load Tiny MCE -->
        <script src="<?= base_url('assets/plugins/tinymce/tinymce.min.js') ?>"></script>
    <?php endif ?>

    <?php if (in_array($_view['js'], array('dashboard'))): ?>
        <!-- Load Chart.js -->
        <script src="<?= base_url('assets/plugins/chartjs/chart.js') ?>"></script>
    <?php endif ?>

    <?php if (in_array($_view['js'], array('gallery'))): ?>
        <!-- Load Dropzone.js -->
        <script src="<?= base_url('assets/plugins/dropzone/dropzone.js') ?>"></script>
    <?php endif ?>

    <?php if ($_view['page'] == 'homepage/index'): ?>
        <!-- Load Flexslider.js -->
        <script src="<?= base_url('assets/plugins/flexslider2/js/flexslider.js') ?>"></script>
    <?php endif ?>

    <script src="<?= base_url('assets/js/' . $_view['js'] . '.js') ?>"></script>
<?php endif; ?>

<script type="text/javascript">
    $("input[type='date']").attr('type', 'text').datepicker({
        'dateFormat': "yy-mm-dd",
        'minDate': new Date()
    });
</script>