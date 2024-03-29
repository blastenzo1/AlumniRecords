<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href='{{ asset('app.css') }}'>

        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    {{-- <body class="my-login-page d-flex align-items-center justify-content-center" style="min-height:100vh;min-width:100vw;"> --}}

    <body>
        <section class="vh-100 gradient-custom">
        <!-- Add logo column -->
        <div class="col-12 col-md-4 col-lg-6 col-xl-7 d-flex justify-content-end align-items-start">
          <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="mb-4" style="width: 50%; height: auto; position: absolute; top: 15%; left: 10%;">
        </div>
            <div class=" py-5 h-100">
              <div class="row lg:w-1/2 mt-6 lg:pl-2 d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-light text-black" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                      <div class="mb-md-5 mt-md-4 pb-5">

                        {{-- <!-- Logo -->
                        <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="h-auto w-auto"> --}}


                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-black-50 mb-5">Please enter your login and password!</p>

                        <form action="{{ route('login.perform') }}" method="POST">
                            @csrf
                            <div class="form-outline form-white mb-4">
                                <input type="text" name="email" id="email" class="form-control form-control-lg" />
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <button class="btn btn-outline-dark btn-lg px-5" type="submit">Login</button>
                        </form>

                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {{-- <script src="js/my-login.js"></script> --}}
    </body>


</html>
