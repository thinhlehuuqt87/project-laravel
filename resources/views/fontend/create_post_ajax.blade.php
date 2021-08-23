<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <h1>Create post</h1>

<h1>Create new post</h1>

</head>
<body>

    <form action="/post" method="post">
        @csrf
        <div>
            <p>
                Title

            </p>
            <input type="text" name="title">
        </div>
        <div>
            <p>
                Body

            </p>
            <textarea name="body" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div>
            <button type="submit">Create</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script>
        $('form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '/post',
                type: 'POST',
                data: {
                    _token: $('input[name=_token]').val(),
                    title: $('input[name=title]').val(),
                    body: $('textarea[name=body]').val()
                }, success:function(res){

                }, error: function(error){
                    console.log(error);
                }
            })
        })
    </script>
</body>
</html>
