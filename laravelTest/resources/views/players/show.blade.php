@extends('template')
 
@section('content')
<br>
<h1 class="title" > Below is the details of player </h1>
<table>
   <tr>
      <td>Name: {{ $player->name }}</td>
   </tr>
   <tr>
      <td>Sport: {{ $player->sport }}</td>
   </tr>
   <tr>
      <td>Country: {{ $player->country }}</td>
   </tr>
</table>
<br>
<p>
   <a href="/players/{{ $player->id }}/edit"> Edit Player </a>
</p>
@endsection