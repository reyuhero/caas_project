@section('title', 'login')
@section('header')
    <nav class="z-3 bg-white relative text-center fs-2 p-3 W-100 mb-5 fw-bold d-flex justify-content-start shadow-md"
        style="font-family: serif !important;">
        <div class="ps-3">CAAS</div>
    </nav>
@endsection
  <main class="d-flex flex-column mx-auto justify-content-center position-relative m-3 px-md-5">
    @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
    <svg viewBox="0 0 155 134" opacity="1" style="width: 16rem; top: -100px; z-index: -10"
      class="start-0 position-absolute blur">
      <linearGradient gradientTransform="rotate(140)" id="react-aria7205925976-1" x1="-100%" x2="0">
        <stop offset="0%" stop-color="rgba(19, 19, 19, 0)"></stop>
        <stop offset="100%" stop-color="rgba(143, 111, 219, 0.8)"></stop>
      </linearGradient>
      <path d="M 155 134 H 0 V 73.7 h 21.2 V 36.8 h 20.3 V 0 H 155 v 134 z" fill="url(#react-aria7205925976-1)"
        stroke="none"></path>
    </svg>
    <svg viewBox="-2 49 104 52" style="width: 10rem; top: -50px; z-index: -10" class="end-0 top-50 position-absolute blur"
      opacity="1">
      <linearGradient id="react-aria1013596315-2">
        <stop offset="0%" stop-color="rgba(19, 19, 19, 0)"></stop>
        <stop offset="100%" stop-color="rgba(242, 162, 138, .8)"></stop>
      </linearGradient>
      <path d="M0,50 a1,1 0 0,0 100,0" fill="url(#react-aria1013596315-2)" stroke="none"></path>
    </svg>

    <form
        wire:submit.prevent='submit'
      class="bg-white border border-white col col-lg-4 col-lg-7 col-md-9 col-xl-6 d-flex flex-column justify-content-center mx-1 mx-auto rounded-5 shadow-md text-center z-2"
      style="--bs-bg-opacity: 0.3;">
      <div class="col-12 col-md-11 mx-auto px-md-5 px-3 py-5 gap-3">
        <h2 class="mb-5 fw-bold">Welcome back to CAAS</h2>
        <div class="border border-gray form-group ryo-rounded-top text-start bg-white mb-3  position-relative" style="--r: 0.8rem;">
          <label for="email" class="badge fw-light p-1 px-3 text-dark opacity-75">Email</label>
          <input type="email" id="email" wire:model='form.email'
            class="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
            @error('form.email')
                <span class="text-danger fs-8 position-absolute bottom-0 start-0 ps-3">{{ $message }}</span>
            @enderror
        </div>
        <div class="border border-gray form-group ryo-rounded-top text-start bg-white position-relative " style="--r: 0.8rem;">
          <label for="password" class="badge fw-light p-1 px-3 text-dark opacity-75">password</label>
          <input type="password" id="password" wire:model="form.password"
            class="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
            @error('form.password')
                <span class="text-danger fs-8 position-absolute bottom-0 start-0 ps-3">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-warning rounded-pill fw-bold mt-5 py-2 px-5 w-100" type="submit">
          Log in
        </button>
        <div class="d-flex position-relative align-items-center justify-content-center my-3">
          <hr class="opacity-2 w-100 position-absolute z-1">
          <div class="bg-white text-center z-2 px-2 p-0 badge text-black">OR</div>
        </div>
        <div class="d-grid col mx-auto">
          <a href="#" class="btn btn-light rounded-pill fw-bold py-2 px-3 ">
            <i class="fab fa-google"></i> Log in with Google
          </a>
        </div>
      </div>
    </form>
    <div class="d-flex flex-column justify-content-center mt-5  mx-auto">
      <div class="col col-md-6 mx-auto">
        <p class="text">
          <strong>New To Contra?</strong> Contra is a new professional network for
          flexible work. Build your career around the life you want
        </p>
      </div>
      <a href="{{ route('register') }}" class="btn btn-dark p-2 rounded-pill w-auto px-3 fw-bold mx-auto">Sign up</a>
    </div>
  </main>
