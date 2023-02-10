@extends('main')
@section('content')
  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">구분</div>

  <script>
    function find_text(){
      form1.action="{{ route('product.index') }}";
      form1.submit();
    }
  </script>

  <!-- 사용자 검색 및 추가 -->
  <form name="form1" action="">
    <div class="row">
      <div class="col-3" sytle="align: left">
        <div class="input-group mb-3 input-group-sm">
          <span class="input-group-text">이름</span>
          <input type="text" class="form-control" placeholder="찾을 이름은?" name="text1" 
            onkeydown="if(event.keyCode == 13){ find_text(); }" value="{{ $text1 }}">
          <button class="btn mycolor1" type="button" onclick="find_text();">검색</button>
        </div>
      </div>
      <div class="col-9">
        <a href="{{ url('product/jaego') }}" class="btn btn-sm mycolor1" style="float: right;">재고계산</a>
        <a href="{{ route('product.create') }}" class="btn btn-sm mycolor1 me-2" style="float: right;">추가</a>
      </div>
    </div>
  </form>

  <!-- 사용자 table -->
  <table class="table table-sm table-bordered table-hove mymargin5">
    <tr class="mycolor2">
      <td width="10%">번호</td>
      <td width="20%">구분명</td>
      <td width="30%">제품명</td>
      <td width="20%">단가</td>
      <td width="20%">재고</td>
    </tr>
    
    @foreach ($list as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->gubun_name}}</td>
        <td>
          <a href="{{ route('product.show', $row->id) }}">{{ $row->name }}</a>
        </td>
        <td>{{ $row->price }}</td>
        <td>{{ $row->jaego }}</td>
      </tr>
    @endforeach
  </table>

  <!-- 페이지 번호 -->
  <div class="row">
    <div class="col">
      {{ $list->links('mypagination') }}
    </div>
  </div>
</div>
@endsection()