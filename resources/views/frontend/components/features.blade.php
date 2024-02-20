
<section class="lap-services-two-area tech-row" @isset($meta['bg']) style="background: url({{url($meta['bg'])}})no-repeat center 0" @endisset>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-6" data-aos="fade-up" data-aos-duration="2100">
                <div class="profession_service_item item-bg item-bg">
                    @isset($meta['img1'])
                    <img src="{{url($meta['img1'])}}">
                    @endisset
                    <h2>{{$meta['title1'] or ''}}</h2>
                    <p>{{$meta['detail1'] or ''}}</p>
                </div>
            </div>
            <div class="col-md-3 col-xs-6" data-aos="fade-up" data-aos-duration="2200">
                <div class="profession_service_item item-bg">
                    @isset($meta['img2'])
                    <img src="{{url($meta['img2'])}}">
                    @endisset
                    <h2>{{$meta['title2'] or ''}}</h2>
                    <p>{{$meta['detail2'] or ''}}</p>
                </div>
            </div>
            <div class="col-md-6 col-xs-6" data-aos="fade-up" data-aos-duration="2300">
                <div class="profession_service_item item-bg">
                    @isset($meta['img3'])
                    <img src="{{url($meta['img3'])}}">
                    @endisset
                    <h2>{{$meta['title3'] or ''}}</h2>
                    <p>{{$meta['detail3'] or ''}}</p>
                </div>
            </div>
           
        </div>
    </div>
</section>