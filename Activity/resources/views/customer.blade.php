@extends('layouts.appmaster')
@section('title', 'Add Customer')
@section('content')
<h1>Add Customer</h1>
<form action="{{route('addcustomer')}}" method="post">
    @csrf
    <label for="firstname">First Name:</label>
    <input id="firstname" type="text" name="firstname">
    <?php echo $errors->first('firstname') ?>
    <label for="lastname">Last Name:</label>
    <input id="lastname" type="text" name="lastname">
    <?php echo $errors->first('lastname') ?>
    <button type="submit">Add Customer</button>
</form>
@endsection
