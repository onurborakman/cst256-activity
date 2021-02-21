@extends('layouts.appmaster')
@section('title', 'Add Order')
@section('content')
    <h1>Add Order</h1>
    <form action="{{route('addorder')}}" method="post">
        @csrf
        <label for="customer_id">Customer ID:</label>
        <input id="customer_id" type="text" name="customer_id" value="{{$nextID}}">
        <?php echo $errors->first('customer_id') ?>
        <br>
        <label for="firstname">First Name:</label>
        <input id="firstname" type="text" name="firstname" value="{{$firstname}}">
        <?php echo $errors->first('firstname') ?>
        <br>
        <label for="customer_id">Last Name:</label>
        <input id="customer_id" type="text" name="lastname" value="{{$lastname}}">
        <?php echo $errors->first('lastname') ?>
        <br>
        <label for="product">Product:</label>
        <input id="product" type="text" name="product">
        <?php echo $errors->first('product') ?>
        <br>
        <button type="submit">Add Order</button>
    </form>
@endsection
