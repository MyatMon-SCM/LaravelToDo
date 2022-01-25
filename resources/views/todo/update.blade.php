<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .backBtn {
            padding: 5px;
            border: 1px solid #000;
            text-decoration: none;
            color: #fff;
            background-color: blue;
        }
        form {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Update Todo</h1>
    <div>
        <a href="{{ route('todo-show-view') }}" class="backBtn">Back</a>
    </div>
    <form action="{{ route('todo-update') }}" method="POST">
        @csrf
        <div>
            <input type="hidden" id="id" name="id" value="{{ $todos[0]->id }}">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $todos[0]->name }}">
            @error('name')
                <span role="alert"><strong> {{ $message }}</strong></span>
            @enderror
        </div>
        <div>
            <label for="instruction">Instruction</label>
            <input type="text" id="instruction" name="instruction" value="{{ $todos[0]->instruction }}">
            @error('instruction')
                <span role="alert"><strong> {{ $message }}</strong></span>
            @enderror
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>