<html class="login-pf">
...
<div class="login-pf-page">

    
    
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
        <header class="login-pf-page-header">
          <img class="login-pf-brand" src="/assets/img/Logo_Horizontal_Reversed.svg" alt=" logo" />
          <p>
            This is placeholder text, only. Use this area to place any information or introductory message about your application that may be relevant for users.
          </p>
        </header>
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="card-pf">
              <header class="login-pf-header">
                <select class="selectpicker">
                  <option>English</option>
                  <option>French</option>
                  <option>Italian</option>
                </select>
                <h1>Log In to Your Account</h1>
                <h6>@if(session()->has('message')) {{session()->get('message')}}@endif</h6> 
              </header>
              <form action="{{ route('do.login') }}" method="post">
                @csrf
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control  input-lg" name="email" id="exampleInputEmail1" placeholder="Email address">
                </div>
                <div class="form-group">
                  <label class="sr-only"  for="exampleInputPassword1">Password
                  </label>
                  <input type="password" name="password" class="form-control input-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group login-pf-settings">
                      <label class="checkbox-label">
                        <input type="checkbox"> Keep me logged in for 30 days
                      </label>
                      <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Log In</button>
              </form>
              <p class="login-pf-signup">Need an account?<a href="#">Sign up</a></p>
            </div><!-- card -->
            
            <footer class="login-pf-page-footer">
              <ul class="login-pf-page-footer-links list-unstyled">
                <li><a class="login-pf-page-footer-link" href="#">Terms of Use</a></li>
                <li><a class="login-pf-page-footer-link" href="#">Help</a></li>
                <li><a class="login-pf-page-footer-link" href="#">Privacy Policy</a></li>
              </ul>
            </footer>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- login-pf-page -->

</html>
  