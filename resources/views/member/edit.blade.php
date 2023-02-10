@extends('main')
@section('content')

  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">사용자</div>

  <!-- 사용자 정보 입력 -->
  <form action="{{ route('member.update', $row->id )}}{{ $tmp }}" name="form1" method="post">
    @csrf
    @method('PATCH')

    <table class="table table-sm table-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" style="text-align: left;">{{ $row->id }}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>이름</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="name" size="20" maxlength="20" value="{{ $row->name }}" class="form-control form-control-sm">
          </div>
          @error('name') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>아이디</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="uid" size="20" maxlength="20" value="{{ $row->uid }}" class="form-control form-control-sm">
          </div>
          @error('uid') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>암호</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="pwd" size="20" maxlength="20" value="{{ $row->pwd }}" class="form-control form-control-sm">
          </div>
          @error('pwd') {{ $message }} @enderror
        </td>
      </tr>
      @php
        $tel1 = trim(substr($row->tel,0,3));
        $tel2 = trim(substr($row->tel,3,4));
        $tel3 = trim(substr($row->tel,7,4));
      @endphp
      <tr>
        <td width="20%" class="mycolor2">전화</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="tel1" size="3" maxlength="3" value="{{ $tel1 }}" class="form-control form-control-sm">-
            <input type="text" name="tel2" size="4" maxlength="4" value="{{ $tel2 }}" class="form-control form-control-sm">-
            <input type="text" name="tel3" size="4" maxlength="4" value="{{ $tel3 }}" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">등급</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            @if($row->rank == 0)
              <input type="radio" name="rank" value="0" checked>&nbsp;직원&nbsp;&nbsp;
              <input type="radio" name="rank" value="1">&nbsp;관리자
            @else
              <input type="radio" name="rank" value="0">&nbsp;직원&nbsp;&nbsp;
              <input type="radio" name="rank" value="1" checked>&nbsp;관리자
            @endif  
          </div>
        </td>
      </tr>
    </table>

    <div class="d-flex justify-content-center mt-sm-3">
      <input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp; 
      <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">&nbsp; 
    </div>

  </form>
@endsection      
