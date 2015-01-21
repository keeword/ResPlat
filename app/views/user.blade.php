@extends('master') 

@section('content') 


<div class="col-lg-12"> 

<div class="wrapper wrapper-content"> 
 <div class="row"> 
  <div class="col-lg-12"> 

   <div class="ibox float-e-margins"> 

    <div class="ibox-title"> 
     <h5>用户列表</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 

    <div class="ibox-content"> 
     <table class="table table-striped table-bordered table-hover dataTables-example"> 
      <thead> 
       <tr> 
        <th>用户帐号</th> 
        <th>用户名</th> 
        <th>用户角色</th> 
       </tr> 
      </thead> 
      <tbody>
        @foreach ($users as $user) 
       <tr class="gradeX"> 
        <td>{{ $user->username }}</td> 
        <td>{{ $user->nickname }}</td> 
        <td>{{ Lang::get('user.'.$user->groups->first()->name) }}</td> 
       </tr> @endforeach 
      </tbody> 
      <tfoot> 
       <tr> 
        <th>用户帐号</th> 
        <th>用户名</th> 
        <th>用户角色</th> 
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
