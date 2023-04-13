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
              <form action="{{ route('reset') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control  input-lg" name="email" id="exampleInputEmail1" placeholder="Email address">
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
