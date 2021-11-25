@extends('layout')
@section('content')

    <div class="container">
        <div class="profile-div">
            <div class="row profile-head">
                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <span><img src="images/{{auth()->user()->url}}"
                               style="width: 120px;height: 120px;border-radius: 100px"></span>
                    <span class="profile-Username"><b>{{auth()->user()->name}}</b></span>
                </div>

            </div>

        </div>
    </div>
    <div class="container">


        @if(isset($myrequests))
            @foreach($myrequests as $myrequest)
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><b>الرحله</b></h5>
                            <div class="dropdown">
                            </div>
                        </div>

                        <div class="modal-body post-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>
                                        <b>الاسم : <span>{{$myrequest->name}}</span></b>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p>
                                        <b>رقم البطاقة الشخصية : <span>{{$myrequest->ssn}}</span></b>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">

                                    <p><b>رقم الموبايل : <span>{{$myrequest->phonenumber}}</span></b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><b>من
                                            : </b><span>{{$myrequest->from}}</span>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>الي
                                            : </b><span>{{$myrequest->to}}</span>
                                    </p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><b>مكان بالتفصيل
                                            : </b><span>{{$myrequest->addressdetails}}</span>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b>سعر الرحله : </b><span>{{$myrequest->price}}</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><b> الوقت
                                            : </b><span>{{$myrequest->time}}</span>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><b> التاريخ
                                            : </b><span>{{$myrequest->date}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <a><img class="rounded" src="/images/cars/{{$myrequest->url}}"
                                            style="width: 100%;height: auto;max-width: 100%;"
                                            alt="..."></a>
                                </div>
                            </div>

                            @if($myrequest->accept == 0)
                                <div class="row">
                                    <div style="height: 30px;width: 100%;padding: 5px;margin-top: 3px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 badge-danger text-center">
                                        <span class="label label-danger font-weight-bold" >تم رفض الطلب</span>

                                    </div>
                                    @elseif($myrequest->accept == 1)
                                        <div style="height: 30px;width: 100%;padding: 5px;margin-top: 3px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 badge-success text-center">
                                            <span class="label label-success font-weight-bold" >تم قبول الطلب</span>

                                        </div>
                                    @else
                                        <div style="height: 30px;width: 100%;padding: 5px;margin-top: 3px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 badge-warning text-center">
                                            <span  class="label label-warning font-weight-bold " >لم يتم الرد بعد</span>

                                        </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                    @endforeach
                    @endif

    </div>




@endsection