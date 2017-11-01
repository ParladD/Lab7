<!Doctype html>
<html >
<head>
    <title></title>
    <style>
        table{
            background: bisque;
            border-collapse: collapse;
            border: 1px solid greenyellow;
        }
        th{
            background: brown;
            color: white;
            border: 2px solid greenyellow;
        }
        tr, td{
            border: 2px solid red;
            color: rebeccapurple;
        }
    </style>
</head>
<body>
<h1>
            <table>
                <thead>
                    <th>
                        Body
                    </th>
                    <th>
                        Completed
                    </th>
                    <th>
                        Created at
                    </th>
                    <th>
                        Updated at
                    </th>
                </thead>
                <tbody>
                @foreach($task as $t)

                    <tr>
                        <td>
                            <a href="/tasks/{{$t->id}}">{{$t->body}}
                            </a></ul>

                        </td>
                        <td>
                            {{$t->completed}}
                        </td>
                        <td>
                            {{$t->created_at}}
                        </td>
                        <td>
                            {{$t->updated_at}}
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
</h1>
</body>
</html>
