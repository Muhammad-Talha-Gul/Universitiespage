@extends('layouts.frontend')
@section('title','Something went wrong')
@section('content')
<div class="container">
	<h2>Something went wrong.</h2>
	<p>Sorry for your inconvenience.We are working hard to make every single thing perfect.</p>
	<p>please contact to your administrator for further information.</p>
</div>
@endsection
@section('customScripts')
<script>
	console.log("{{ $exception->getMessage() }}");
</script>
@endsection