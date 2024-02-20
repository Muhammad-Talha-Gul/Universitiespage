@extends('layouts.frontend')
@section('title','404 Error')
@section('customStyles')
<style type="text/css">
	@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
		.page-not-found h2 {
			font-size: 30px;
		}
		.page-not-found h3 {
		    margin-bottom: 2em;
		}
	}
</style>
{{-- <script type="text/javascript">
	console.log({{ $exception->getMessage() }});
</script> --}}
@endsection
@section('content')
<section class="content-wrapper">
  <div class="container" style="margin: 10px;margin-bottom: 50px;">
    <div class="std">
      <div class="page-not-found wow bounceInRight animated">
        <h2>Something went wrong!!!</h2>
        <h3>Go back and make sure every thing is alright</h3>
        <div><a href="{{ URL::previous() }}" class="btn-home"><span>Go Back</span></a></div>
      </div>
    </div>
  </div>
</section>
@endsection