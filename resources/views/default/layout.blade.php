<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Despesas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,800;1,400&display=swap"
        rel="stylesheet">
</head>
<style>

    .navbar {
        background-color: #3498db !important;
        color: #E8D5B7;
    }

    .btn-primary {
        background-color: #5eba7d;
        color: #FFFFFF;
        border: none;

    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #ffffff;
        color: #333333;
    }
</style>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home.user')}}" style="color: #E8D5B7">Minhas Despesas</a>
            <ul class="nav justify-content-end">
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="navbar-brand">
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                <i class="bi bi-list"></i>
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('usuario.logout') }}" method="POST">
                            @csrf
                            <div class="btn-group dropstart">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">{{auth()->user()->name}}</a></li>
                                    <li><a class="dropdown-item" type="submit"><input style="border: none; background-color: transparent; width: 100%" type="submit" value="Sair"></a></li>
                                </ul>
                              </div>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{ route('usuario.create') }}"><button
                            class="btn btn-primary"><b>Cadastro</b></button></a>
                    </li>
                    <li class="nav-item">
                    </li>
                @endif
            </ul>
        </div>

    </nav>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div>
            <div style="width: 100% !important" class="list-group">

                <a href="{{route('despesas.create')}}" class="list-group-item list-group-item-action">Cadastrar nova despesa</a>

              </div>
          </div>
        </div>
      </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>

@yield('content')
