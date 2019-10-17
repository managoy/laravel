<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>


<div id="app-7" class="container">
    <form @submit="postData">
        <div class="form-group">
            <label for="name">Name:</label>
            <input v-model="name" name="name" class="form-control" placeholder="Enter your name" type="text">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input v-model="email" name="email" class="form-control" placeholder="Enter your email" type="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input v-model="phone" name="phone" class="form-control" placeholder="Enter your phone" type="text">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf

    </form>


    <p>Name is: @{{ name }}</p>
</div>

<script type="text/javascript" src="{{ mix('js/Notification.js') }}"></script>

</body>
</html>
