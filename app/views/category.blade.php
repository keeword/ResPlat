@extends('master') 

@section('content') 

<div class="wrapper wrapper-content"> 
<div class="col-lg-12"> 
<div class="row  border-bottom white-bg dashboard-header">
     <div class="col-lg-10">
        <h2>品类管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                <strong>品类管理</strong>
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
     <h5>品类一览</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 

    <div class="ibox-content"> 
     <table class="table table-striped table-bordered table-hover edit-table"> 
        <a class="btn btn-outline btn-primary" id="btn-addcategory" href="javascript:;" onClick="addCategory()">添加分类</a>
      <thead> 
       <tr> 
        <th>品类名称</th> 
        <th>物资数量</th> 
        <th>操作</th>
       </tr> 
      </thead> 
      <tbody>
       @foreach ($names as $name) 
       <tr class="gradeX"> 
        <td class="edit-td">{{ $name }}</td> 
        <td>数量</td>
        <td>操作</td>
       </tr> 
       @endforeach 
      </tbody> 
      <tfoot> 
       <tr> 
        <th>品类名称</th> 
        <th>物资数量</th> 
        <th>操作</th>
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
