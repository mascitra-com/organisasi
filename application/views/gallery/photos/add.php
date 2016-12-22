<label>Upload Foto</label><hr>
<form action="<?= site_url('photos/do_upload/' . $slug) ?>" class="dropzone" id="dropzone">
    <div class="fallback">
        <input name="file" type="file" multiple/>
    </div>
</form>
<hr>
<a href="<?= site_url('photos/show/' . $slug) ?>" class="btn btn-success ">Selesai</a>