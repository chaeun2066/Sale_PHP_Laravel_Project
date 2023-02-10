@extends('main')
@section('content')

@php
  $tel1 = trim(substr($row->tel,0,3));
  $tel2 = trim(substr($row->tel,3,4));
  $tel3 = trim(substr($row->tel,7,4));
  $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
  $rank = $row->rank==0 ? '직원' : '관리자';
@endphp

  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">구분</div>

  <!-- 사용자 정보 입력 -->
  <form action="" name="form1" method="post">
    <table class="table table-sm table-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" style="text-align: left;">{{ $row->id }}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>구분명</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ $row->name }}</div>
        </td>
      </tr>
    </table>

    <div class="d-flex justify-content-center mt-sm-3">
      <a href="{{ route('gubun.edit', $row->id) }}" class="btn btn-sm mycolor1">수정</a>&nbsp;
      <form action="{{ route('gubun.destroy', $row->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요 ?');">삭제</button> &nbsp;
      </form>
      {{-- <input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;  --}}
      <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">&nbsp; 
    </div>

  </form>
</div>
@endsection()