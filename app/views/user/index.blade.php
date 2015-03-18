@extends('admin.master', array('title' => '用户列表'))

@section('content') 

<div class="wrapper wrapper-content"> 
<div class="col-lg-12"> 
<div class="row  border-bottom white-bg dashboard-header">
     <div class="col-lg-10">
        <h2>账号管理</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::route('home') }}">主页</a>
            </li>
            <li>
                <strong>帐号管理</strong>
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

    @if ($isAdmin)
    <div class="ibox-title"> 
     <h5>用户列表</h5> 
     <div class="ibox-tools"> 
      <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> 
      <a class="close-link"> <i class="fa fa-times"></i> </a> 
     </div> 
    </div> 
    @endif

    <div class="ibox-content"> 
    @if ($isAdmin)
       <a href="javascript:;" class="btn btn-outline btn-primary" onClick="addUser()">新增账号</a>
       <button type="button" class="btn btn-outline btn-danger">批量删除</button>
    @endif
    @if ($isAdmin)
     <table class="table table-striped table-bordered table-hover dataTables-example"> 
    @else
     <table class="table table-striped table-bordered table-hover"> 
    @endif
      <thead> 
       <tr> 
        <th>用户帐号</th> 
        <th>部门</th> 
        <th>用户角色</th> 
        <th>操作</th> 
       </tr> 
      </thead> 
      <tbody>
       @foreach ($users as $user) 
       <tr class="gradeX"> 
        <td>{{ $user->username }}</td> 
        <td>{{ $user->nickname }}</td> 
        <td>{{ $user->group->first()->zhname }}</td> 
        <td>
            <a class="btn btn-info btn-rounded" id="btn-alter" href="#" onClick="updateUser({{ $user->id }})"><i class="fa fa-paste"></i> 修改</a>
            <a class="btn btn-warning btn-rounded" id="btn-deluser" href="#" onClick="delUser({{ $user->id }})"><i class="fa fa-warning"></i> 删除</a>
        </td>
       </tr> 
       @endforeach 
      </tbody> 
    @if ($isAdmin)
      <tfoot> 
       <tr> 
        <th>用户帐号</th> 
        <th>部门</th> 
        <th>用户角色</th> 
        <th>操作</th> 
       </tr> 
      </tfoot> 
    @endif
     </table> 
    </div> 

   </div> 


  </div> 
 </div> 
</div> 

</div> 

@stop 

@section('script')
@parent
<script>
    // iframe层
    function iframeset(srcurl) {
        var pageii = $.layer({
            type: 2,
            // offset: ['70px', ''],
            //shade: [0],
            closeBtn: [0, true],
            shadeClose: true,
            area: ['450px', '470px'],
            title: false,
            border: [0],
            iframe: {
                src: srcurl,
                scrolling: 'auto',
            },
        });
        //layer.load(1);
    }

    // 修改用户
    function updateUser(id) { 
        iframeset("{{ URL::route('user.index') }}" + '/' + id + '/edit');
    }

    // 新增用户
    function addUser() { 
        iframeset('{{ URL::route("user.create") }}');
    }

    // 删除用户
    function delUser(id) {
        layer.prompt({
            top: 'auto',
            type: 1,
            title: '输入密码以确认删除!!'
        }, function (val) {
            $.post(
                "{{ URL::route('user.index') }}" + '/' + id, {
                    _method: 'delete',
                    password: val
                },
                function (json) {
                    if (json.success == true) {
                        layer.msg('删除成功!', 2, 1);
                        setTimeout(
                            function() {
                                parent.location.reload();
                            }, 1500);
                    } else {
                        layer.msg(json.error, 2, 2);
                    }
                });
        });
    }
</script>
@stop
