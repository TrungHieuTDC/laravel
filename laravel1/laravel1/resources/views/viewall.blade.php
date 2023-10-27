<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($user as $item)
    <h1>Name: {{ $item->name }}</h1>
    <h1>Email: {{ $item->email }}</h1>
    <h1>SDT: {{ $item->sdt }}</h1>
    <img src="{{ asset('images/'.$item->image) }}" alt="ss" width="100">   
    @endforeach
</body>
</html>