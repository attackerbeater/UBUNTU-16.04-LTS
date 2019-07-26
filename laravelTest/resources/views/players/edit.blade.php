@extends('template')
 
@section('content')

<h1 class="title"> Edit Players </h1>
<form method="POST" action="/players/{{ $players->id }}">
   @method('PATCH')
   @csrf
   <div class="field">
      <label class="lable" for="name">Name </label>
      <div class="control">
         <input type="text" class="input" name="name" placeholder="Title" value="{{ $players->name }}" required>
      </div>
   </div>
   <div class="field">
      <label class="lable" for="sport">Sport </label>
      <div class="control">
         <textarea class="textarea" name="sport" required>{{ $players->sport }} </textarea>
      </div>
   </div>
   <div class="field">
      <label class="lable" for="country">Country </label>
      <div class="control">
         <input type="text" class="input" name="country" placeholder="Title" value="{{ $players->country }}" required>
      </div>
   </div>
   <div class="field">
      <div class="control">
         <button type="submit" class="button is-link">Update Player</button>
      </div>
   </div>
</form>
<form method="POST" action="/players/{{ $players->id }}">
   @method('DELETE')
   @csrf
   <div class="field">
      <div class="control">
         <button type="submit" class="button is-link">Delete Player</button>
      </div>
   </div>
</form>

@endsection