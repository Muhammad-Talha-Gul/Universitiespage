<h4 class="m-t-0 header-title"><b>Course List</b></h4>
    <table id="datatable" class="table hover yajra-datatable">
        <thead>
        <tr>
            <th>Course Name</th>
            <th>University Name</th>
            <th>Subject</th>
            <th>Qualification</th>
            <th>Popular</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody class="mc">
        @if(count($data) > 0)
        @foreach($data as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{(!empty($value->university))?$value->university->name:''}}</td>
                <td>{{($value->subject->name)??''}}</td>
                <td>{{(singleQualification($value->qualification) !== null)?singleQualification($value->qualification)->title:''}}</td>
                <td valign="middle">
                    <div class="form-group">
                        <input id="comment_Approvel{{$value->id}}" class="mark_featured" onclick="popular('{{$value->id}}')" switch="primary" data-id="{{$value->university_id}}" type="checkbox" @if($value->popular == 1) checked="checked" @endif>
                        <label for="comment_Approvel{{$value->id}}" data-on-label="Yes" data-off-label="No"></label>
                        <span class="loader"></span>
                    </div>
                </td>
                <td>{{$value->created_at}}</td>
                <td>
                    @if(check_access(Auth::user()->id,'course','_edit')==1)<a href="{{url('admin/course/'.$value->id.'/edit')}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    @endif
                    @if(check_access(Auth::user()->id,'course','_delete')==1)<a class="btn btn-danger btn-xs"  onclick="deleteit({{$value->id}})"><i class="fa fa-trash"></i></a>
                    <form action="{{route('course.destroy',$value['id'])}}" method="POST" id="delete-form-{{$value->id}}">
                        <input type="hidden" name="_method" value="DELETE">
                        {{csrf_field()}}
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
                <div> <!-- by sadam -->
                    
                    <?php 
                    if($xmlCourses)
                    { 
                        
                        $baseURL = "https://www.universitiespage.com/";
                        $string = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
                        
                        foreach($xmlCourses as $slug)
                        { 
                            $string .= '<url>';
                            $string .= '<loc>'.$baseURL.'courses/'.(isset($slug->id)? $slug->id : '').'</loc>';
                            $string .= '<lastmod>'.date('Y-m-d').'</lastmod>';
                            $string .= '</url>';
                            
                        }
                        
                        $string .='</urlset>';
                        file_put_contents("course_sitemap.xml", $string);
                    
                    }
                   ?>
                </div> <!-- end by sadam -->
{{ $data->links() }}
        @endif

        @if(count($uni) > 0)
        @foreach($uni as $value)
           @foreach($value->courses as $val)
            <tr>
                <td>{{$val->name}}</td>
                <td>{{(!empty($value->name))?$value->name:''}}</td>
                <td>{{($val->subject->name)??''}}</td>
                <td>{{(singleQualification($val->qualification) !== null)?singleQualification($val->qualification)->title:''}}</td>
                <td valign="middle">
                    <div class="form-group">
                        <input id="comment_Approvel{{$val->id}}" class="mark_featured" onclick="popular('{{$val->id}}')" switch="primary" data-id="{{$value->university_id}}" type="checkbox" @if($value->popular == 1) checked="checked" @endif>
                        <label for="comment_Approvel{{$val->id}}" data-on-label="Yes" data-off-label="No"></label>
                        <span class="loader"></span>
                    </div>
                </td>
                <td>{{$val->created_at}}</td>
                <td>
                    @if(check_access(Auth::user()->id,'course','_edit')==1)<a href="{{url('admin/course/'.$val->id.'/edit')}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    @endif
                    @if(check_access(Auth::user()->id,'course','_delete')==1)<a class="btn btn-danger btn-xs"  onclick="deleteit({{$val->id}})"><i class="fa fa-trash"></i></a>
                    <form action="{{route('course.destroy',$value['id'])}}" method="POST" id="delete-form-{{$val->id}}">
                        <input type="hidden" name="_method" value="DELETE">
                        {{csrf_field()}}
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        @endforeach

        </tbody>
    </table>
    {{ $uni->links() }}
@endif