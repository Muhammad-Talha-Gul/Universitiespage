<nav>
    <div class="container">
      <div class="nav-inner">
        <!-- <div class="logo-small hidden-md hidden-lg"> <a class="logo" title="" href="#">Cart</a> </div> -->
        <!-- mobile-menu -->
        <div class="hidden-desktop" id="mobile-menu">
          <ul class="navmenu">
            <li>
              <div class="menutop">
                <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                <h2>Menu</h2>
              </div>
              <ul class="submenu">
                <li>
                  <ul class="topnav">
                    <li class="level0 nav-10 level-top "> <a class="level-top" href="#"> <span>Home</span> </a> </li>
                    @foreach(getParentCategories('products')->take(6) as $key => $value)
                    <li class="level0 nav-7 level-top parent"> <a class="level-top" href="{{route('category_page',$value->slug)}}"> <span>{{$value->name}}</span> </a>
                      @if(count($value->childrens->where('is_active',1))>0)
                          @component('includes.frontend.sticky_cats',['class'=>'level0','childs'=>$value->childrens])
                          @endcomponent
                      @endif
                    </li>
                    @endforeach
                    @foreach(primaryMenu() as $value)
                    <li class="level0 nav-10 level-top "> <a class="level-top" href="{{$value->url}}"> <span>{{$value->title}}</span> </a> </li>
                    @endforeach
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
          <!--navmenu--> 
        </div>
        
        <!--End mobile-menu -->
        <ul id="nav" class="hidden-xs">
          <li class="level0 nav-5 level-top first" style="background: #782572"> 
            <a href="{{url('/')}}" class="sticky-logo">@if(!empty(getpreferences()['sticky_logo']))
              <img src="{{url(getpreferences()['sticky_logo'])}}">
              @else
              <img src="{{asset('assets_frontend')}}/images/g.png">
              @endif</a> 
            <a class="level-top sticky-cats" href="#" style="color:#fff;"> <span>Shop by Category <span class="glyphicon glyphicon-chevron-down"></span></span> </a>
            <div class="level0-wrapper dropdown-6col" style="display:block !important">
              <div class="level0-wrapper2">
                <div class="nav-block nav-block-center">
                  <ul class="level0">
                    <li class="level3 nav-6-1 parent item has_megamenu" style="display:block">
                       <div class="megamenu">
                        @foreach(getParentCategories('products')->take(12) as $key => $value)
                        <ul class="mlevel1">
                          <li class="{{($key==0)?"first-cat":''}}" id="{{($key==0)?"first-cat":''}}">
                            <a href="{{route('category_page',$value->slug)}}"><span>{{$value->name}} </span></a>
                            @if(count($value->childrens->where('is_active',1))>0)
                                @component('includes.frontend.cats',['class'=>'mlevel2','childs'=>$value->childrens])
                                @endcomponent
                            @endif
                          </li>
                        </ul>
                        @endforeach
                        <ul class="mlevel1">
                          <li class="">
                            <a href="{{route('categories_list')}}"><span><b>View All</b></span></a>
                          </li>
                        </ul>
                      </div>
                      <div class="cats-ads" style="width: 40%;min-height:310px;float: left;padding: 10px;text-align: center;">
                        <h4 style="color: #82bf24;">Advertisment</h4>
                        <div class="banner">
                          <img src="{{asset('assets_frontend')}}/images/banners/1.jpg" style="margin: 0 auto;" width="350" class="img-responsive img-thumbail">
                        </div>
                      </div>
                    </li>
                  </ul>
                  <!--level0--> 
                </div>
              </div>
              <div class="nav-add"></div>
            </div>
          </li>
          <!-- <li id="nav-home" class="level0"><a href="index.html"><span>Home</span> </a>
          </li> -->
          @foreach(primaryMenu() as $value)
          <li class="level0"> <a class="level-top non-sticky" href="{{$value->url}}"> <span>{{$value->title}}</span> </a> </li>
          @endforeach
          <li class="sticky-search hidden-xs">
            <form action="{{route("search")}}" method="GET">
              <div class="form-group" style="padding: 8px;">
                <input type="text" class="search-input" name="q" autocomplete="off" id="sticky-search" placeholder="Search product..." required>
                <a href="javscript:void(0)" class="sticky-search-close" style="display: none;">X</a>
                <button type="submit" class="search-btn-sticky"><span class="glyphicon glyphicon-search"></span></button>
              </div>
            </form>
            <div class="sticky-searched searched" style="display: none;">
              <div id="sticky-load" style="width: 100%; position: relative;"></div>
            </div>
          </li>
          <li class="nav-custom-link level0 pull-right sticky-cart hidden-xs level-top parent"> <a class="level-top" href="{{url('/cart')}}" style="cursor: pointer;"><span> <i class="glyphicon glyphicon-shopping-cart"></i>Cart <i class="cartCount">({{cartCount()}})</i></span></a></li>
        </ul>
      </div>
    </div>
  </nav>