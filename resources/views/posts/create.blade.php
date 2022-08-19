<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel Slug</title>
</head>
<body>
    <h1>Create Post</h1>
   <form method="post" action="/posts">
    {{ csrf_field() }}

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="title...." value="{{old('title')}}"/>
    </div>
    <div>
        <label for="body">Body</label>
       <textarea name="body" id="body" >{{old('body')}}</textarea>
    </div>
    <div>
       <button type="submit">send</button>
     </div>
    </form> 
</body>
</html>