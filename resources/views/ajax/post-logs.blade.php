<div class="timeline">
    @foreach($data as $key => $value)
    <article class="timeline-item alt">
        <div class="text-right">
            <div class="time-show first">
                <a href="#" class="btn btn-danger w-lg">{{($key==date('d/M/Y'))?'Today':$key}}</a>
            </div>
        </div>
    </article>
    @foreach($value as $k => $val)
    @php $icon = ""; $note = ""; $user = $val->user->first_name.' '.$val->user->last_name;
    if($val->user_id==Auth::user()->id) { $user="You"; }
    if($val->type=='created') {
        $note = "Created <b>".$type['name']."</b> as <b>".$val->post_title."</b>";
        $icon = "bg-primary";
    } elseif($val->type=='updated') {
        $note = $user." Updated <b>".$val->post_title."</b>";
        $icon = "bg-warning";
    } elseif($val->type=='deleted') {
        $note = $user." Deleted <b>".$val->post_title."</b>";
        $icon = "bg-danger";
    } else { $note = $val->note; $icon = "bg-info"; }
    @endphp
    <article class="timeline-item {{($k%2==false)?'alt':''}}">
        <div class="timeline-desk">
            <div class="panel">
                <div class="timeline-box">
                    <span class="arrow-alt"></span>
                    <span class="timeline-icon {{$icon}}"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                    <h4 class="">{{$user}}</h4>
                    <p class="timeline-date text-muted"><small>{{date_format($val->created_at,'g:i:s A')}}</small></p>
                    <p>{!!$note!!}</p>
                </div>
            </div>
        </div>
    </article>
    @endforeach
    @endforeach
</div>