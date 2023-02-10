@extends('main')
@section('content')
  <br>
  <!-- 사용자 alert -->
  <div class="alert mycolor1" role="alert">월별 제품별 매출현황</div>

  <script>
    function find_text(){
      form1.action="{{ route('crosstab.index') }}";
      form1.submit();
    }

    $(function(){
      $('#text1').datetimepicker({
        locale: 'ko',
        format: 'YYYY',
        viewMode: "years",
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
      <div class="col-12" sytle="align: left">

        <div class="d-inline-flex">
          <div class="input-group mb-3 input-group-sm date" id="text1">
            <span class="input-group-text">년도</span>
            <input type="text" class="form-control" name="text1" size="4" onkeydown="if(event.keyCode == 13){ find_text(); }" value="{{ $text1 }}">
            <span  class="input-group-text">
              <div class="input-group-addon">
                <i class="far fa-calendar-alt fa-lg"></i>
              </div>
            </span>
          </div>  
        </div>
      </div>
    </div>
  </form>

  <!-- 사용자 table -->
  <table class="table table-sm table-bordered table-hove mymargin5">
    <tr class="mycolor2">
      <td width="40%">제품명</td>
      <td width="5%">1월</td>
      <td width="5%">2월</td>
      <td width="5%">3월</td>
      <td width="5%">4월</td>
      <td width="5%">5월</td>
      <td width="5%">6월</td>
      <td width="5%">7월</td>
      <td width="5%">8월</td>
      <td width="5%">9월</td>
      <td width="5%">10월</td>
      <td width="5%">11월</td>
      <td width="5%">12월</td>
    </tr>
    
    @foreach ($list as $row)
      <tr>
        <td>{{ $row->product_name }}</td>
        <td>{{ $row->s1==0 ? "" : number_format($row->s1) }}</td>
        <td>{{ $row->s2==0 ? "" : number_format($row->s2) }}</td>
        <td>{{ $row->s3==0 ? "" : number_format($row->s3) }}</td>
        <td>{{ $row->s4==0 ? "" : number_format($row->s4) }}</td>
        <td>{{ $row->s5==0 ? "" : number_format($row->s5) }}</td>
        <td>{{ $row->s6==0 ? "" : number_format($row->s6) }}</td>
        <td>{{ $row->s7==0 ? "" : number_format($row->s7) }}</td>
        <td>{{ $row->s8==0 ? "" : number_format($row->s8) }}</td>
        <td>{{ $row->s9==0 ? "" : number_format($row->s9) }}</td>
        <td>{{ $row->s10==0 ? "" : number_format($row->s10) }}</td>
        <td>{{ $row->s11==0 ? "" : number_format($row->s11) }}</td>
        <td>{{ $row->s12==0 ? "" : number_format($row->s12) }}</td>
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