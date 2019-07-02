<!doctype html>
<html>
    <head>
        <title>Moodles Creation Time</title>
    </head>
    <body>

        @foreach($collection as $col)
            create time: {{$col->created_at }}<br>
        @endforeach

    </body>

</html>