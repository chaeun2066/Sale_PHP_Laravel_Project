<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHAEUN MARKET 판매관리</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('my/img/letter-m.png')}}">
    <!-- bootstarp CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('my/css/my.css') }}">
    <script src="{{ asset('my/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{asset('my/js/moment-with-locales.min.js')}}"></script>
    <script src="{{asset('my/js/bootstrap5-datetimepicker.min.js')}}"></script>
    <link href="{{asset('my/css/bootstrap5-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('my/css/all.min.css')}}" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark"  style="height: 70px">
      <!-- <nav class="navbar navbar-expand-lg  bg-body-tertiary"> -->
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            <div class="d-flex">
              <img src="{{asset('my/img/letter-m.png')}}" style="width: 30px; height: 30px;" class="me-2">
              <h4 id="main_title">Sales Management</h4>
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" href="{{ route('jangbui.index') }}">매입</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('jangbuo.index') }}">매출</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('gigan.index') }}">기간조회</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  통계
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('best.index') }}">BEST제품</a></li>
                  <li><a class="dropdown-item" href="{{ route('crosstab.index') }}">월별제품별현황</a></li>
                  <li><a class="dropdown-item" href="{{ route('chart.index') }}">종류별 분포도</a></li>
                  {{-- <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  기초정보
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('gubun.index') }}">구분</a></li>
                  <li><a class="dropdown-item" href="{{ route('product.index') }}">제품</a></li>
                  @if(session()->get("rank") == 1)
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('member.index')}}">사용자</a></li>
                  @endif
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('picture.index') }}">사진</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('ajax.index') }}">Ajax</a>
              </li>
            </ul>
            @if(!session()->exists("uid"))
              <a href="#" class="btn btn-sm btn-outline-secondary btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">로그인 </a>
            @else
              @php 
                $uid = session()->get("uid");
                $name = session()->get("name");
                $welcome = $name."(".$uid.") 님 어서오세요!";
              @endphp
              <span class="me-3" style="color:  #a7a7a7;">@php echo($welcome);  @endphp</span>
              <a href="{{ url('login/logout') }}" class="btn btn-sm btn-outline-secondary btn-dark">
                로그아웃
              </a>
            @endif
          </div>
        </div>
      </nav> 
      
      {{-- Slide Images --}}
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('/my/img/slide1.jpg') }}" height="100" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('/my/img/slide2.jpg') }}" height="100" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('/my/img/slide3.jpg') }}" height="100" class="d-block w-100">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      @yield("content")

    </div>
    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header mycolor1">
        <h5 class="modal-title fs-5" id="exampleModalLabel">로그인</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body bg-light">
        <form name="form_login" method="post" action="{{ url('login/check') }}">
          @csrf
          <table class="table table-borderless mymargin5">
            <tr>
              <td width="30%"><h6>아이디</h6></td>
              <td width="70%"><input type="text" name="uid" class="form-control"></td>
            </tr>
            <tr>
              <td><h6>암&nbsp;호</h6></td>
              <td><input type="password" name="pwd" class="form-control"></td>
            </tr>
          </table>
        </form>
      </div>

      <div class="modal-footer alert-secondary">
        <button type="button" class="btn btn-sm btn-secondary" onclick="javascript:form_login.submit();">확인</button>
        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>