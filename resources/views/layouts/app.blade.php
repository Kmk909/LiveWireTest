{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha2/css/bootstrap.min.css" integrity="sha512-AJqlPMFVh36uw2D9RLPBfAVy0S7OFl7zCOnnZTs0WAtaRzv1lK7tMoGz7k586FulS00KTNsWNr/5IVhIzBlEow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <livewire:styles />
    <livewire:scripts />
</head>

<body class="flex justify-content-center">
    <div class="w-10/12 my-10 flex">
        <div class="w-5/12 rounded border p-2">
            <livewire:tickets />
        </div>
        <div class="w-7/12 mx-2 rounded border p-2">
            <livewire:comments />
        </div>
    </div>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <livewire:styles />
    <livewire:scripts />
    <script src="{{asset('js/app.js')}}"></script>
</head>

<body class="flex flex-wrap justify-center">
    <div class="flex w-full justify-between px-4 bg-purple-900 text-white">
        <a class="mx-3 py-4" href="/home">Home</a>
        {{-- @auth
        <livewire:logout />
        @endauth
        @guest --}}
        <div class="py-4">
            <a class="mx-3" href="/login">Login</a>
            <a class="mx-3" href="/register">Register</a>

        </div>
        {{-- @endguest --}}
    </div>
    <div class="my-10 w-full flex justify-center">

        @yield('content')


    </div>

</body>

</html>
