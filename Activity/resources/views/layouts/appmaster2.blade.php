<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="resources/assets/css/styles.css">
</head>
<body>
@include('layouts.header2')
<div align="center">
    @yield('content')
</div>
</body>
