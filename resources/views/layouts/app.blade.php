<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Support tickets system</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @livewireStyles
    @livewireScripts
    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>  
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" 
            data-turbolinks-eval="false" data-turbo-eval="false"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary text-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="">Menu</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-between w-100">
                    <a class="mx-3 nav-link {{ (request()->routeIs('home')) ? 'active bg-dark' : '' }}"
                        aria-current="home" href="/">Home</a>
                    <a class="mx-3 nav-link {{ (request()->routeIs('login')) ? 'active bg-dark' : '' }}"
                        href="/login">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="my-5 d-flex justify-content-center">  
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    
</body>
</html>


