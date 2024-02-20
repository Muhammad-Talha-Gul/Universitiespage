@extends('layouts.backend')
@section('customStyles')
<link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
<link href="{{asset("plugins/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@if(check_access(Auth::user()->id,'cities','_show')==1)
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-title-box">
                <h4 class="page-title">Country </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Country
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Select Country Of University</b></h4>
    
                <div class="alert alert-success" style="display:none;margin-top:10px;"><b>Well done!</b> Successfully Saved.</div>
                <div class="alert alert-danger" style="display:none;margin-top:10px;"><b>Oh snap!</b> Something Went Wrong.</div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <div class="form-group m-b-20">
                            <label>Cities</label>
                            <select class="form-control select2 cities multi-select" id="country_selection" multiple> 
                                <option value="" disabled selected>Select Any City</option>
                                @foreach($data as $city)
                                <option value="{{$city->id}}" {{($city->selected == 1)?'selected':''}}>{{$city->country}}</option>
                                @endforeach
                            </select>  
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="card-box table-responsive">
                <div class="row">
                    <div class="col-md-12">
                        <input type="button" class="btn btn-primary save-charges" value="Save">
                    </div>
                </div>
            </div>
		</div>
    </div>
    

</div>
@else
@component('admin.access-denied') @endcomponent
@endif
@endsection
@section('customScripts')
<script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/multiselect/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
<script src="{{asset("plugins/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
         $('#country_selection').multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            afterInit: function (ms) {
                  var that = this,
                      $selectableSearch = that.$selectableUl.prev(),
                      $selectionSearch = that.$selectionUl.prev(),
                      selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                      selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                  that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                      .on('keydown', function (e) {
                          if (e.which === 40) {
                              that.$selectableUl.focus();
                              return false;
                          }
                      });

                  that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                      .on('keydown', function (e) {
                          if (e.which == 40) {
                              that.$selectionUl.focus();
                              return false;
                          }
                      });
            },
            afterSelect: function () {
                  this.qs1.cache();
                  this.qs2.cache();
            },
            afterDeselect: function () {
                  this.qs1.cache();
                  this.qs2.cache();
            }
          });

        var baseUrl = '{{url("/")}}';

        $(document).on('click', '.save-charges', function(){
            var id = $('.cities').val();
            if(id==null || id==''){return false;}
            var data = {'id': id, '_token': '{{csrf_token()}}' };
            $.post(baseUrl+'/admin/cities', data, function(data){
                if(data){
                    $('.alert-success').fadeIn(300).delay(3000).fadeOut(300);
                }else{
                    $('.alert-danger').fadeIn(300).delay(3000).fadeOut(300);
                }
            });
        });
        
    })
</script>
@endsection