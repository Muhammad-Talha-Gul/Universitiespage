@if(isset($meta['style']))

@if($meta['style'] == 'style1')
  <section class="module--spacing {{$meta['class'] or ''}}" aria-labelledby="goals" >
      <div class="container container--slim">
          <h1 class="hide">{{$meta['title'] or ''}}</h1>
          <div id="goals" class="h1 caps text-center"><span class="text-primary">Learn How You Can Benefit from</span> Universities Page
          </div>
          <div class="module--bottom">
              <ul class="button-group">
              <li><a href="{{(isset($meta['style1']['url1'])? url($meta['style1']['url1']) :'#')}}" class="button">{{$meta['style1']['text1'] or ''}}</a></li>
              <li><a href="{{(isset($meta['style1']['url2'])? url($meta['style1']['url2']) :'#')}}" class="button">{{$meta['style1']['text2'] or ''}}</a></li>
              <li><a href="{{(isset($meta['style1']['url3'])? url($meta['style1']['url3']) :'#')}}" class="button">{{$meta['style1']['text3'] or ''}}</a></li>
              </ul>
          </div>
      </div>
  </section>
@elseif($meta['style'] == 'style2')
  <section class="{{$meta['class'] or ''}}">
    <div class="module--black">
        <div class="container container--slim container--clear">
            <div class="program__search">
            <div class="search__input__container">
              <form action="{{url('students')}}" method="GET">
                  <label for="program-filter" class="hide">{{$meta['style2']['title'] or ''}}</label>
                  <input type="search" id="program-filter" class="search__input" name="search" placeholder="{{$meta['style2']['title'] or ''}}">
                  <div class="search__button">
                    <button class="search__button--icon">
                      <span class=" svgstore svgstore--search">
                          <svg></svg><i class="fa fa-search"></i>                                        
                      </span>
                    </button>
                  </div>
              </form>
            </div>
            <ul class="button-group">
                <li><a href="{{(isset($meta['style2']['url1'])? url($meta['style2']['url1']) :'#')}}" class="button">{{$meta['style2']['text1'] or ''}}</a></li>
                <li><a href="{{(isset($meta['style2']['url2'])? url($meta['style2']['url2']) :'#')}}" class="button">{{$meta['style2']['text2'] or ''}}</a></li>
                <li><a href="{{(isset($meta['style2']['url3'])? url($meta['style2']['url3']) :'#')}}" class="button">{{$meta['style2']['text3'] or ''}}</a></li>
            </ul>
            </div>
        </div>
    </div>
  </section>

@elseif($meta['style'] == 'style3')
  <section class="{{$meta['class'] or ''}}">
    <div class="module--blackish">
        <div class="container container--clear">
            <div class="program__finder">
            <button class="program__finder__expand button-expand">{{$meta['style3']['title'] or ''}} <i class="fa fa-plus"></i></button>
            <ul class="program__finder__content">
                <li><a href="{{(isset($meta['style3']['url1'])? url($meta['style3']['url1']) :'#')}}" class="button">{{$meta['style3']['text1'] or ''}}</a></li>
                <li><a href="{{(isset($meta['style3']['url2'])? url($meta['style3']['url2']) :'#')}}" class="button">{{$meta['style3']['text2'] or ''}}</a></li>
                <li><a href="{{(isset($meta['style3']['url3'])? url($meta['style3']['url3']) :'#')}}" class="button">{{$meta['style3']['text3'] or ''}}</a></li>
                <li><a href="{{(isset($meta['style3']['url4'])? url($meta['style3']['url4']) :'#')}}" class="button">{{$meta['style3']['text4'] or ''}}</a></li>
                <li><a href="{{(isset($meta['style3']['url5'])? url($meta['style3']['url5']) :'#')}}" class="button">{{$meta['style3']['text5'] or ''}}</a></li>
            </ul>
            </div>
        </div>
    </div>
  </section>
@endif

@endif