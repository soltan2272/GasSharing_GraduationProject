@extends('admin.layout')
@section('content')

    <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-6">
                        <h2>المسئولين</h2>
                        <h5></h5>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            @foreach($errors->all() as $error)

                                <div>
                                    <div class="alert alert-danger" id="alert" role="alert">
                                        البريد الالكتروني مستخدم
                                    </div>
                                    <br> <br>
                                </div>
                            @endforeach
                                @if (session('yes'))
                                    @if(session('yes')==2)
                                        <div>
                                            <div class="alert alert-danger" id="alert" role="alert">
                                                خطأ فى كلمة المرور .. حاول مرة اخرى
                                            </div>
                                            <br> <br>
                                        </div>
                                    @endif
                                    @if(session('yes')==3)
                                        <div>
                                            <div class="alert alert-success" id="alert" role="alert">
                                                تم تغيير كلمة المرور بنجاح
                                            </div>
                                            <br> <br>
                                            @endif
                                            @endif
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th width="5%">
                                                    <span class="tbl-data">#</span>
                                                </th>
                                                <th width="30%">
                                                    <span class="tbl-data">الاسم</span>
                                                </th>
                                                <th width="30%">
                                                    <span class="tbl-data"> البريد الالكتروني </span>
                                                </th>
                                                <th width="35%">
                                                    <span clas="tbl-data">
                                                        <button class="btn btn-success add-admin-btn"
                                                            data-toggle="modal" data-target="#addAdmin">
                                                            اضافة مسئول
                                                        </button>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($admin)>0)
                                            @foreach($admin as $adm)
                                                @foreach($adm as $ad)
                                                    @if($ad->id!=Auth::user()->id)
                                            <tr>
                                                <td width="5%">
                                                    {{$ad->id}}
                                                </td>
                                                <td width="30%">
                                                    <span class="tbl-data"> {{$ad->name}}  </span>
                                                </td>
                                                <td width="30%">
                                                    <span class="tbl-data"> {{$ad->email}} </span>
                                                </td>
                                                <td width="35%">
                                                    <div class="form-group row-option">
                                                        <button type="button" value="{{$ad->id}},{{$ad->name}},{{$ad->email}} "  id="editt" class="btn btn-primary options-admin-btn"
                                                            data-toggle="modal" data-target="#editAdmin">تعديل</button>
                                                        <button type="button" value="{{$ad->id}}" class="btn btn-danger options-admin-btn"
                                                            data-toggle="modal" data-target="#delAdmin">حذف</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -- add New Admin -->
        <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="basicModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('addadmin')}}" method="post"  novalidate>
                        {{csrf_field()}}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b>اضافة مسئول جديد</b></h4>
                        </div>
                        <div class="modal-body-popup">
                            <div class="form-row">
                                <div class="form-group ">
                                    <label for="validationCustomfName">الاسم <span
                                            class="red-star"><sup>*</sup></span></label>
                                    <input class="form-control" name="fname" oninvalid="this.setCustomValidity('اسم المسئول مطلوب')"
                                        oninput="this.setCustomValidity('')" required />
                                </div>
                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <input type="email" class="form-control"  name="email"
                                           placeholder="xxx@xxx.xxx" required />
                                </div>

                                <div class="form-group ">
                                    <label for="validationCustomPass">كلمة المرور <span
                                            class="red-star"><sup>*</sup></span></label>
                                    <input class="form-control" name="pass"  type="password" minlength="8"
                                        oninvalid="this.setCustomValidity('ادخل كلمة مرور اكبر من 8 احرف')"
                                        oninput="this.setCustomValidity('')" required />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer-popup">
                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>

                            <button type="submit" class="btn btn-success">اضافة
                                مسئول</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -- Edit Admin -->
        <div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="basicModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('editadmin')}}" method="post"  novalidate>

                    {{csrf_field()}}
                        <script type="text/javascript"> 
                            $("button").click(function() {
                                var fired_button = $(this).val(); 
                                var res = fired_button.split(","); 
                                var name = res[1];
                                document.getElementById('xyz').value=res[0];
                                document.getElementById('fn').value=res[1];
                                document.getElementById('email').value=res[2];
                             });  
                        </script>
                       <input type="hidden" value="" id="xyz" name="id" >
                        <script type="text/javascript">  </script>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b>تعديل بيانات المسئول</b></h4>
                        </div>
                        <div class="modal-body-popup">
                            <div class="form-row">
                                <div class="form-group ">
                                    <label for="validationCustomfName">الاسم <span
                                            class="red-star"><sup>*</sup></span></label>
                                    <input class="form-control" id="fn"  name="name" oninvalid="this.setCustomValidity('اسم المسئول مطلوب')"
                                        oninput="this.setCustomValidity('')" required />
                                </div>
                                <div class="form-group ">
                                    <label for="validationCustomfName">البريد الالكتروني  <span
                                            class="red-star"><sup>*</sup></span></label>
                                    <input type="email"class="form-control" id="email" name="email" required />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer-popup">
                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>

                            <button type="submit" class="btn btn-success">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -- delete Admin -->
        <div class="modal fade" id="delAdmin" tabindex="-1" role="dialog" aria-labelledby="basicModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('deleteadmin')}}" method="post"  novalidate>
                        {{csrf_field()}}
                        <script type="text/javascript"> $("button").click(function() { var fired_button = $(this).val(); document.getElementById('abc').value=fired_button;  /*alert(fired_button);*/ }); </script>
                        <input type="hidden" id="abc" name="id"  value="" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b>حذف المسئول</b></h4>
                        </div>
                        <div class="modal-body-popup">
                            <div class="form-row">
                                <div class="form-group ">
                                    <label for="validationCustomfName">هل تريد حذف المسئول ؟ <span
                                            class="red-star"><sup>*</sup></span></label>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer-popup">
                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>

                            <button type="submit" class="btn btn-success">حذف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection