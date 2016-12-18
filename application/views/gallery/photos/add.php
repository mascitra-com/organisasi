<label>Upload Foto</label><hr>
<form action="<?= site_url('gallery/photos/do_upload/' . $category_id) ?>" class="dropzone" id="dropzone">
    <div class="fallback">
        <input name="file" type="file" multiple/>
    </div>
</form>
<hr>
<a href="<?= site_url('gallery/photos/show/' . $category_id) ?>" class="btn btn-default ">Kembali</a>