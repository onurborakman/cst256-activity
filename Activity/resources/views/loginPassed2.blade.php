<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity 2</title>
</head>
<body>
@if($model->getUsername() == 'mark')
    <h3>Mark you have logged in successfully.</h3>
@else
    <h3>Someone besides mark logged in successfully.</h3>
@endif
</body>
</html>
