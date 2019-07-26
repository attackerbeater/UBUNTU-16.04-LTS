@extends('template')
 
@section('content')
<div class="card uper">
   <div class="card-header">
      Add Item
   </div>
   <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
      <br />
      @endif
      <form method="post" action="{{ route('form.store') }}">
         <div class="form-group">
            @csrf
            <label for="name">Item Name:</label>
            <input type="text" class="form-control" name="item_name"/>
         </div>
         <div class="form-group">
            <label for="price">SKU Number :</label>
            <input type="text" class="form-control" name="sku_no"/>
         </div>
         <div class="form-group">
            <label for="quantity">Item Price :</label>
            <input type="text" class="form-control" name="price"/>
         </div>
         <button type="submit" class="btn btn-primary">Create Item</button>
      </form>
   </div>
</div> 
@endsection