@extends('master') 

@section('content') 

<div class="wrapper wrapper-content"> 
<div class="col-lg-12"> 
<div class="row  border-bottom white-bg dashboard-header">
     <div class="col-lg-10">
        @if ($isAdmin)
        <h2>物资管理</h2>
        @else
        <h2>物资一览</h2>
        @endif
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                @if ($isAdmin)
                <strong>物资管理</strong>
                @else
                <strong>物资一览</strong>
                @endif
            </li>
        </ol>
    </div>
</div>
</div>
</div>



<div class="col-lg-12"> 

<div class="wrapper wrapper-content"> 
 <div class="row"> 
  <div class="col-lg-12"> 


   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>物资一览</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 

    <div class="ibox-content"> 
     @if ($isAdmin)
     <table class="table table-striped table-bordered table-hover edit-table"> 
       <a href="javascript:;" class="btn btn-outline btn-primary" onClick="addMaterial()">添加物资</a>
     @else
     <table class="table table-striped table-bordered table-hover dataTables-example"> 
     @endif
      <thead> 
       <tr> 
        <th>物资名称</th> 
        <th>物资品类</th> 
        <th>借出数量</th> 
        <th>剩余数量</th> 
        <th>总数</th> 
        <th>借出情况</th> 
        @if ($isAdmin)
        <th>操作</th>
        @endif
       </tr> 
      </thead> 
      <tbody>
       @foreach ($materials as $material) 
       <tr class="gradeX"> 
        <td @if($isAdmin) class="edit-td" @endif>{{ $material->name }}</td> 
        <td @if($isAdmin) class="edit-td" @endif>{{ $material->category->name }}</td> 
        <td>{{ $material->lent_number }}</td> 
        <td>{{ $material->total_number - $material->lent_number }}</td> 
        <td>{{ $material->total_number }}</td> 
        <td><a href="#">详情</a></td> 
        <td>操作</td>
       </tr> 
       @endforeach 
      </tbody> 
      <tfoot> 
       <tr> 
        <th>物资名称</th> 
        <th>物资品类</th> 
        <th>借出数量</th> 
        <th>剩余数量</th> 
        <th>总数</th> 
        <th>借出情况</th> 
        @if ($isAdmin)
        <th>操作</th>
        @endif
       </tr> 
      </tfoot> 
     </table> 
    </div> 

   </div> 


  </div> 
 </div> 
</div> 

</div> 


@stop 
