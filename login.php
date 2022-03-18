<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

  <title>Login</title>
</head>

<body class="d-flex flex-column">
  <nav class="z-3 bg-white relative text-center fs-2 p-3 W-100 mb-5 fw-bold d-flex justify-content-start shadow-md" style="font-family: serif !important;">
    <div class="ps-3">CAAS</div>
  </nav>
  <main class="d-flex flex-column justify-content-center position-relative m-3 p-md-5">
    <?php include __DIR__ . "/square.svg" ?>
    <?php include __DIR__ . "/shape2.svg" ?>
    <?php include __DIR__ . "/shape3.svg" ?>
    <form class="col mx-1 shadow-md bg-white p-4 p-md-5 text-center border border-white rounded-5 z-2" style="--bs-bg-opacity: 0.3">
      <h2 class="mb-5 fw-bold">Welcome back to CAAS</h2>
      <div class="border border-gray form-group ryo-rounded-top text-start" style="--r: .8rem;">
        <label for="email" class="badge fw-light p-1 px-3 text-dark opacity-75">Email</label>
        <input type="email" id="email" class="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
      </div>
      <div class="d-grid">
        <button class="btn btn-warning rounded-pill fw-bold mt-5 py-2" type="submit">Log in</button>
      </div>

    </form>
    <div class="d-flex flex-column justify-content-center mt-5 col-8 mx-auto">
      <div class="col-12 col-md-9">
        <p class="text">
          <b>New To Contra?</b> Contra is a new professional network for flexible work. Build your career around the life you want
        </p>
      </div>
      <a href="#" class="btn btn-dark p-2 rounded-pill w-auto px-3 fw-bold mx-auto">Sign up</a>
    </div>
  </main>

  <footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </footer>
</body>


</html>