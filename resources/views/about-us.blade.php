@extends('layout')
@section('content')


    @if(count($home)>0)
        @foreach($home as $h)
<div class="container">
    <div class="">
        <div class="row aboutus-row">
            <div class="col-lg-12 ">
                <div class="aboutus-col-hdr aboutus-col-hdr-row">
                  من نحن
                </div>
            </div>
        </div>
      <div class="row aboutus-row">
        <div class="col-lg-6  aboutus-col aboutus-col-1">
          <p>{{$h->about_text1}}</p>
        </div>
        <div class="col-lg-6 aboutus-col">
          <img class="rounded aboutus-img" src="/images/{{$h->about_image1}}">
        </div>
      </div>
      <div class="row aboutus-row">
        <div class="col-lg-6 aboutus-col">
          <div class="aboutus-col-hdr">مهمتنا</div>
          <p>{{$h->about_text2}}</p>
        </div>
        <div class="col-lg-6  aboutus-col">
          <div class="aboutus-col-hdr">رؤيتنا</div>
          <p>{{$h->about_text3}}</p>
        </div>

      </div>
     
    </div>
  </div>

@endforeach
    @endif
@endsection