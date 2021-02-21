@extends('layouts.appmaster')
@section('title', 'Login Page')
@section('content')
<h1>Login</h1>
<form action="dologin2" method="post">
    @csrf
    <input type="text" name="username">
    <?php echo $errors->first('username') ?>
    <input type="password" name="password">
    <?php echo $errors->first('password') ?>
    <button type="submit">Submit</button>
</form>
@endsection
