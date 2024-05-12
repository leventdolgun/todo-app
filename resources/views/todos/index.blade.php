<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>


    @if (session()->has('notification'))
        <div style="background-color: red; color: white">
            {{ session()->get('notification') }}
        </div>
    @endif


    <form action="/" method="post" class="mb-6">
        @csrf
        <input type="text" name="yapilacak_is" id="value">
        <button class="/">ekle</button>

    </form>
    <ul>
        @foreach ($todos as $todo)
            <li>
                <form method="post" action="/{{ $todo->id }}">
                    @csrf
                    @method('PUT')

                    <input type="text" name="yapilacak_is" value="{{ $todo->value }}">
                    <input type="checkbox" name="tamamlandi_mi" {{ $todo->is_completed ? 'checked' : '' }}>

                    {{-- {{ $todo }} --}}

                    <button class="bg-yellow-600"> güncelle {{ $todo->id }}</button>
                </form> 

                <form method="post" action="/{{ $todo->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600">sil {{ $todo->id }}</button>
                </form>

            </li>
        @endforeach
    </ul>


    <button type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">todo
        list sayfasi</button>

</body>

</html>
