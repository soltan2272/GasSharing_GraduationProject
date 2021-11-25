<!DOCTYPE html>
<html>

<head>
  <title>Gas-Sharing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @if(isset($h))
    <link rel="shortcut icon" href="images/{{$h->small_logo}}" type="image/x-icon" />
  @endif
  <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
  <link rel="stylesheet"  href="{{ asset('css/style.css') }}">
  <style>
  .notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
  }

  .notification:hover {
  background: red;
  }

  .notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
  }
  </style>

</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light" id="navigation">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @if(isset($h))
    <a class="navbar-brand" href="">
      <img src="images/{{$h->main_logo}}" width="40" height="40" alt="">
    </a>
  @endif
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/">الصفحة الرئيسية</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/aboutus">من نحن</a>
      </li>

      @if(Auth::check())
        @if(auth()->user()->category=="1")
        <li class="nav-item">
          <a class="nav-link" href="/newpost">اضف رحلتك</a>
        </li>
        @endif

      <li class="nav-item">
        <a class="nav-link" href="/getsearching">بحــث</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/map">الخريطة</a>
      </li>
      @endif

      @if(!Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="/login">تسجيل الدخول</a>
        </li>
      @endif


    <!-- if signed in -->
      @if(Auth::check())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="profile">الحساب</a>
            <a class="dropdown-item" href="/edit">تعديل الحساب</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('destroy')}}">تسجيل الخروج</a>

          </div>
        </li>
      @endif
    </ul>
  </div>
</nav>


@yield('content')


<div class="info">
  <div class="container">
    <div class="row">
      <div class="col info-col">
        <span><a class="nav-link icon-img-href" href="/">الصفحة الرئيسية</a></span>
        @if(Auth::check())
        <span><a class="nav-link icon-img-href"  href="/getsearching">بحث</a></span>

        <span><a class="nav-link icon-img-href"  href="/map">الخريطة</a></span>
        @endif

        <span><a class="nav-link icon-img-href"  href="/aboutus">من نحن</a></span>
      </div>

      <div class="col">
        <span class="grey_info_txt info-title">اتصل بنا</span>
        <br><br>
        <img class="icon-img" src="{{asset('imgs/mail.png')}}">
        <span class="true_info_txt info-title">البريد الاليكتروني</span>
        <br>
        @if(isset($h))
          <span class="true_info_txt"> {{$h->about_email}} </span>
        @endif
        <br><br>
        <img class="icon-img" src="{{asset('imgs/phone.png')}}">
        <span class="true_info_txt info-title">رقم التليفون</span>
        <br>
        @if(isset($h))
          <span class="true_info_txt"> {{$h->about_phone}}  </span>
        @endif
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col footer-col">
        @if(isset($h))
          @if($h->about_facebook)
            @if ($h->about_facebook[0]=="h")
              <a href="{{$h->about_facebook}}" ><img class="footer-icon" src="{{asset('imgs/facebook.png')}}"></a>
            @else
              <a href="https://{{$h->about_facebook}}" ><img class="footer-icon" src="{{asset('imgs/facebook.png')}}"></a>
            @endif
          @endif

          @if($h->about_twiteer)
            @if ($h->about_twiteer[0]=="h")
              <a href="{{$h->about_twiteer}}" ><img class="footer-icon" src="{{asset('imgs/twitter.png')}}"></a>
            @else
              <a href="https://{{$h->about_twiteer}}" ><img class="footer-icon" src="{{asset('imgs/twitter.png')}}"></a>
            @endif
          @endif

          @if($h->about_youtube)
            @if ($h->about_youtube[0]=="h")
              <a href="{{$h->about_youtube}}" ><img class="footer-icon" src="{{asset('imgs/youtube.png')}}"></a>
            @else
              <a href="https://{{$h->about_youtube}}" ><img class="footer-icon" src="{{asset('imgs/youtube.png')}}"></a>
            @endif
          @endif

          @if($h->about_linkedin)
            @if ($h->about_linkedin[0]=="h")
              <a href="{{$h->about_linkedin}}" ><img class="footer-icon" src="{{asset('imgs/linkedin.png')}}"></a>
            @else
              <a href="https://{{$h->about_linkedin}}" ><img class="footer-icon" src="{{asset('imgs/linkedin.png')}}"></a>
            @endif
          @endif
        @endif
      </div>
      <div class="col footer-col dis"></div>
      <div class="col footer-col">
          <span>
            جميع الحقوق محفوظة
          </span>
      </div>
    </div>
  </div>

</div>

</body>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/state-city.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</html>