@include('admin.inc.inc_head', ['title' => '模块管理'])
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	模块管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<a href="javascript:;" onclick="datadel();" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		<a class="btn btn-primary radius" onclick="system_category_add('添加模块','{{URL("admin/modules/create")}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加模块</a>
		</span>
		<span class="r">共有数据：<strong> {{count($datas)}} </strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">排序</th>
					<th>模块名称</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach( $datas as $k => $v )
				<tr class="text-c">
					<td><input type="checkbox" name="id" value="{{$v->id}}"></td>
					<td>{{$v->id}}</td>
					<td>{{$v->sort_id}}</td>
					<td class="text-l">{{$v->title}}</td>
					<td class="f-14">
                        <a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','{{URL('admin/modules/'.$v->id.'/edit')}}',{{$v->id}},'700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="system_category_del(this,'{{URL('admin/modules/'.$v->id)}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        <a class="btn-refresh" style="display: none;" href="javascript:;" onclick="javascript:location.replace(location.href);" title="刷新" ></a>

                    </td>

				</tr>
                @endforeach
			</tbody>
		</table>

	</div>
</div>
@include('admin.inc.inc_foot')

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{URL::asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/lib/laypage/1.2/laypage.js')}}"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "searching" : true,
        "aaSorting": [[ 2, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,4]}// 制定列不参与排序
        ]
    });
    /*系统-栏目-添加*/
    function system_category_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*系统-栏目-编辑*/
    function system_category_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
        // location.reload();
    }
    /*系统-栏目-删除*/
    function system_category_del(obj,uri){
        layer.confirm(
            '确认要删除吗？',
            {icon: 3, title:'提示'},
            function(index){

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: uri,
                dataType: 'json',
                success: function(data){
                    if( data.sta )
                    {
                        // $(obj).parents("tr").remove();

                        layer.msg('已删除!',{icon:1,time:1000});
                        setTimeout(function(){location.reload();},1000);
                    }else{
                        layer.msg(data.msg);
                    }

                },
                error:function(data) {
                    console.log(data);
                },
            });
            layer.close(index);
        });
    }
    /*
    *批量删除
     */
    function datadel()
    {
        let checkID = new Array();
        $("input[name='id']:checked").each(function(i){//把所有被选中的复选框的值存入数组
            checkID[i] =$(this).val();
        });
        console.log(checkID);
    }
</script>
</body>
</html>
