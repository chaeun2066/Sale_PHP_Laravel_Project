@extends('main')
@section('content')

  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">제품</div>

  <!-- 사용자 정보 입력 -->
  <form action="{{ route('product.store') }}" name="form1" method="post" enctype="multipart/form-data">
    @csrf

    <table class="table table-sm table-bordered mymargin5">
      <tr>
        <td width="20%" class="mycolor2">번호</td>
        <td width="80%" style="text-align: left;"></td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>구분명</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <select name="gubuns_id" class="form-control form-control-sm">
              <option value="selected">선택하세요.</option>

              @foreach($list as $row)
                @if($row->id == old('gubuns_id'))
                  <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                @else
                  <option value="{{ $row->id }}">{{ $row->name }}</option>
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
            <input type="text" name="name" size="30" maxlength="50" value="{{ old('name') }}" class="form-control form-control-sm">
          </div>
          @error('name') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2"><span style="color: red;">*</span>단가</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="price" size="20" maxlength="20" value="{{ old('price') }}" class="form-control form-control-sm">
          </div>
          @error('price') {{ $message }} @enderror
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">재고</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="text" name="jaego" size="20" value="" class="form-control form-control-sm">
          </div>
        </td>
      </tr>
      <tr>
        <td width="20%" class="mycolor2">사진</td>
        <td width="80%" style="text-align: left;">
          <div class="d-inline-flex">
            <input type="file" name="pic" size="20" value="" class="form-control form-control-sm">
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
