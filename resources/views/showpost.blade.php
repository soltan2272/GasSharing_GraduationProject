@extends('layout')
@section('content')
<br>
  @if(isset($post))
      @if($post->status=="2")
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>الرحله</b></h5>
              <div class="dropdown">
              </div>
            </div>

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
                <div class="col-lg-6">
                  <p><b>مكان بالتفصيل : </b><span>{{$post->addressdetails}}</span></p>
                </div>
                <div class="col-lg-6">
                  <p><b>سعر الرحله : </b><span>{{$post->price}}</span></p>
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
                <div class="col-lg-12">
                  <p><b> التفاصيل : </b><span> {{$post->moredetails}}</span></p>
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
              </div>
                <br>
                <?php $p = 0; ?>
                @foreach($req_posts as $req_post)
                    @if($post->id == $req_post->journeyid)
                        <?php $p = 1; ?>
                    @endif
                @endforeach
                @if(auth()->user()->id != $post->userid)
                    @if($p == 0)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="{{route('myrequest',$post->id)}}" style="background-color: green;color: whitesmoke;" class="btn  intro-btn profile-btn profile-newPost SubmitOnPost"
                                   data-target="#IknowHim">ارسال طلب</a>

                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="{{route('cancelmyrequest',$post->id)}}" style="background-color: red;color: whitesmoke;" class="btn  intro-btn profile-btn profile-newPost SubmitOnPost"
                                   data-target="#IknowHim">الغاء طلب</a>

                            </div>
                        </div>
                    @endif
                @endif
            </div>
          </div>
        </div>
      @endif
    @else
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body post-body">
          <div class="row">
            <div class="col-lg-12 noPost">
              <img src="{{asset('imgs/nopost.png')}}" width="100px" height="100px">
              <p><br>
                <span> <b>لا يوجد منشورات</b>
                        </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

  @endsection