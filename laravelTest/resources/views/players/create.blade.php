@extends('template')
 
@section('content')

<h1>Create New Player</h1>
<div class="container">
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
  <form method="POST" action="/players">
    @csrf
    <div>
       <label >Player Name</label>
       <input type="text" name="name" placeholder="Player Name">
    </div>
    <div>
       <label >Player Sport</label>
       <textarea name="sport" placeholder="Player Sport"></textarea>
    </div>
    <div>
       <label >Player Country</label>
       <textarea name="country" placeholder="Player Country"></textarea>
    </div>
    <div>
       <input type="submit" value="Make Player">
    </div>
  </form>
</div> 
@endsection