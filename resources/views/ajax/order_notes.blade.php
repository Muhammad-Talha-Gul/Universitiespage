<div class="timeline timeline-left" style="margin-left: 12px;">
    @foreach($notes as $key => $value)
    <article class="timeline-item alt">
        <div class="text-left">
            <div class="time-show first">
                <a href="#" class="btn btn-danger w-lg">{{($key==date('d/M/Y'))?'Today':$key}}</a>
            </div>
        </div>
    </article>
    @foreach($value as $key => $val)
    @php $icon = ""; $note = ""; $user = $val->user->first_name.' '.$val->user->last_name;
        if($val->user_id==Auth::user()->id) { $user="You"; }
        if($val->type=='created') {
            $note = "Order Created." ;
            $icon = "bg-primary";
        } elseif($val->type=='status') {
            $note = $user." Updated Status to ".$val->note;
            $icon = "bg-warning";
        } elseif($val->type=='completed') {
            $note = $user." Completed this Order.";
            $icon = "bg-success";
        } else { $note = $val->note; $icon = "bg-info"; }
    @endphp
    <article class="timeline-item">
        <div class="timeline-desk">
            <div class="panel">
                <div class="timeline-box">
                    <span class="arrow"></span>
                    <span class="timeline-icon {{$icon}}"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                    @if(empty($val->type))
                    <h4 class="text-success">{{$user}}</h4>
                    @endif
                    <p class="timeline-date text-muted"><small>{{date_format($val->created_at,'g:i:s A')}}</small></p>
                    <p>{{$note}}</p>
                </div>
            </div>
        </div>
    </article>
    @endforeach
    @endforeach                    
</div>