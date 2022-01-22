<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Styles -->
    <style>
        table {
            margin-top: 30px;
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
        }
        th {
            width: 100px;
        }
        td {
            padding: 10px 5px;
        }
        a {
            padding: 5px;
            border: 1px solid #000;
            text-decoration: none;
            color: #fff;
        }
        #edit {
            background-color: blue;
        }
        #delete {
            background-color: red;

        }
        .backBtn {
            background-color: blue;
        }
    </style>
</head>
<body>
    <h1>Create Todo</h1>
    <div>
        <a href="{{ route('welcome-view') }}" class="backBtn">Back</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Instruction</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->name }}</td>
                <td>{{ $todo->instruction }}</td>
                <td><a href = 'edit/{{ $todo->id }}' id="edit">Edit</a></td>
                <td><a href = 'delete/{{ $todo->id }}' id="delete">Delete</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>