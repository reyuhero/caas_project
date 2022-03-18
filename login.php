<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Login</title>
</head>

<body class="d-flex flex-column">
  <nav class="z-3 bg-white relative text-center fs-2 p-3 W-100 mb-5 fw-bold d-flex justify-content-start shadow-md" style="font-family: serif !important;">
    <div class="ps-3">CAAS</div>
  </nav>
  <main class="d-flex justify-content-center mx-auto position-relative">
    <?php include "./square.svg" ?>
    <form class="col-11 shadow-md bg-white p-4 p-md-5 text-center border border-white rounded-5 z-2" style="--bs-bg-opacity: 0.3">
      <h2 class="mb-5 fw-bold">Welcome back to CAAS</h2>
      <div class="form-group border border-gray rounded-3">
        <label for="email">Email</label>
        <input type="email" id="email" class="form-control shadow-0 mb-4 p-0 border-0" placeholder="Enter your email address" on-focus="this.placeholder = ''" on-blur="this.placeholder='Enter your email address'" />
      </div>
      <div class="d-grid gap-2">
        <button class="btn  text-white text-uppercase  mt-5 mb-4" type="submit">Login</button>
      </div>
      <div class="divider d-flex align-items-center my-4">
        <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
      </div>

      <a class="btn btn-primary btn-lg btn-block text-black goole-btn" href="#" role="button">
        <i class="fab fa-google-f me-2"></i>Continue with Google
      </a>

      <div class="row align-items-start mt-5">
        <div class="col-sm-8">
          <p class="f-pass text">
            New To Contra? Contra is a new professional network for flexible work. Build your career around the life you want
          </p>

        </div>
        <div class="col-sm-4">
          <a href="#" class="btn btn-block text-white p-2">Sign up</a>
        </div>
      </div>
      <div class="col-sm-12">
        <a href="#" class="f-pass">Forgot Password</a>
      </div>

    </form>
  </main>

  <footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </footer>
</body>


</html>