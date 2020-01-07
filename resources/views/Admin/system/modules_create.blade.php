@include('admin.inc.inc_head', ['title' => '栏目添加'])
<body>
<div class="page-container">
	<form action="{{URL('admin/modules')}}" method="post" class="form form-horizontal" id="form-category-add">
        <input type="hidden" name="id" value="{{$modules?$modules->id:''}}">
        @csrf
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>添加模块</span>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{$modules?$modules->title:''}}" placeholder="" id="" name="title">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">控制器：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{$modules?$modules->controller:''}}" placeholder="请先添加控制器和路由" id="" name="controller">
					</div>
					<div class="col-3">
					</div>
				</div>

			</div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

@include('admin.inc.inc_foot')
<script type="text/javascript" src="{{URL::asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#tab-category").Huitab({
		index:0
	});
	$("#form-category-add").validate({
		rules:{

		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			// parent.$('.btn-refresh').click();
            // parent.location.reload();

            // parent.layer.close(index);
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
