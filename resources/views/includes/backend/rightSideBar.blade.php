@if(Auth::user()->user_type=='webnet')
<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="mdi mdi-close-circle-outline"></i>
    </a>
    <h4 class="">Settings</h4>
    <form action="{{ route('updateFunctionality') }}" method="POST">
        {{ csrf_field() }}
    <div class="setting-list nicescroll">
        @foreach(get_Functionalities() as $k => $v)
        <div class="row m-t-20">
            <div class="col-xs-8">
                <h5 class="m-0">{{ ucfirst($v->name) }}</h5>
                <p class="text-muted m-b-0"><small>Do you need {{ ucfirst($v->name) }} ?</small></p>
            </div>
            <div class="col-xs-4 text-right">
                <input type="checkbox" name="{{ $v->name }}" {{ ($v->is_active == 1) ? 'checked' : '' }} data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
            </div>
        </div>
        @endforeach

        <div style="text-align: right; margin-top: 10px;">
            <input type="submit" name="submit" class="btn btn-primary">
        </div>

    </div>
    </form>
</div>
@endif