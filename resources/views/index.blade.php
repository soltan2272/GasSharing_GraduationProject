
@extends('layout')
@section('content')

  

  @if(count($home)>0)
    @foreach($home as $h)
  <div class="container">
    <div class="row intro-row">
      <div class="col-lg-6">
        <div class="intro-txt">
          <span class="intro-txt-hello">{{$h->welcome_title}}</span>
          <br><br>
          <span class="intro-txt-details">{{$h->welcome_text}}</span>
          <br><br>
          <div class="intro_btn-div">
            <a href="{{route('getsearch')}}"><button type="button"   class="btn intro-btn">بحث</button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <img class="img-thumbnail intro-img" src="/images/{{$h->welcome_image}}">
      </div>
    </div>
  </div>




  <div>
    <div id="carouselExampleIndicators" class="carousel slide carousel-div" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 carosel-img" src="/images/{{$h->Animation_image1}}" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$h->Animation_title1}}</h5>
            <p>{{$h->Animation_text1}}</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 carosel-img" src="/images/{{$h->Animation_image4}}" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$h->Animation_title4}}</h5>
            <p>{{$h->Animation_text4}}</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 carosel-img" src="/images/{{$h->Animation_image2}}" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$h->Animation_title2}}</h5>
            <p>{{$h->Animation_text2}}</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 carosel-img"  src="/images/{{$h->Animation_image3}}" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$h->Animation_title3}}</h5>
            <p>{{$h->Animation_text3}}</p>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>


  <div class="adv-div">
    <div class="container">
      <div class="row ">
        <div class="col">
          <div class="coll">
            <img class="adv-img" src="/images/{{$h->gallary_image1}}">
            <br>
            <span class="adv-info">{{$h->gallary_title1}}</span>
          </div>
        </div>
        <div class="col">
          <div class="coll">
            <img class="adv-img"  src="/images/{{$h->gallary_image2}}">
            <br>
            <span class="adv-info">{{$h->gallary_title2}}</span>
          </div>
        </div>
        <div class="col">
          <div class="coll">
            <img class="adv-img"  src="/images/{{$h->gallary_image3}}">
            <br>
            <span class="adv-info">{{$h->gallary_title3}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>


  @endforeach
  @endif
  @endsection