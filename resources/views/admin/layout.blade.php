<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-Makhtoof</title>
    <link href="{{ asset('admin/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap-rtl.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/rtl.css" rel="stylesheet')}}" />
    <link href="{{ asset('admin/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/custom.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>
</head>

<body>
<div id="">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('index')}}">لوحة الاعدادات</a>
        </div>
        <div style="color: white;padding: 8px 50px 5px 50px;float: left;font-size: 16px;">
            {{Auth::user()->firstName}} &nbsp;
            <button class="btn btn-primary" data-toggle="modal" data-target="#editAccount">
                تعديل البيانات
            </button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#logout">
                تسجيل الخروج
            </button>
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img class="user-image img-responsive" />
                </li>
                @if ( Request::route()->getName()=="index")
                    <li>
                        <a class="active-menu" href="{{route('index')}}"><i class="fa fa-sitemap fa-3x"></i>الصفحة الرئيسية</a>
                    </li>
                @else
                    <li>
                        <a href="{{route('index')}}"><i class="fa fa-sitemap fa-3x"></i>الصفحة الرئيسية</a>
                    </li>
                @endif

                @if ( Request::route()->getName()=="allposts" || Request::route()->getName()=="newposts" || Request::route()->getName()=="feedback")
                     <li>
                        <a class="active-menu" href="#"><i class="fa fa-sitemap fa-3x"></i>متابعة المنشورات <span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('allposts')}}">&nbsp; &nbsp; &nbsp; &nbsp; كل المنشورات </a>
                            </li>
                            <li>
                                <a href="{{route('newposts')}}">&nbsp; &nbsp; &nbsp; &nbsp; المنشورات الجديدة </a>
                            </li>

                        </ul>
                    </li>
                @else
                    <li>
                        <a  href="#"><i class="fa fa-sitemap fa-3x"></i>متابعة المنشورات <span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('allposts')}}">&nbsp; &nbsp; &nbsp; &nbsp; كل المنشورات </a>
                            </li>
                            <li>
                                <a href="{{route('newposts')}}">&nbsp; &nbsp; &nbsp; &nbsp; المنشورات الجديدة </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if ( Request::route()->getName()=="editweb_home" || Request::route()->getName()=="adminaboutus")
                    <li>
                        <a class="active-menu" href="#"><i class="fa fa-sitemap fa-3x"></i>تعديل محتوى الموقع<span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('editweb_home')}}">&nbsp; &nbsp; &nbsp; &nbsp; الصفحة الرئيسية</a>
                            </li>
                            <li>
                                <a href="{{route('adminaboutus')}}">&nbsp; &nbsp; &nbsp; &nbsp; من نحن</a>
                            </li>
    
                        </ul>
                    </li>
                @else
                    <li>
                        <a  href="#"><i class="fa fa-sitemap fa-3x"></i>تعديل محتوى الموقع<span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('editweb_home')}}">&nbsp; &nbsp; &nbsp; &nbsp; الصفحة الرئيسية</a>
                            </li>
                            <li>
                                <a href="{{route('adminaboutus')}}">&nbsp; &nbsp; &nbsp; &nbsp; من نحن</a>
                            </li>
    
                        </ul>
                    </li>
                @endif



                
                
            </ul>
        </div>
    </nav>

    @yield('content')


<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="basicModal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('editadmin')}}" method="post"  novalidate>
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><b>تعديل بيانات الحساب</b></h4>
                </div>
                <div class="modal-body-popup">
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="validationCustomfName">الاسم <span
                                        class="red-star"><sup></sup></span></label>

                            <input class="form-control" name="name" oninvalid="this.setCustomValidity('اسم المسئول مطلوب')"  value=" {{Auth::user()->name}} "
                                   oninput="this.setCustomValidity('')" />
                        </div>
                        <div class="form-group ">
                            <label for="validationCustomfName">لايميل <span
                                        class="red-star"><sup></sup></span></label>
                            <input class="form-control" name="email" oninvalid="this.setCustomValidity('اسم المستحدم مطلوب')" value=" {{Auth::user()->email}} "
                                   oninput="this.setCustomValidity('')" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer-popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                    <button type="button" class="btn btn-default" data-toggle="modal"
                            data-target="#editPassword">تعديل كلمة السر</button>

                    <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal -- Edit password -->
<div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="basicModal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('editpassword')}}" method="post"  novalidate>
                {{csrf_field()}}
                <input type="hidden" value="{{Auth::user()->id}}" name="id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><b>تعديل كلمة المرور </b></h4>
                </div>
                <div class="modal-body-popup">
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="validationCustomPass">ادخل كلمة المرور الحالية <span
                                        class="red-star"><sup></sup></span></label>
                            <input class="form-control" type="password" minlength="8" name="oldpass"
                                   oninvalid="this.setCustomValidity('ادخل كلمة مرور اكبر من 8 احرف')"
                                   oninput="this.setCustomValidity('')" />
                        </div>
                        <div class="form-group ">
                            <label for="validationCustomPass">ادخل كلمة المرور الجديدة <span
                                        class="red-star"><sup></sup></span></label>
                            <input class="form-control" type="password" minlength="8" name="newpass"
                                   oninvalid="this.setCustomValidity('ادخل كلمة مرور اكبر من 8 احرف')"
                                   oninput="this.setCustomValidity('')" />
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

<!-- Modal -- logout -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('logoutadmin')}}" method="post"  novalidate>
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><b>تسجيل الخروج</b></h4>
                </div>
                <div class="modal-body-popup">
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="validationCustomfName">هل تريد تسجيل الخروج ؟ <span
                                        class="red-star"><sup></sup></span></label>

                        </div>
                    </div>
                </div>
                <div class="modal-footer-popup">
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                    <a class="btn btn-success" href="{{route('logoutadmin')}}">تسجيل الخروج</a>
                </div>
            </form>
        </div>
    </div>
</div>



</body>
<script src="{{ asset('admin/js/jquery-1.10.2.js')}}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/js/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('admin/js/morris/raphael-2.1.0.min.js')}}"></script>
<script src="{{ asset('admin/js/morris/morris.js')}}"></script>
<script src="{{ asset('admin/js/custom.js')}}"></script>
<script src="{{ asset('admin/js/jquery-1.7.1.min.js')}}"></script>
<script src="{{ asset('admin/js/jquery-1.9.1.js')}}"></script>

</html>
<!-- DATA TABLE SCRIPTS -->
<script src="{{ asset('admin/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin/js/dataTables/dataTables.bootstrap.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });  
</script>           