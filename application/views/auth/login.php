<div class="row card">
  <div class="col-xs-10 col-md-3">
    <div class="row">
      <div class="col-md-12" id="left">
        <h1>LOGIN</h1>
        <form action="<?=site_url('auth/login')?>" method="post" accept-charset="utf-8">
          <div class="form-group">
            <label for="">USERNAME</label>
            <input type="text" class="form-control" name="identity" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="">PASSWORD</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
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
                  <button class="btn btn-warning btn-round" type="reset">Reset</button>
              </div>
            </div>
          </div>
        </form>
          <a href="<?= site_url('auth/forgot_password') ?>">Lupa password?</a>
      </div>
    </div>
  </div>
<span id="copyright">Copyright <a href="http://www.mascitra.com">MasCitra.com</a> &copy <?=date('Y')?>. All right reserved.</span>
</div>