@extends('main_nomenu')
@section('content')
  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">제품선택</div>

  <script>
    function find_text(){
      form1.action="{{ route('findproduct.index') }}";
      form1.submit();
    }

    function SendProduct(id, name, price){
      opener.form1.products_id.value = id;
      opener.form1.product_name.value = name;
      opener.form1.price.value = price;
      opener.form1.prices.value = Number(price) * Number(opener.form1.numo.value);
      self.close();
    }
  </script>

  <!-- 사용자 검색 및 추가 -->
  <form name="form1" action="">
    <div class="row">
      <div class="col-6" sytle="align: left">
        <div class="input-group mb-3 input-group-sm">
          <span class="input-group-text">이름</span>
          <input type="text" class="form-control" placeholder="찾을 이름은?" name="text1" 
            onkeydown="if(event.keyCode == 13){ find_text(); }" value="{{ $text1 }}">
          <button class="btn mycolor1" type="button" onclick="find_text();">검색</button>
        </div>
      </div>
      <div class="col-6">
        
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
          <a href="javascript:SendProduct( {{ $row->id }}, '{{ $row->name }}', {{ $row->price }} );">
            {{ $row->name }}
          </a>
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