@extends('main')
@section('content')
  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">기간별 매출입 현황</div>

  <script>
    function find_text(){
      form1.action="{{ route('gigan.index') }}";
      form1.submit();
    }

    $(function(){
      $('#text1').datetimepicker({
        locale: 'ko',
        format: 'YYYY-MM-DD',
        defaultDate: moment()
      });
      $('#text2').datetimepicker({
        locale: 'ko',
        format: 'YYYY-MM-DD',
        defaultDate: moment()
      });

      $('#text1').on("dp.change", function (e) {
        find_text();
      });
      $('#text2').on("dp.change", function (e) {
        find_text();
      });
    });
  </script>

  <!-- 사용자 검색 및 추가 -->
  <form name="form1" action="">

    <div class="row">
      <div class="col-12" sytle="align: left">

        <div class="d-inline-flex">
          <div class="input-group mb-3 input-group-sm date" id="text1">
            <span class="input-group-text">날짜</span>
            <input type="text" class="form-control" name="text1" size="10" onkeydown="if(event.keyCode == 13){ find_text(); }" value="{{ $text1 }}">
            <span class="input-group-text">
              <div class="input-group-addon">
                <i class="far fa-calendar-alt fa-lg"></i>
              </div>
            </span>
          </div>  
        </div>
        -
        <div class="d-inline-flex">
          <div class="input-group mb-3 input-group-sm date" id="text2">
            <input type="text" class="form-control" name="text2" size="10" onkeydown="if(event.keyCode == 13){ find_text(); }" value="{{ $text2 }}">
            <span class="input-group-text">
              <div class="input-group-addon">
                <i class="far fa-calendar-alt fa-lg"></i>
              </div>
            </span>
          </div>  
        </div>
        &nbsp;
        <div class="d-inline-flex">
          <div class="input-group mb-3 input-group-sm">
            <span class="input-group-text">제품명</span>
            <select name="text3" class="form-select form-select-sm" onchange="find_text();">
              <option value="0" selected>전체</option>
            
              @foreach($list_product as $row)
                @if($row->id == $text3)
                  <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                @else
                  <option value="{{ $row->id }}">{{  $row->name }}</option>  
                @endif
              @endforeach

            </select>
          </div>  
        </div>
      </div>
    </div>
  </form>

  <!-- 사용자 table -->
  <table class="table table-sm table-bordered table-hove mymargin5">
    <tr class="mycolor2">
      <td width="15%">날짜</td>
      <td width="25%">제품명</td>
      <td width="10%">단가</td>
      <td width="10%">매입수량</td>
      <td width="10%">매출수량</td>
      <td width="15%">금액</td>
      <td width="15%">비고</td>
    </tr>
    
    @foreach ($list as $row)
@php
      $numi = $row->numi ? number_format($row->numi) : "";
      $numo = $row->numo ? number_format($row->numo) : "";
@endphp
      <tr>
        <td>{{ $row->writeday }}</td>
        <td>{{ $row->product_name }}</td>
        <td>{{ number_format($row->price) }}</td>
        <td class="mycolor3">{{ $numi }}</td>
        <td class="mycolor3">{{ $numo }}</td>
        <td>{{ number_format($row->prices) }}</td>
        <td>{{ $row->bigo }}</td>
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