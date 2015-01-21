@extends('master') 

@section('content') 


<div class="col-lg-12"> 

<div class="wrapper wrapper-content"> 
 <div class="row"> 
  <div class="col-lg-12"> 

{{ print_r(Session::all()) }}

   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
    <h4>用户信息</h4> 
    </div> 

    <div class="ibox float-e-margins"> 
      <table class="table table-bordered table-striped"> 
       <thead> 
        <tr> 
         <th>用户帐号</th> 
         <th>用户名</th> 
         <th>用户角色</th> 
        </tr> 
       </thead> 
       <tbody> 
        <tr> 
         <td>{{ Session::get('username') }}</td> 
         <td>{{ Session::get('nickname') }}</td> 
         <td>{{ Session::get('usergroup') }}</td> 
        </tr> 
        <tr> 
        </tr> 
       </tbody> 
      </table> 
     </div> 

   </div> 


   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>申请情况</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 

    <div class="ibox-content"> 
     <table class="table table-striped table-bordered table-hover dataTables-example"> 
      <thead> 
       <tr> 
        <th></th> 
        <th>申请时间</th> 
        <th>申请部门</th> 
        <th>申请项目</th> 
        <th>审核状态</th> 
        <th>操作</th> 
       </tr> 
      </thead> 
      <tbody> 
       <tr> 
        <th class="text-nowrap"> 
         <form> 
          <input type="checkbox" name="选定1" />
          <p>  </p>
         </form></th> 
        <td>2014.1.18 12:00</td> 
        <td>信宣部</td> 
        <td>详情</td> 
        <td><a class="btn btn-danger btn-rounded" href="">已拒绝</a></td> 
        <td> <button class="btn btn-info btn-circle" type="button"><i class="fa fa-check"></i> </button> <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button> </td> 
       </tr> 
       <tr> 
        <th class="text-nowrap"> 
         <form> 
          <input type="checkbox" name="选定1" />
          <p>  </p>
         </form></th> 
        <td>2014.1.18 12:00</td> 
        <td>信宣部</td> 
        <td>详情</td> 
        <td><a class="btn btn-warning btn-rounded" href="">未审核</a></td> 
        <td> <button class="btn btn-info btn-circle" type="button"><i class="fa fa-check"></i> </button> <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button> </td> 
       </tr> 
       <tr> 
        <th class="text-nowrap"> 
         <form> 
          <input type="checkbox" name="选定1" />
          <p>  </p>
         </form></th> 
        <td>2014.1.18 12:00</td> 
        <td>信宣部</td> 
        <td>详情</td> 
        <td><a class="btn btn-primary btn-rounded" href="">已通过</a></td> 
        <td> <button class="btn btn-info btn-circle" type="button"><i class="fa fa-check"></i> </button> <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 


   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>物资一览</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 

    <div class="ibox-content"> 
     <table class="table table-striped table-bordered table-hover dataTables-example"> 
      <thead> 
       <tr> 
        <th>物资名称</th> 
        <th>物资品类</th> 
        <th>在借数量</th> 
        <th>剩余数量</th> 
        <th>总数量</th> 
        <th>借出情况</th> 
       </tr> 
      </thead> 
      <tbody>
        @foreach ($materials as $material) 
       <tr class="gradeX"> 
        <td>{{ $material->name }}</td> 
        <td>{{ $material->category->category }}</td> 
        <td>{{ $material->lent_number }}</td> 
        <td>{{ $material->total_number - $material->lent_number }}</td> 
        <td>{{ $material->total_number }}</td> 
        <td>这里有十个字符。。。</td> 
       </tr> @endforeach 
      </tbody> 
      <tfoot> 
       <tr> 
        <th>物资名称</th> 
        <th>物资品类</th> 
        <th>在借数量</th> 
        <th>剩余数量</th> 
        <th>总数量</th> 
        <th>借出情况</th> 
       </tr> 
      </tfoot> 
     </table> 
    </div> 

   </div> 


   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>消息公告</h5> 
    </div> 

    <div class="table-responsive">
     <table class="table table-bordered table-striped"> 
      <thead> 
       <tr> 
        <th>公告时间</th> 
        <th> 内容 </th> 
       </tr> 
      </thead> 
      <tbody> 
       <tr> 
        <th class="text-nowrap"> 
         <form>
           2015.1.18 14:00 
         </form> 
        </th> 
        <td>blablablablabla</td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 

   </div> 


  </div> 
 </div> 
</div> 

</div> 


@stop 
