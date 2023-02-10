@extends('main')
@section('content')
  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">매입장</div>

  <script>
    function find_text(){
      form1.action="{{ route('jangbui.index') }}";
      form1.submit();
    }

    $(function(){
      $('#text1').datetimepicker({
        locale: 'ko',
        format: 'YYYY-MM-DD',
        defaultDate: moment()
      });

      $('#text1').on("dp.change", function (e) {
        find_text();
      });
    });
  </script>

  <!-- 사용자 검색 및 추가 -->
  <form name="form1" action="">

    <div class="row">
      <div class="col-3" sytle="align: left">

        <div class="d-inline-flex">
          <div class="input-group mb-3 input-group-sm date" id="text1">
            <span class="input-group-text">날짜</span>
            <input type="text" class="form-control" name="text1" size="10" onkeydown="if(event.keyCode == 13){ find_text(); }" value="{{ $text1 }}">
            <span  class="input-group-text">
              <div class="input-group-addon">
                <i class="far fa-calendar-alt fa-lg"></i>
              </div>
            </span>
          </div>  
        </div>

      </div>
      <div class="col-9">
        <a href="{{ route('jangbui.create') }}" class="btn btn-sm mycolor1" style="float: right;">추가</a>
      </div>
    </div>
  </form>

  <!-- 사용자 table -->
  <table class="table table-sm table-bordered table-hove mymargin5">
    <tr class="mycolor2">
      <td width="15%">날짜</td>
      <td width="30%">제품명</td>
      <td width="10%">단가</td>
      <td width="10%">수량</td>
      <td width="15%">금액</td>
      <td width="20%">비고</td>
    </tr>
    
    @foreach ($list as $row)
      <tr>
        <td>{{ $row->writeday }}</td>
        <td>
          <a href="{{ route('jangbui.show', $row->id) }}{{ $tmp }}">
            {{ $row->product_name }}
          </a>
        </td>
        <td>{{ number_format($row->price) }}</td>
        <td>{{ number_format($row->numi) }}</td>
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