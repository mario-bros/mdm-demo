<style>
.progress-bar-cus-container-cus {
  margin: 0 auto;
  /*padding-top: 100px;*/
  width: 80%;
}
.progress-bar-cus-container-cus .progress-bar-cus {
  position: relative;
}
.progress-bar-cus-container-cus .progress-bar-cus__bar {
  align-self: center;
  background: #dfdfdf;
  flex-grow: 1;
  height: 5px;
}
.progress-bar-cus-container-cus .progress-bar-cus__bar--completed {
  background: #6c7573;
}
.progress-bar-cus-container-cus .progress-bar-cus__circles {
  display: flex;
  /*margin-bottom: 50%;*/
}
.progress-bar-cus-container-cus .progress-bar-cus__circle {
  background: #ffffff;
  border-radius: 50%;
  border: 3px solid #dfdfdf;
  /*color: #b2b5ba;*/
  cursor: pointer;
  height: 50px;
  line-height: 43px;
  position: relative;
  text-align: center;
  width: 50px;
}
.progress-bar-cus-container-cus .progress-bar-cus__circle--completed {
  background: #27bb95;
  border-color: #27bb95;
}
.progress-bar-cus-container-cus .progress-bar-cus__circle--completed .number {
  color: #fff;
  font-size: 1.8em;
}
.progress-bar-cus-container-cus .progress-bar-cus__circle--selected {
  border-color: #565656;
  color: #ffffff;
}
.progress-bar-cus-container-cus .progress-bar-cus__circle .number {
  font-size: 1.1em;
  font-weight: bold;
}
.progress-bar-cus-container-cus .progress-bar-cus__circle__label {
  top: 100%;
  color: #b2b5ba;
  font-weight: 600;
  left: 50%;
  margin-bottom: 4px;
  margin-left: -50px;
  position: absolute;
  text-align: center;
  width: 100px;
}
.numberCircle {
  float: right;
  border-radius: 50%;
  width: 22px;
  height: 22px;
  padding: 0px;
  background: #666;
  border: 1px solid #666;
  color: #FFF;
  text-align: center;
}
</style>

@php
  $flags = [];
  $num = count($status)+1;
@endphp
@foreach($status as $key => $value)
  @php
    $flags[] = $value['flag_process'].$value['is_rejected'];
    $status[$key]['num'] = $num--;
  @endphp
@endforeach
@php
  $last = $flags[0] ?? '';
  $num = count($status);
@endphp

<div class="row">
  <div class="col-sm-2 "><h4 class="pull-right">Status</h4></div>
  <div class="col-sm-8"></div>
</div>
<hr style="margin-top: 0px;">
<div class="form-group">
  <div class="progress-bar-cus-container-cus">
    <div class="progress-bar-cus">
      <div class="progress-bar-cus__circles">
        @if(count($status) == 0 || $last == 10 || $last == 20 || $last == 30 || $last == 11 || $last == 01)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: #00a624; border-color: #00a624">
        @elseif($last == -11)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--selected" style="background: #E91B1B;">
        @else
        <div class="progress-bar-cus__circle progress-bar-cus__circle--selected" style="background: #00a624;">
        @endif
          <span class="number">1</span>
          @if(count($status) == 0 || $last == 10 || $last == 20 || $last == 30 || $last == 11 || $last == 01)
          <span class="label label-primary" style="margin-left: -10px">New Request</span>
          @elseif($last == -11)
          <span class="label label-danger" style="margin-left: -10px">Rejected</span>
          @else
          <span class="label label-primary" style="margin-left: -10px">New Request</span>
          @endif
        </div>
        <!-- Checked -->
        <div class="progress-bar-cus__bar progress-bar-cus__bar--completed"></div>
        @if(count($status) == 0 || $last == 01)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--selected" style="background: darkgray;">
        @elseif($last == 10 || $last == 20 || $last == 30 || $last == 11)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: #00a624; border-color: #00a624">
        @elseif($last == -11)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: #E91B1B; border-color: #E91B1B">
        @else
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: darkgray; border-color: darkgray">
        @endif
          <span class="number">2</span>
          @if(count($status) == 0 || $last == 01)
          <span class="label label-default" style="margin-left: -30px">Waiting to process...</span>
          @elseif($last == 10 || $last == 20 || $last == 30 || $last == 11)
          <span class="label label-success" style="margin-left: -10px">Proposed</span>
          @elseif($last == -11)
          <span class="label label-danger" style="margin-left: -40px">Rejected by MDO Checker</span>
          @else
          <span> </span>
          @endif
        </div>
        <!-- Approved -->
        <div class="progress-bar-cus__bar progress-bar-cus__bar--completed"></div>
        @if(count($status) == 0 || ($last == -11 && !in_array(01, $flags)))
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: darkgray; border-color: darkgray">
        @elseif($last == 10 || $last == 11)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--selected" style="background: darkgray;">
        @elseif($last == 20 || $last == 30)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: #00a624; border-color: #00a624">
        @elseif($last == 01 || ($last == -11 && in_array(01, $flags)))
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: #E91B1B; border-color: #E91B1B">
        @else
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: darkgray; border-color: darkgray">
        @endif
          <span class="number">3</span>
          @if(count($status) == 0 || ($last == -11 && !in_array(01, $flags)))
          <span> </span>
          @elseif($last == 10 || $last == 11)
          <span class="label label-default" style="margin-left: -30px">Waiting to process...</span>
          @elseif($last == 20 || $last == 30)
          <span class="label label-success" style="margin-left: -10px">Approved</span>
          @elseif($last == 01 || ($last == -11 && in_array(01, $flags)))
          <span class="label label-danger" style="margin-left: -40px">Rejected by MDO Approval</span>
          @else
          <span> </span>
          @endif
        </div>
        <!-- Certified -->
        <div class="progress-bar-cus__bar progress-bar-cus__bar--completed"></div>
        @if(count($status) == 0 || ($last == 10 && !in_array(11,$flags)) || ($last == 01 && !in_array(20,$flags)) || ($last == -11 && !in_array(11,$flags)))
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: darkgray; border-color: darkgray">
        @elseif($last == 20)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--selected" style="background: darkgray;">
        @elseif($last == 30)
        <div class="progress-bar-cus__circle progress-bar-cus__circle--selected" style="background: #00a624;">
        @elseif($last == 11 || ($last == 01 && in_array(20,$flags)) || ($last == -11 && in_array(11,$flags)) || ($last == 10 && in_array(11,$flags)))
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: #E91B1B; border-color: #E91B1B">
        @else
        <div class="progress-bar-cus__circle progress-bar-cus__circle--completed" style="background: darkgray; border-color: darkgray">
          @endif
          <span class="number">4</span>
          @if(count($status) == 0 || ($last == 10 && !in_array(11,$flags)) || ($last == 01 && !in_array(20,$flags)) || ($last == -11 && !in_array(11,$flags)))
          <span> </span>
          @elseif($last == 20)
          <span class="label label-default" style="margin-left: -30px">Waiting to process...</span>
          @elseif($last == 30)
          <span class="label label-success" style="margin-left: -10px">Certified</span>
          @elseif($last == 11 || ($last == 01 && in_array(20,$flags)) || ($last == -11 && in_array(11,$flags)) || ($last == 10 && in_array(11,$flags)))
          <span class="label label-danger" style="margin-left: -40px">Rejected by MDO Certify</span>
          @else
          <span> </span>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12" style="margin-top: 50px">
    <!-- Table new request-->
    <div class="col-md-3">
      <div class="panel panel-default" style="width: max-content;">
        <div class="panel-body" style="padding: 3px;">
          <table class="table">
            <div class="numberCircle">1</div>
            <tbody>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Status</td>
                <td>:</td>
                <td><span class="label label-primary">New Request</span></td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Requestor</td>
                <td>:</td>
                <td>{{ $profile['createdBy']['name'] ?? '' }}</td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Date</td>
                <td>:</td>
                <td>{{ $profile['created_at'] ?? '' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Table checked -->
    <div class="col-md-3">
      @foreach($status as $value)
      @if($value['flag_process'].$value['is_rejected'] == 10 || $value['flag_process'].$value['is_rejected'] == -11)
      <div class="panel panel-default" style="width: max-content;">
        <div class="panel-body" style="padding: 3px;">
          <table class="table">
            <div class="numberCircle">{{ $value['num' ?? ''] }}</div>
            <tbody>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Status</td>
                <td>:</td>
                @if($value['flag_process'].$value['is_rejected'] == 10)
                <td><span class="label label-success">Proposed</span></td>
                @endif
                @if($value['flag_process'].$value['is_rejected'] == -11)
                <td><span class="label label-danger">Rejected</span></td>
                @endif
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>MDO</td>
                <td>:</td>
                <td>{{ $value['user']['name'] ?? '' }}</td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Message</td>
                <td>:</td>
                <td>{{ $value['message'] ?? '' }}</td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Date</td>
                <td>:</td>
                <td>{{ $value['created_at'] ?? '' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endif
      @endforeach
    </div>
    <!-- Table Approved -->
    <div class="col-md-3">
      @foreach($status as $value)
      @if($value['flag_process'].$value['is_rejected'] == 20 || $value['flag_process'].$value['is_rejected'] == 01)
      <div class="panel panel-default" style="width: max-content;">
        <div class="panel-body" style="padding: 3px;">
          <table class="table">
            <div class="numberCircle">{{ $value['num'] ?? '' }}</div>
            <tbody>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Status</td>
                <td>:</td>
                @if($value['flag_process'].$value['is_rejected'] == 20)
                <td><span class="label label-success">Approved</span></td>
                @endif
                @if($value['flag_process'].$value['is_rejected'] == 01)
                <td><span class="label label-danger">Rejected</span></td>
                @endif
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>MDO</td>
                <td>:</td>
                <td>{{ $value['user']['name'] ?? '' }}</td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Message</td>
                <td>:</td>
                <td>{{ $value['message'] ?? '' }}</td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Date</td>
                <td>:</td>
                <td>{{ $value['created_at'] ?? '' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endif
      @endforeach
    </div>
    <!-- Table Certified -->
    <div class="col-md-3">
      @foreach($status as $value)
      @if($value['flag_process'].$value['is_rejected'] == 30 || $value['flag_process'].$value['is_rejected'] == 11)
      <div class="panel panel-default" style="width: max-content;">
        <div class="panel-body" style="padding: 3px;">
          <table class="table">
            <div class="numberCircle">{{ $value['num'] ?? '' }}</div>
            <tbody>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Status</td>
                <td>:</td>
                @if($value['flag_process'].$value['is_rejected'] == 30)
                <td><span class="label label-success">Certified</span></td>
                @endif
                @if($value['flag_process'].$value['is_rejected'] == 11)
                <td><span class="label label-danger">Rejected</span></td>
                @endif
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>MDO</td>
                <td>:</td>
                <td>{{ $value['user']['name'] ?? '' }}</td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Message</td>
                <td>:</td>
                <td>{{ $value['message'] ?? '' }}</td>
              </tr>
              <tr style="border-top: 2px solid #ffffff; text-align: left">
                <td>Date</td>
                <td>:</td>
                <td>{{ $value['created_at'] ?? '' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endif
      @endforeach
    </div>
    <!-- EndTable -->
  </div>
</div>
