<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Categories</h2>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td> {{$categorie->id}}</td>
                <td>{{$categorie->name}}</td>
                <td>{{$categorie->status}}</td>

                @endforeach

            </tr>
        </tbody>
    </table>
</body>

</html>