<html class="login-pf">
<div class="login-pf-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="card-pf">
              <header class="login-pf-header">
                <h1>Forgot Password</h1>
                <h6>@if(session()->has('message')) {{session()->get('message')}}@endif</h6>
              </header>
              <form action="{{ route('confirmpass') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ encrypt($user->user_id) }}">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control  input-lg" name="password" id="password" placeholder="password">
                  <label class="sr-only" for="exampleInputEmail1">Confirm Password</label>
                  <input type="password" class="form-control  input-lg" name="c_password" id="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
              </form>
            </div><!-- card -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- login-pf-page -->
</html>
