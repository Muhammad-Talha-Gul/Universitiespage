@extends('layouts.backend')
@section('customStyles')
<style type="text/css">
    table tr td {vertical-align: middle !important; padding: 5px 8px;width: 12%}
    td.module {font-size: 16px; cursor: pointer;}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Group </h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="{{url('/admin/home')}}">Admin</a>
                    </li>
                    <li class="active">
                        Edit Group
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('groups.update',$data['id'])}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name*</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" placeholder="Group Name" class="form-control" required value="{{$data['name']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-colored-full table-full-teal table-hover">
                                <thead>
                                    <tr>
                                        <th>Module</th>
                                        <th>Show</th>
                                        <th>Create</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Import</th>
                                        <th>Show Email</th>
                                        <th>Show Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($types as $key => $value)
                                    <tr>
                                        <td class="module" data-id="{{$value->slug}}">{{$value->name}}</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox{{$key}}29" class="c-{{$value->slug}}" name="modules[{{$value->slug}}][_show]" type="checkbox" value="1" @isset($modules[$value->slug][0]['_show']) {{($modules[$value->slug][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox{{$key}}29"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox{{$key}}30" class="c-{{$value->slug}}" name="modules[{{$value->slug}}][_create]" type="checkbox" value="1" @isset($modules[$value->slug][0]['_create']) {{($modules[$value->slug][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox{{$key}}30"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox{{$key}}31" class="c-{{$value->slug}}" name="modules[{{$value->slug}}][_edit]" type="checkbox" value="1" @isset($modules[$value->slug][0]['_edit']) {{($modules[$value->slug][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox{{$key}}31"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox{{$key}}32" class="c-{{$value->slug}}" name="modules[{{$value->slug}}][_delete]" type="checkbox" value="1" @isset($modules[$value->slug][0]['_delete']) {{($modules[$value->slug][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox{{$key}}32"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox{{$key}}33" disabled type="checkbox" value="1">
                                                <label for="checkbox{{$key}}33"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox{{$key}}34" disabled type="checkbox" value="1">
                                                <label for="checkbox{{$key}}34"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox{{$key}}35" disabled type="checkbox" value="1">
                                                <label for="checkbox{{$key}}35"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="module" data-id="sliders">Sliders</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox29" class="c-sliders" name="modules[sliders][_show]" type="checkbox" value="1" @isset($modules['sliders'][0]['_show']) {{($modules['sliders'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox29"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox30" class="c-sliders" name="modules[sliders][_create]" type="checkbox" value="1" @isset($modules['sliders'][0]['_create']) {{($modules['sliders'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox30"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox31" class="c-sliders" name="modules[sliders][_edit]" type="checkbox" value="1" @isset($modules['sliders'][0]['_edit']) {{($modules['sliders'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox31"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox32" class="c-sliders" name="modules[sliders][_delete]" type="checkbox" value="1" @isset($modules['sliders'][0]['_delete']) {{($modules['sliders'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox32"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox33" name="modules[sliders][_import]" type="checkbox" value="1" disabled="">
                                                <label for="checkbox33"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox34" name="modules[sliders][show_email]" type="checkbox" value="1" disabled="">
                                                <label for="checkbox34"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox35" name="modules[sliders][show_phone]" type="checkbox" value="1" disabled="">
                                                <label for="checkbox35"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="plan">Plan</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox1" class="c-plan" name="modules[plan][_show]" type="checkbox" value="1" @isset($modules['plan'][0]['_show']) {{($modules['plan'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox2" class="c-plan" name="modules[plan][_create]" type="checkbox" value="1" @isset($modules['plan'][0]['_create']) {{($modules['plan'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox3" class="c-plan" name="modules[plan][_edit]" type="checkbox" value="1" @isset($modules['plan'][0]['_edit']) {{($modules['plan'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox3"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox4" class="c-plan" name="modules[plan][_delete]" type="checkbox" value="1" @isset($modules['plan'][0]['_delete']) {{($modules['plan'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox4"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox5" disabled="" name="modules[plan][_import]" type="checkbox" value="1" @isset($modules['plan'][0]['_import']) {{($modules['plan'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox5"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox6" disabled="" name="modules[plan][show_email]" type="checkbox" value="1" @isset($modules['plan'][0]['show_email']) {{($modules['plan'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox6"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox7" disabled="" name="modules[plan][show_phone]" type="checkbox" value="1" @isset($modules['plan'][0]['show_phone']) {{($modules['plan'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox7"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="university">University</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox8" class="c-university" name="modules[university][_show]" type="checkbox" value="1" @isset($modules['university'][0]['_show']) {{($modules['university'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox8"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox9" class="c-university" name="modules[university][_create]" type="checkbox" value="1" @isset($modules['university'][0]['_create']) {{($modules['university'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox9"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox10" class="c-university" name="modules[university][_edit]" type="checkbox" value="1" @isset($modules['university'][0]['_edit']) {{($modules['university'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox10"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox11" class="c-university" name="modules[university][_delete]" type="checkbox" value="1" @isset($modules['university'][0]['_delete']) {{($modules['university'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox11"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox12" disabled="" name="modules[university][_import]" type="checkbox" value="1" @isset($modules['university'][0]['_import']) {{($modules['university'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox12"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox13" disabled="" name="modules[university][show_email]" type="checkbox" value="1" @isset($modules['university'][0]['show_email']) {{($modules['university'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox13"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox14" disabled="" name="modules[university][show_phone]" type="checkbox" value="1" @isset($modules['university'][0]['show_phone']) {{($modules['university'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox14"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="consultant">Consultant</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox22" class="c-consultant" name="modules[consultant][_show]" type="checkbox" value="1" @isset($modules['consultant'][0]['_show']) {{($modules['consultant'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox22"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox23" class="c-consultant" name="modules[consultant][_create]" type="checkbox" value="1" @isset($modules['consultant'][0]['_create']) {{($modules['consultant'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox23"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox24" class="c-consultant" name="modules[consultant][_edit]" type="checkbox" value="1" @isset($modules['consultant'][0]['_edit']) {{($modules['consultant'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox24"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox25" class="c-consultant" name="modules[consultant][_delete]" type="checkbox" value="1" @isset($modules['consultant'][0]['_delete']) {{($modules['consultant'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox25"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox26" disabled="" name="modules[consultant][_import]" type="checkbox" value="1" @isset($modules['consultant'][0]['_import']) {{($modules['consultant'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox26"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox27" disabled="" name="modules[consultant][show_email]" type="checkbox" value="1" @isset($modules['consultant'][0]['show_email']) {{($modules['consultant'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox27"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox28" disabled="" type="checkbox" value="1" @isset($modules['consultant'][0]['show_phone']) {{($modules['consultant'][0]['show_phone']==1)?'checked':''}} @endisset name="modules[consultant][show_phone]">
                                                <label for="checkbox28"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="course">Course</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox36" class="c-course" name="modules[course][_show]" type="checkbox" value="1" @isset($modules['course'][0]['_show']) {{($modules['course'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox36"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox37" class="c-course" name="modules[course][_create]" type="checkbox" value="1" @isset($modules['course'][0]['_create']) {{($modules['course'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox37"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox38" class="c-course" name="modules[course][_edit]" type="checkbox" value="1" @isset($modules['course'][0]['_edit']) {{($modules['course'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox38"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox39" class="c-course" name="modules[course][_delete]" type="checkbox" value="1" @isset($modules['course'][0]['_delete']) {{($modules['course'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox39"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox40" disabled="" name="modules[course][_import]" type="checkbox" value="1" @isset($modules['course'][0]['_import']) {{($modules['course'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox40"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox41" disabled="" name="modules[course][show_email]" type="checkbox" value="1" @isset($modules['course'][0]['show_email']) {{($modules['course'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox41"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox42" disabled="" name="modules[course][show_phone]" type="checkbox" value="1" @isset($modules['course'][0]['show_phone']) {{($modules['course'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox42"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="student">Student</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox43" class="c-student" name="modules[student][_show]" type="checkbox" value="1" @isset($modules['student'][0]['_show']) {{($modules['student'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox43"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox44" class="c-student" name="modules[student][_create]" type="checkbox" value="1" @isset($modules['student'][0]['_create']) {{($modules['student'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox44"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input class="c-student" name="modules[student][_edit]" id="checkbox45" type="checkbox" value="1" @isset($modules['student'][0]['_edit']) {{($modules['student'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox45"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input class="c-student" name="modules[student][_delete]" id="checkbox46" type="checkbox" value="1" @isset($modules['student'][0]['_delete']) {{($modules['student'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox46"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input disabled="" name="modules[student][_import]" id="checkbox47" type="checkbox" value="1" @isset($modules['student'][0]['_import']) {{($modules['student'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox47"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input disabled="" name="modules[student][show_email]" id="checkbox48" type="checkbox" value="1" @isset($modules['student'][0]['show_email']) {{($modules['student'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox48"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input disabled="" name="modules[student][show_phone]" id="checkbox49" type="checkbox" value="1" @isset($modules['student'][0]['show_phone']) {{($modules['student'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox49"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="pages">Pages</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox65" class="c-pages" name="modules[pages][_show]" type="checkbox" value="1" @isset($modules['pages'][0]['_show']) {{($modules['pages'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox65"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox65" class="c-pages" name="modules[pages][_create]" type="checkbox" value="1" @isset($modules['pages'][0]['_create']) {{($modules['pages'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox65"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox66" class="c-pages" name="modules[pages][_edit]" type="checkbox" value="1" @isset($modules['pages'][0]['_edit']) {{($modules['pages'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox66"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox67" class="c-pages" name="modules[pages][_delete]" type="checkbox" value="1" @isset($modules['pages'][0]['_delete']) {{($modules['pages'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox67"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox68" disabled="" name="modules[pages][_import]" type="checkbox" value="1" @isset($modules['pages'][0]['_import']) {{($modules['pages'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox68"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox69" disabled="" name="modules[pages][show_email]" type="checkbox" value="1" @isset($modules['pages'][0]['show_email']) {{($modules['pages'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox69"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox70" disabled="" name="modules[pages][show_phone]" type="checkbox" value="1" @isset($modules['pages'][0]['show_phone']) {{($modules['pages'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox70"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="users">Users</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox71" class="c-users" name="modules[users][_show]" type="checkbox" value="1" @isset($modules['users'][0]['_show']) {{($modules['users'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox71"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox72" class="c-users" name="modules[users][_create]" type="checkbox" value="1" @isset($modules['users'][0]['_create']) {{($modules['users'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox72"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox73" class="c-users" name="modules[users][_edit]" type="checkbox" value="1" @isset($modules['users'][0]['_edit']) {{($modules['users'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox73"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox74" class="c-users" name="modules[users][_delete]" type="checkbox" value="1" @isset($modules['users'][0]['_delete']) {{($modules['users'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox74"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox75" disabled="" name="modules[users][_import]" type="checkbox" value="1" @isset($modules['users'][0]['_import']) {{($modules['users'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox75"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox76" disabled="" name="modules[users][show_email]" type="checkbox" value="1" @isset($modules['users'][0]['show_email']) {{($modules['users'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox76"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox77" disabled="" name="modules[users][show_phone]" type="checkbox" value="1" @isset($modules['users'][0]['show_phone']) {{($modules['users'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox77"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="groups">Users Groups</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox78" class="c-groups" name="modules[groups][_show]" type="checkbox" value="1" @isset($modules['groups'][0]['_show']) {{($modules['groups'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox78"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox79" class="c-groups" name="modules[groups][_create]" type="checkbox" value="1" @isset($modules['groups'][0]['_create']) {{($modules['groups'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox79"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox80" class="c-groups" name="modules[groups][_edit]" type="checkbox" value="1" @isset($modules['groups'][0]['_edit']) {{($modules['groups'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox80"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox81" class="c-groups" name="modules[groups][_delete]" type="checkbox" value="1" @isset($modules['groups'][0]['_delete']) {{($modules['groups'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox81"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox82" disabled="" name="modules[groups][_import]" type="checkbox" value="1" @isset($modules['groups'][0]['_import']) {{($modules['groups'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox82"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox83" disabled="" name="modules[groups][show_email]" type="checkbox" value="1" @isset($modules['groups'][0]['show_email']) {{($modules['groups'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox83"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox84" disabled="" name="modules[groups][show_phone]" type="checkbox" value="1" @isset($modules['groups'][0]['show_phone']) {{($modules['groups'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox84"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="blog">Blog</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox50" class="c-blog" name="modules[blog][_show]" type="checkbox" value="1" @isset($modules['blog'][0]['_show']) {{($modules['blog'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox50"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox51" class="c-blog" name="modules[blog][_create]" type="checkbox" value="1" @isset($modules['blog'][0]['_create']) {{($modules['blog'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox51"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox52" class="c-blog" name="modules[blog][_edit]" type="checkbox" value="1" @isset($modules['blog'][0]['_edit']) {{($modules['blog'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox52"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox54" class="c-blog" name="modules[blog][_delete]" type="checkbox" value="1" @isset($modules['blog'][0]['_delete']) {{($modules['blog'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox54"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox55" disabled="" name="modules[blog][_import]" type="checkbox" value="1" @isset($modules['blog'][0]['_import']) {{($modules['blog'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox55"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox56" disabled="" name="modules[blog][show_email]" type="checkbox" value="1" @isset($modules['blog'][0]['show_email']) {{($modules['blog'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox56"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox57" disabled="" name="modules[blog][show_phone]" type="checkbox" value="1" @isset($modules['blog'][0]['show_phone']) {{($modules['blog'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox57"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="forum">Forum</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox50" class="c-forum" name="modules[forum][_show]" type="checkbox" value="1" @isset($modules['forum'][0]['_show']) {{($modules['forum'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox50"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox51" class="c-forum" name="modules[forum][_create]" type="checkbox" value="1" @isset($modules['forum'][0]['_create']) {{($modules['forum'][0]['_create']==1)?'checked':''}} @endisset>
                                                <label for="checkbox51"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox52" class="c-forum" name="modules[forum][_edit]" type="checkbox" value="1" @isset($modules['forum'][0]['_edit']) {{($modules['forum'][0]['_edit']==1)?'checked':''}} @endisset>
                                                <label for="checkbox52"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox54" class="c-forum" name="modules[forum][_delete]" type="checkbox" value="1" @isset($modules['forum'][0]['_delete']) {{($modules['forum'][0]['_delete']==1)?'checked':''}} @endisset>
                                                <label for="checkbox54"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox55" disabled="" name="modules[forum][_import]" type="checkbox" value="1" @isset($modules['forum'][0]['_import']) {{($modules['forum'][0]['_import']==1)?'checked':''}} @endisset>
                                                <label for="checkbox55"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox56" disabled="" name="modules[forum][show_email]" type="checkbox" value="1" @isset($modules['forum'][0]['show_email']) {{($modules['forum'][0]['show_email']==1)?'checked':''}} @endisset>
                                                <label for="checkbox56"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox57" disabled="" name="modules[forum][show_phone]" type="checkbox" value="1" @isset($modules['forum'][0]['show_phone']) {{($modules['forum'][0]['show_phone']==1)?'checked':''}} @endisset>
                                                <label for="checkbox57"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="settings">Settings</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox85" type="checkbox" value="1" class="c-settings" name="modules[settings][_show]" @isset($modules['settings'][0]['_show']) {{($modules['settings'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox85"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox86" disabled type="checkbox" value="1">
                                                <label for="checkbox86"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox87" disabled type="checkbox" value="1">
                                                <label for="checkbox87"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox88" disabled type="checkbox" value="1">
                                                <label for="checkbox88"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox89" disabled type="checkbox" value="1">
                                                <label for="checkbox89"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox90" disabled type="checkbox" value="1">
                                                <label for="checkbox90"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox91" disabled type="checkbox" value="1">
                                                <label for="checkbox91"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="module" data-id="additionals">Additionals</td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox92" type="checkbox" value="1" class="c-additionals" name="modules[additionals][_show]" @isset($modules['additionals'][0]['_show']) {{($modules['additionals'][0]['_show']==1)?'checked':''}} @endisset>
                                                <label for="checkbox92"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox93" disabled type="checkbox" value="1">
                                                <label for="checkbox93"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox94" disabled type="checkbox" value="1">
                                                <label for="checkbox94"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox95" disabled type="checkbox" value="1">
                                                <label for="checkbox95"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox96" disabled type="checkbox" value="1">
                                                <label for="checkbox96"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox97" disabled type="checkbox" value="1">
                                                <label for="checkbox97"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox checkbox-primary">
                                                <input id="checkbox98" disabled type="checkbox" value="1">
                                                <label for="checkbox98"></label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-box table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="{{route('groups.index')}}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
@section('customScripts')
<script type="text/javascript">
    $(".module").click(function(){
        var checkBoxs = $(':checkbox.c-'+$(this).data('id'));
        checkBoxs.prop('checked',!checkBoxs.prop('checked'));
    });
</script>
@endsection