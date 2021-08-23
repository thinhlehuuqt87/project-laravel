<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h1>Create post</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<style>
        .error{
            color:red;
        }
    </style>
<h1>Create new post</h1>

</head>
<body>

    <form action="/post" method="post">
        @csrf
        <div>
            <p @error('title') class = 'error' @enderror>
                Title
                @error('title')
                    :<span>{{ $message }}</span>
                @enderror
            </p>
            <input type="text" name="title">
        </div>
        <div>
            <p @error('body') class = 'error' @enderror>
                Body
                @error('body')
            :<span> {{ $message }}</span>
                @enderror
            </p>
            <textarea name="body" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div>
            <button type="submit">Create</button>
        </div>
    </form>
</body>
</html>
