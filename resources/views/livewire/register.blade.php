@section('title', 'register')
@section('header')
    <nav
        class="z-3 bg-white relative text-center  p-3 W-100 mb-5 d-flex justify-content-between shadow-md align-items-center ">
        <div class="ps-3 fs-2 fw-bold " style="font-family: serif !important;">CAAS</div>
        <div class="fs-7">
            Already have an account? <a href="{{ route('login') }}" class="link-dark fw-bold px-2">Log in</a>
        </div>
    </nav>
@endsection
<main class="d-flex flex-column justify-content-center position-relative m-3 px-md-5">
    <svg viewBox="0 0 155 134" opacity="1" style="width: 16rem; top: -100px; z-index: -10" class="start-0 position-absolute blur z-1">
        <linearGradient gradientTransform="rotate(140)" id="react-aria7205925976-1" x1="-100%" x2="0">
            <stop offset="0%" stop-color="rgba(19, 19, 19, 0)"></stop>
            <stop offset="100%" stop-color="rgba(143, 111, 219, 0.8)"></stop>
        </linearGradient>
        <path d="M 155 134 H 0 V 73.7 h 21.2 V 36.8 h 20.3 V 0 H 155 v 134 z" fill="url(#react-aria7205925976-1)"
            stroke="none"></path>
    </svg>
    <svg viewBox="-2 49 104 52" style="width: 10rem; top: -50px; z-index: -10" class="end-0 top-50 position-absolute blur z-1"
        opacity="1">
        <linearGradient id="react-aria1013596315-2">
            <stop offset="0%" stop-color="rgba(19, 19, 19, 0)"></stop>
            <stop offset="100%" stop-color="rgba(242, 162, 138, .8)"></stop>
        </linearGradient>
        <path d="M0,50 a1,1 0 0,0 100,0" fill="url(#react-aria1013596315-2)" stroke="none"></path>
    </svg>

    
    <form wire:submit.prevent="submit"
        class="bg-white border border-white col col-lg-4 col-lg-7 col-md-9 col-xl-6 d-flex flex-column justify-content-center mx-auto rounded-5 shadow-md text-center z-2"
        style="--bs-bg-opacity: 0.3;">
        <div class="d-flex flex-column col-12 pt-5 px-4" >
            <label for="type" class="h2 fw-bold" >Sign up as {{ $form['type'] === 1 ? "an independent": "a client"}}</label>
            <input type="text" hidden id="type" wire:model="form.type" class="form-control" />
            <div class="d-flex mx-auto gap-2">
                @if($form['type'] === 1)
                    <p class="m-0">Not looking to get hired?</p>
                    <button class="border-0 bg-none fw-bold underline cubic-bezier " type="button" wire:click="$set('form.type', 0)">Sign up as a client <i class="fas fa-info-circle"></i></button>
                @elseif($form['type'] === 0)
                    <p class="m-0">Not looking to hire on CAAS?</p>
                    <button class="border-0 bg-none fw-bold underline cubic-bezier" type="button" wire:click="$set('form.type', 1)">Sign up as an independent <i class="fas fa-info-circle"></i></button>
                @endif
            </div> 
        </div>
        <div class="col-12 col-md-8 mx-auto px-md-5 px-3 pt-3">
            <div class="d-flex flex-column gap-3">
                <div class="border border-gray form-group ryo-rounded-top text-start bg-white position-relative"
                    style="--r: 0.8rem;">
                    <label for="name" class="badge fw-light p-1 px-3 text-dark opacity-75 text-capitalize">name</label>
                    <input type="text" wire:model="form.name"
                        class="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
                    @error('form.name')
                        <span class="text-danger fs-8 position-absolute bottom-0 start-0 ps-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="border border-gray form-group ryo-rounded-top text-start bg-white position-relative"
                    style="--r: 0.8rem;">
                    <label for="email"
                        class="badge fw-light p-1 px-3 text-dark opacity-75 text-capitalize">Email</label>
                    <input type="email" wire:model="form.email"
                        class="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
                    @error('form.email')
                        <span class="text-danger fs-8 position-absolute bottom-0 start-0 ps-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="border border-gray form-group ryo-rounded-top text-start bg-white position-relative"
                    style="--r: 0.8rem;">
                    <label for="password"
                        class="badge fw-light p-1 px-3 text-dark opacity-75 text-capitalize">password</label>
                    <input type="password" wire:model="form.password"
                        class="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
                    @error('form.password')
                        <span class="text-danger fs-8 position-absolute bottom-0 start-0 ps-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="border border-gray form-group ryo-rounded-top text-start bg-white position-relative"
                    style="--r: 0.8rem;">
                    <label for="confirm-password"
                        class="badge fw-light p-1 px-3 text-dark opacity-75 text-capitalize">confirm password</label>
                    <input type="password" wire:model="form.password_confirmation"
                        class="border-0 border-1 border-bottom border-dark form-control mt-2 py-2 px-3 rounded-0 shadow-0" />
                </div>
            </div>
            <div class="d-grid mx-auto">
                <button class="btn btn-warning rounded-pill fw-bold mt-5 py-2 px-5" type="submit">
                    Sign up
                </button>
            </div>
            <div class="d-flex position-relative align-items-center justify-content-center my-3">
                <hr class="opacity-2 w-100 position-absolute z-1" />
                <div class="bg-white text-center z-2 px-2 p-0 badge text-black">
                    OR
                </div>
            </div>
            <div class="d-grid col mx-auto">
                <a href="#" class="btn btn-light rounded-pill fw-bold py-2 px-3" type="submit">
                    <i class="fab fa-google"></i> Continue with Google
                </a>
            </div>
        </div>
        <div class="mt-5 border-top p-3 text-black-50 py-4" style="font-size: 0.7rem;">
            By continuing, you agree to Contra's <a href="#" class="text-dark fw-bold" class="text-dark">Terms of
                Use</a> and confirm that you have read Contra's <a href="#" class="text-dark fw-bold">Privacy Policy</a>
        </div>
    </form>

</main>
