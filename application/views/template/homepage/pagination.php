<?php if (!isset($search)): ?>
    <div class="row">
        <div class="text-center col-md-10">
            <?= $pagination ?>
        </div>
        <div class="col-md-2">
            <label><?=$per_page_name?> Per Halaman</label>
            <select name="page" id="page" class="form-control">
                <?php foreach ($per_page_options as $option): ?>
                    <option value="<?=$option?>" <?= ($per_page == $option) ? 'selected' : '' ?>><?=$option?> <?=$per_page_name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
<?php endif; ?>