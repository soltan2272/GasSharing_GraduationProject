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
</head>

<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>Gas Share - لوحة الاعدادات</h2>
                <h4>تسجيل الدخول</h4>
                <br><br><br>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default login-panel">
                    <div class="panel-heading">
                        <strong>ادخل البيانات لتسجيل الدخول</strong>
                    </div>
                    <div class="panel-body login-panel-body">
                        <form role="form" action="{{route('loginenter')}}" method="post"  novalidate>
                            {{csrf_field()}}
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="email" class="form-control" placeholder="الايميل" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="كلمة السر" />
                            </div>

                            <input type="submit" style="display: block; margin-right: auto; margin-left: auto;"
                                class="btn btn-success" value="الدخول">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery-1.7.1.min.js"></script>
    <script src="assets/js/jquery-1.9.1.js"></script>
    <script>

    </script>

</body>

</html>