<!Doctype html>
<html >
    <head>
       <title></title>
    </head>
    <body>
        <h1>
            @foreach($task as $t)

                    <ul>{{$t->body}}</ul>
                @endforeach
        </h1>
    </body>
</html>
