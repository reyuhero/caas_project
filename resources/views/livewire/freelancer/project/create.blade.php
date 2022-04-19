@section('title', 'dashboard')
@section('header')
    @include('layouts.navigation-freelancer')
@endsection
<main class="d-flex flex-column justify-content-center position-relative mx-3 p-3">

    <!-- container -->
    <div class="z-3">
      <section class="flow-column gap-4">

        <!-- content -->
        <article class="span flex-column" style="--span: 8;">
            <div class="mt-3 mb-1 fs-7 fw-bold"><i class="fas fa-arrow-left"></i> Back to projects</div>
            <div class="h5 fw-bold p-3 bg-gray-h rounded-5">Project title</div>
            <article class="bg-white rounded-5 shadow-sm flex-column">
                <article class="h5 fw-bold justify-content-between align-items-center w-100 pb-2 p-4 "><div>1. Deliverables </div><i class="fas fa-check p-1 bg-light text-black-50 rounded-pill fs-8 btn-circle" style="--size: 20px"></i></article>
                <article class="flex-column ms-auto col-11 align-items-start px-3">
                    <article class="flex-column border  borer-gray rounded-4 justify-content-end p-3 gap-1 w-100">
                        <input type="text" name="" id="" placeholder="Add a Deliverable Title" class=" border-0 bg-white fs-7">
                        <textarea type="text" name="" id="" placeholder="Enter a clear, concise description of what you'll deliver" class=" border-0 bg-white fs-7"></textarea>
                    </article>
                    <a href="#" class="btn p-0 m-0 d-flex align-items-center shadow-0 mt-2 fs-7 fw-bold"><button class="btn p-0 m-0 btn-circle btn-light me-2"><i class="fas fa-plus m-2"></i></button> Add Deliverable</a>
                </article>
                <hr class="mb-0">
                <div>
                    <article class="h5 fw-bold justify-content-between align-items-center w-100 pb-2 p-4"><div>2. Duration </div><i class="fas fa-check p-1 bg-light text-black-50 rounded-pill fs-8 btn-circle" style="--size: 20px"></i></article>
                    <article class="p-3 gap-3 col-11 ms-auto">
                        <article class="flex-column col rounded-top border border-gray">
                            <label class="px-2 pt-2 fs-9">Start Date</label>
                            <input type="date" name="start-date" id="start-date" class="border-0 py-1 px-2 fs-7 border-bottom border-dark">
                        </article>
                        <article class="flex-column col rounded-top border border-gray">
                            <label class="px-2 pt-2 fs-9">Start Date</label>
                            <input type="date" name="end-date" id="end-date" class="border-0 py-1 px-2 fs-7 border-bottom border-dark">
                        </article>
                    </article>
                </div>
                <hr class="m-0">
                <div>
                    <article class="h5 fw-bold justify-content-between align-items-center w-100 pb-2 p-4"><div>3. Budget</div><i class="fas fa-check p-1 bg-light text-black-50 rounded-pill fs-8 btn-circle" style="--size: 20px"></i></article>
                    <article class="gap-3 col-11 ms-auto px-3 flex-column">
                        <article class="gap-3">
                            <div class="col border p-3 text-center rounded-4 border-warning border-3">
                                <div class="fw-bold">Fixed price</div>
                                <div class="fs-7">Best for one-time projects</div>
                            </div>
                            <div class="col border border-gray p-3 text-center rounded-4">
                                <div class="fw-bold">fixed price</div>
                                <div class="fs-7">Best for one-time projects</div>
                            </div>
                        </article>
                        <article class="gap-3">
                            <article class="flex-column col rounded-top border border-gray">
                                <label class="px-2 pt-2 fs-9">Start Date</label>
                                <input type="date" name="end-date" id="test" class="border-0 py-1 px-2 fs-7 border-bottom border-dark">
                            </article>
                            <article class="flex-column col rounded-top border border-gray">
                                <label class="px-2 pt-2 fs-9">Start Date</label>
                                <input type="date" name="end-date" id="ss" class="border-0 py-1 px-2 fs-7 border-bottom border-dark">
                            </article>
                        </article>
                    </article>
                </div>
                <hr>
                <div>
                    <article class="h5 fw-bold justify-content-between align-items-center w-100 pb-2 p-4"><div>4. Payment Schedule</div><i class="fas fa-check p-1 bg-light text-black-50 rounded-pill fs-8 btn-circle" style="--size: 20px"></i></article>
                    <div class="px-4">
                        <article class="rounded-4 border border-gray p-3">
                            <article class="flex-row justify-content-between">
                                <div>
                                    this is a test.
                                </div>
                                <div>$0</div>
                            </article>
                        </article>
                    </div>
                </div>
            </article>
        </article>
        <!-- aside -->
        <aside class="span d-flex flex-column align-items-center bg-white-o rounded-5 h-100 border-white shadow-sm" style="--span: 4;">
          side bar
        </aside>
      </section>
    </div>
  </main>
