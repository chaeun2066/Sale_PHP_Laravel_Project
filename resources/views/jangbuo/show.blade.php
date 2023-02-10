@extends('main')numi
@section('content')

  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">매출</div>

  <!-- 사용자 정보 입력 -->
  <form action="" name="form1" method="post">
    @csrf

    <table class="table table-sm table-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>날짜</td>
        <td width="80%" style="text-align: left;">{{ $row->writeday }}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>제품명</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ $row->product_name }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">단가</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ number_format($row->price) }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">수량</td>
        <td width="80%" style="text-align: left;">
          
          <div class="d-inline-flex">{{ number_format($row->numo) }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">금액</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ number_format($row->prices) }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">비고</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ $row->bigo }}</div>
        </td>
      </tr>
    </table>

    <div class="d-flex justify-content-center mt-sm-3">
      <a href="{{ route('jangbuo.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>&nbsp;
      <form action="{{ route('jangbuo.destroy', $row->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요 ?');">삭제</button> &nbsp;
      </form>
      <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">&nbsp; 
    </div>
  </form>
</div>
@endsection()