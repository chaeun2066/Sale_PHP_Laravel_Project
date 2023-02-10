@extends('main')
@section('content')

  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">제품</div>

  <!-- 사용자 정보 입력 -->
  <form action="" name="form1" method="post">
    @csrf

    <table class="table table-sm table-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" style="text-align: left;">{{ $row->id }}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>구분명</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ $row->gubun_name }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>제품명</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ $row->name }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>단가</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ $row->price }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">{{ $row->jaego }}</div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" style="text-align: left;">
          <b>파일이름</b> : {{ $row->pic }} <br>
          @if($row->pic)
            <img src="{{ asset('/storage/product_img/'.$row->pic) }}" width="200" height="150" class="img-fluid img-thumbnail mymargin5">
          @else
            <img src="" width="200" height="150" class="img-fluid img-thumbnail mymargin5">
          @endif
        </td>
      </tr>
    </table>

    <div class="d-flex justify-content-center mt-sm-3">
      <a href="{{ route('product.edit', $row->id) }}" class="btn btn-sm mycolor1">수정</a>&nbsp;
      <form action="{{ route('product.destroy', $row->id) }}">
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