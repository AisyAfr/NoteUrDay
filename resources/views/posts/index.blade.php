<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>NoteUrDay</title>
</head>
<body class="bg-yellow-300">
    <header>
        <nav class="flex justify-center space-x-4 bg-dark-400 h-20">
            <a href="/" class="font-bold px-3 py-5 text-black ">Home</a>
            <a href="/create" class="font-bold px-5 py-5 text-black ">Create</a>
            <a href="/recylcebin" class="font-bold px-3 py-5 text-black ">Recycle Bin</a>
          </nav>
    </header>
    @foreach($posts as $p)
    <div class="p-4 m-8  bg-white shadow-md rounded-xl">  
        <h1 class="mt-4 mb-2 text-xl font-bold">{{$p->title}}</h1>
        <p class="text-sm text-dark-600">
          {{$p->content}}
        </p>
        <p class="text-sm text-gray-400">
            {{$p->created_at}}
        </p>
        <button class="rounded-full text-bold bg-orange-400 px-4 py-2 my-3"><a href="{{url("/$p->id/detail")}}">More Detail</a></button>
        <button class="rounded-full text-bold bg-indigo-400 px-4 py-2 my-3"><a href="{{url("/$p->id/edit")}}">Edit</a></button>
      </div>
      @endforeach
</body>
</html>