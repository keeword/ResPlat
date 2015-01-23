@extends('layout') 

@section('sidebar')

<div class="gray-bg">
<div class="text-center fadeInDown" align="center">

{{ Form::open(array('url' => 'application', 'class' => 'm-t text-left',  'id' => 'createappform')) }}

   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>已选物资</h5> 
    </div> 

    <div class="ibox-content"> 
     <table class="table table-striped table-bordered table-hover"> 
      <thead> 
       <tr> 
        <th>物资名称</th> 
        <th>需求数量</th> 
       </tr> 
      </thead> 
      <tbody>
    @foreach ($materials as $m)
      <tr class="gradeX"> 
        <td>{{ $m->name }}</td> 
        <td><span>
            <a href="javascript:;" class="J_minus" style="padding:2px 5px;background-color:#e9e9e9;border:1px solid #ccc;text-decoration:none;color:#585858;line-height:20px">-</a>
            {{ Form::text($m->id, $material[$m->id], array('class' => 'J_input', 'style' => 'width:30px;height:18px;margin:0 8px;padding:2px;border:1px solid #ccc;text-align:center;line-height:16px')) }}
            <a href="javascript:;" class="J_add" style="padding:2px 5px;background-color:#e9e9e9;border:1px solid #ccc;text-decoration:none;color:#585858;line-height:20px">+</a>
        </span></td>
      </tr> 
    @endforeach 
      </tbody> 
     </table> 

    <div class="form-group">
    {{ Form::label('reason', '申请原因' ,array('class'=>'control-label')) }}
    {{ Form::textarea('reason', '', array('class' => 'form-control',
        'placeholder' => '申请原因', 'require' => '', 'rows' => 2)) }}
    </div>

    <div class="form-group">
    {{ Form::label('time', '图标触发日期', array('class' => 'control-label')) }}
    {{ Form::text('btime', '', array('placeholder' => '借出日期', 
        'class' => 'form-control layer-date', 'id' => 'start', 'require' => '')) }}
    {{ Form::text('rtime', '', array('placeholder' => '归还日期', 
        'class' => 'form-control layer-date', 'id' => 'end', 'require' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('person', '申请人' ,array('class'=>'control-label')) }}
    {{ Form::text('person', '', array('class' => 'form-control',
        'placeholder' => '申请人', 'require' => '')) }}
    </div>

    <div class="form-group">
    {{ Form::label('phone', '联系方式' ,array('class'=>'control-label')) }}
    {{ Form::text('phone', '', array('class' => 'form-control',
        'placeholder' => '联系方式')) }}
    </div>

    {{ Form::submit('确定申请', array('class' => 'btn btn-info block full-width m-b')) }}
{{ Form::close() }}

</div>
</div>

@stop
