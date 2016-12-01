<div class="row card">
  <div class="col-md-5">
    <div class="row">
      <div class="col-md-6" id="left">
        <h1>LOGIN</h1>
        <form action="<?=site_url('auth/login')?>" method="post" accept-charset="utf-8">
          <div class="form-group">
            <label for="">USERNAME</label>
            <input type="text" class="form-control" name="identity" placeholder="username">
          </div>
          <div class="form-group">
            <label for="">PASSWORD</label>
            <input type="password" class="form-control" name="password" placeholder="password">
          </div>
          <div class="form-group">
            <label>
              <input type="checkbox" name="remember" value="1"> Remember me
            </label>
          </div>
          <div class="form-group">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
              <div class="btn-group">
                  <button class="btn btn-primary btn-round" type="submit">Masuk</button>
              </div>
              <div class="btn-group">
                  <button class="btn btn-warning btn-round" type="button">Kembali</button>
              </div>
            </div>
          </div>
        </form>
          <a href="<?= site_url('auth/forgot_password') ?>">Lupa password?</a>
      </div>
      <div class="col-md-6" id="right">
        <h1>HOTELS</h1>
        <span>Tempat mencari hotel</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, unde?</p>
        <a href="" class="btn btn-success">Daftar disini</a>
      </div>
    </div>
  </div>
<span id="copyright">copyright <a href="http://www.mascitra.com">MasCitra.com</a> &copy <?=date('Y')?>. All right reserved.</span>
</div>