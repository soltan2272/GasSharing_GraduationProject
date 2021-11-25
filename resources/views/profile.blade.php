@extends('layout')
@section('content')

  <div class="container">
    <div class="profile-div">
      <div class="row profile-head">
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
          <span ><img src="images/{{auth()->user()->url}}" style="width: 120px;height: 120px;border-radius: 100px"></span>
          <span class="profile-Username"><b>{{auth()->user()->name}}</b></span>
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
          <div class="profile-div-btns">
            @if(auth()->user()->category==1)
              <a href="{{route('newpost')}}" ><button class="btn intro-btn profile-btn porfile-hdr-btn profile-newPost">رحلة جديدة
                </button></a>
            <?php $i=0; ?>
              <a href="{{route('showrequests')}}" class="notification"><button
                        class="btn intro-btn profile-btn porfile-hdr-btn profile-newPost">  @if(count($myrequests)>0)
                          @foreach($myrequests as $myrequest)
                              @if($myrequest->accept != 0)<span class="badge"><?php echo ++$i; ?></span>@endif @endforeach @else <span class="badge">0</span> @endif   عرض الطلبات </button></a>
            @else
                  <?php $i=0; ?>
              <a href="{{route('showacceptedrequests')}}" class="notification"><button
                        class="btn intro-btn profile-btn porfile-hdr-btn profile-newPost">  عرض نتائج الطلبات  @if(count($myrequests2)>0)
                    @foreach($myrequests2 as $myrequest)
                      <span class="badge"><?php echo ++$i; ?></span> @endforeach @else <span class="badge">0</span> @endif</button></a>

            @endif
            <a href="/edit"><button
                      class="btn intro-btn profile-btn porfile-hdr-btn profile-editProfile">تعديل الحساب</button></a>

          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="container">

    <div class="container">

      @if(isset($posts))

        @foreach($posts as $post)


          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><b>الرحله</b></h5>
                  <div class="dropdown">
                      @if(auth()->user()->category=="1")
                      <a href="{{Route('edit_post',$post->id)}}"><button
                                  class="btn intro-btn ">تعديل الرحلة</button></a>
                          @endif
                  </div>

              </div>
                <div class="modal-body post-body">
                    @if($post->status==1)
                        <div class="row">
                            <div class="alert alert-info col-lg-8 post-alert" role="alert">
                                في انتظار المراجعه
                            </div>
                        </div>
                    @endif

                    @if($post->	status==2)
                        <div class="alert alert-success col-lg-8 post-alert" role="alert">
                            تم الموافقة على المنشور
                        </div>
                    @endif

                    @if($post->	status==3)
                        <div class="row">
                            <div class="alert alert-danger col-lg-8 post-alert" role="alert">
                                <b>تم رفض المشور الخاص بك <br> قم بتعديله الآن وانتظر الموافقة</b>
                                <br><br>
                                <span class="admin-postMessage">{{$post->message}}</span>
                            </div>
                        </div>
                    @endif

              <div class="modal-body post-body">
                <div class="row">
                  <div class="col-lg-12">

                    <p><b><span>{{$post->user->name}}</span></b></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <p><b>من : </b><span>{{$post->from}}</span></p>
                  </div>
                  <div class="col-lg-6">
                    <p><b>الي : </b><span>{{$post->to}}</span></p>
                  </div>

                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <p><b>مكان بالتفصيل : </b><span>{{$post->addressdetails}}</span></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <p><b> الوقت : </b><span>{{$post->time}}</span></p>
                  </div>
                  <div class="col-lg-6">
                    <p><b> التاريخ : </b><span>{{$post->date}}</span></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <p><b> التفاصيل : </b><span> {{$post->moredetails}}</span></p>
                  </div>
                    <div class="col-lg-6">
                        <p><b>سعر الرحله : </b><span>{{$post->price}}</span></p>
                    </div>

                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <p><b> رقم السياره : </b><span> {{$post->car->ssn}}</span></p>
                  </div>

                  <div class="col-lg-6">
                    <p><b> الموديل : </b><span> {{$post->car->modell}}</span></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a><img class="rounded" src="/images/cars/{{$post->car->url}}" style="width: 100%;height: auto;max-width: 100%;"
                            alt="..."></a>
                  </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="{{route('refusetrip',$post->id)}}"
                           style="background-color: red;color: whitesmoke;margin-top: 3px"
                           class="btn  intro-btn profile-btn profile-newPost SubmitOnPost"
                           data-target="#IknowHim">الغاء الرحله</a>
                    </div>
                </div>


              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
@endsection