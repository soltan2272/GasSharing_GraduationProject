@extends('admin.layout')
@section('content')
        <!-- /. NAV TOP  -->

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-6">
                        <h2>منشورات جديدة تحتاج للموافقة</h2>
                        <h5></h5>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                جدول المسئولين
                            </div> -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th width="10%">
                                                    <span class="tbl-data">كود </span>
                                                </th>
                                                <th width="20%">
                                                    <span class="tbl-data"> من محافظة </span>
                                                </th>
                                                <th width="20%">
                                                    <span class="tbl-data">  الى محافظة </span>
                                                </th>
                                                <th width="30%">
                                                    <!-- <span clas="tbl-data">
                                                        <button class="btn btn-success add-admin-btn"
                                                            data-toggle="modal" data-target="#addAdmin">
                                                            اضافة مسئول
                                                        </button>
                                                    </span> -->
                                                </th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td width="10%">
                                                    <span class="tbl-data"> {{$post->id}} </span>
                                                </td>
                                                <td width="20%">
                                                    <span class="tbl-data"> {{$post->from}} </span>
                                                </td>
                                                <td width="20%">
                                                    <span class="tbl-data"> {{$post->to}} </span>
                                                </td>
                                                <td width="30%">
                                                    <div class="form-group row-option">
                                                        <button type="button" value="{{$post->id}},{{$post->from}},{{$post->to}},{{$post->addressdetails}},{{$post->time}},{{$post->date}},{{$post->moredetails}},{{$post->carid}},{{$post->car->modell}},{{$post->car->url}}" class="btn btn-primary options-admin-btn"
                                                            data-toggle="modal" data-target="#viewPost">المنشور</button>
                                                        <button type="button" value="{{$post->id}}" class="btn btn-success options-admin-btn"
                                                            data-toggle="modal" data-target="#acceptPost">قبول</button>
                                                        <button type="button" class="btn btn-danger options-admin-btn"
                                                            data-toggle="modal" value="{{$post->id}}" data-target="#refusePost">رفض</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -- viewPost  -->
        <div class="modal fade" id="viewPost" tabindex="-1" role="dialog" aria-labelledby="basicModal"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <script type="text/javascript"> $("button").click(function() { var fired_button = $(this).val(); var res = fired_button.split(",");
                            document.getElementById('myModalLabel').innerHTML = res[0];document.getElementById('nm').innerHTML = res[1];
                            document.getElementById('age').innerHTML = res[2];document.getElementById('gender').innerHTML = res[3];
                            document.getElementById('blood').innerHTML = res[4];document.getElementById('governate').innerHTML = res[5];
                            document.getElementById('city').innerHTML = res[6];document.getElementById('street').innerHTML = res[7];
                            document.getElementById('other').innerHTML = res[8];document.getElementById('img').src ="/images/cars/"+res[9];
                        }); </script>



                    <form>

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <input type="hidden" id="xyz" value="">
                            <h4 class="modal-title" id="myModalLabel"><b></b></h4>
                        </div>
                        <!-- <div class="modal-body-popup">
                        <div class="form-row">
                            <div class="form-group ">
                                <label for="validationCustomfName">هل تريد رفض هذاالمنشور ؟ <span
                                        class="red-star"><sup>*</sup></span></label>

                            </div>
                            <div class="form-group ">
                                <label for="validationCustomPass"> اكتب تعليقا  <span
                                        class="red-star"><sup></sup></span></label>
                                <input class="form-control" type="text" >
                            </div>
                        </div>
                    </div> -->

                        <div class="modal-body post-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><b > من :</b><span id="nm"></span></p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b > الى :</b><span id="age"></span></p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-4">
                                    <p><b>مكان بالتفصيل : </b><span id="gender"></span></p>
                                </div>
                                <div class="col-lg-4">
                                    <p><b> الوقت :</b><span id="blood"></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p><b> التاريخ : </b><span id="governate"></span></p>
                                </div>
                                <div class="col-lg-12">
                                    <p><b> التفاصيل :  </b><span id="city"></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><b> رقم السيارة :  </b><span id="street"></span></p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b> الموديل :  </b><span id="other"></span></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <a><img class="post-img rounded" id="img" src=""
                                            style="width: 100%;height: auto;max-width: 100%;" alt="..."></a>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer-popup">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اخفاء</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -- refusePost -->
        <div class="modal fade" id="acceptPost" tabindex="-1" role="dialog" aria-labelledby="basicModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('acceptpost')}}" method="post"  novalidate>
                        {{csrf_field()}}
                        <script type="text/javascript"> $("button").click(function() { var fired_button = $(this).val(); document.getElementById('xyzz').value=fired_button;  }); </script>
                        <input type="hidden" id="xyzz" name="id"  value="" >

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b>قبول المنشور </b></h4>
                        </div>
                        <div class="modal-body-popup">
                            <div class="form-row">
                                هل انت موافق على نشر هذا المنشور ؟
                            </div>
                        </div>
                        <div class="modal-footer-popup">
                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>

                            <button type="submit" class="btn btn-success">قبول</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -- refusePost  -->
        <div class="modal fade" id="refusePost" tabindex="-1" role="dialog" aria-labelledby="basicModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('refusepost')}}" method="post"  novalidate>
                        {{csrf_field()}}
                        <script type="text/javascript"> $("button").click(function() { var fired_button = $(this).val(); document.getElementById('abc').value=fired_button;  }); </script>
                        <input type="hidden" id="abc" name="id"  value="" >

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><b> رفض المنشور</b></h4>
                        </div>
                        <div class="modal-body-popup">
                            <div class="form-row">
                                <div class="form-group ">
                                    <label for="validationCustomfName">هل تريد رفض هذاالمنشور ؟ <span
                                            class="red-star"><sup>*</sup></span></label>

                                </div>
                                <div class="form-group ">
                                    <label for="validationCustomPass"> اكتب تعليقا <span
                                            class="red-star"><sup></sup></span></label>
                                    <input class="form-control" name="msg" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer-popup">
                            <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>

                            <button type="submit" class="btn btn-danger">رفض</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -- Edit account -->
       @endsection