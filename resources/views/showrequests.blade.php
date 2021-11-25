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

        <div class="container">

            @if(isset($myrequests))
                @foreach($myrequests as $myrequest)
                    @if($myrequest->accept != 0)
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
                                                <b>رقم البطاقة الشخصية: <span>{{$myrequest->ssn}}</span></b>
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
                                        <div class="col-lg-12">
                                            <p><b>مكان بالتفصيل
                                                    : </b><span>{{$myrequest->addressdetails}}</span>
                                            </p>
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
                                            <a><img class="rounded" src="/images/{{$myrequest->url}}"
                                                    style="width: 100%;height: auto;max-width: 100%;"
                                                    alt="..."></a>
                                        </div>
                                    </div>
                                    <br><br>
                                    @if($myrequest->accept == 2)
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <a href="{{route('acceptrequest',$myrequest->id)}}"
                                                   style="background-color: green;color: whitesmoke;"
                                                   class="btn  intro-btn profile-btn profile-newPost SubmitOnPost"
                                                   data-target="#IknowHim">قبول الطلب</a>

                                            </div>


                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <a href="{{route('refuserequest',$myrequest->id)}}"
                                                   style="background-color: red;color: whitesmoke;"
                                                   class="btn  intro-btn profile-btn profile-newPost SubmitOnPost"
                                                   data-target="#IknowHim">رفض الطلب</a>


                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>




@endsection