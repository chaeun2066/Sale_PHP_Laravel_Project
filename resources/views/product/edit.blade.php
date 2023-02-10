@extends('main')
@section('content')

  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">제품</div>

  <!-- 사용자 정보 입력 -->
  <form action="{{ route('product.update', $row->id )}}" name="form1" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <table class="table table-sm table-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" style="text-align: left;">{{ $row->id }}</td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>구분명</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <select name="gubuns_id" class="form-control form-control-sm">
              <option value="">선택하세요.</option>
              @foreach($list as $row1)
                @if($row->gubuns_id == $row1->id)
                  <option value="{{ $row1->id }}" selected>{{ $row1->name }}</option>
                @else
                  <option value="{{ $row1->id }}">{{ $row1->name }}</option>
                @endif  
              @endforeach
            </select>
          </div>
          @error('gubuns_id') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>제품명</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="name" size="30" maxlength="50" value="{{ $row->name }}" class="form-control form-control-sm">
          </div>
          @error('name') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>단가</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="price" size="20" maxlength="20" value="{{ $row->price }}" class="form-control form-control-sm">
          </div>
          @error('price') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="jaego" size="20" value="{{ $row->jaego }}" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="file" name="pic" value="" class="form-control form-control-sm">
          </div>
          <br><br>
          <b>파일이름</b> : {{ $row->pic }}  <br>
          @if($row->pic)
            <img src="{{ asset('/storage/product_img/'.$row->pic) }}" width="200" height="150" class="img-fluid img-thumbnail mymargin5">
          @else
            <img src="" width="200" height="150" class="img-fluid img-thumbnail mymargin5">
          @endif
        </td>
      </tr>
    </table>

    <div class="d-flex justify-content-center mt-sm-3">
      <input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp; 
      <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">&nbsp; 
    </div>

  </form>
@endsection      
