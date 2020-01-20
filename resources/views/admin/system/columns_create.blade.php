@include('admin.inc.inc_head', ['title' => '栏目添加'])
<body>
<div class="page-container">
	<form action="{{URL('admin/columns')}}" method="post" class="form form-horizontal" id="form-category-add">
        @csrf
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>基本设置</span>
				<span>模版设置</span>
				<span>SEO</span>
			</div>
			<div class="tabCon">
{{--				<div class="row cl">--}}
{{--					<label class="form-label col-xs-4 col-sm-3">栏目ID：</label>--}}
{{--					<div class="formControls col-xs-8 col-sm-9">11230</div>--}}
{{--				</div>--}}

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						分类名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <input type="hidden" name="id" value="{{isset($datas)?$datas->id:''}}">
						<input type="text" class="input-text" value="{{isset($datas)?$datas->title:''}}" placeholder="" id="" name="title">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">唯一标识：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{isset($datas)?$datas->identify:''}}" placeholder="" id="" name="identify">
					</div>
					<div class="col-3">
					</div>
				</div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-3">
                        <span class="c-red">*</span>
                        父级栏目：</label>
                    <div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="parent_id" name="parent_id" onchange="SetSubID(this);">
							<option value="0">顶级分类</option>
                            @foreach( $colDatas as $k => $v )
                                <option value="{{$v['id']}}" @if($v['id'] == $datas->parent_id){{'selected'}}@endif>{{$v['title']}}</option>
                                @if( isset($v['son']))
                                    @foreach( $v['son'] as $kk => $vv )
                                        <option value="{{$vv['id']}}" @if($vv['id'] == $datas->parent_id){{'selected'}}@endif>|->{{$vv['title']}}</option>
                                    @endforeach
                                @endif
                            @endforeach

						</select>
						</span>
                    </div>
                    <div class="col-3">
                    </div>
                </div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">内容类型：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select name="mid" class="select">
                            @foreach( $modulesDatas as $k => $v )
							<option value="{{$v->id}}" @if($v->id == $datas->mid){{'selected'}}@endif>{{$v->title}}</option>
                            @endforeach

						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">是否生成静态html：</label>
					<div class="formControls col-xs-8 col-sm-9 skin-minimal">
						<div class="check-box">
							<input type="checkbox" id="checkbox-pinglun" name="status">
							<label for="checkbox-pinglun">&nbsp;</label>
						</div>
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">首页模版：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" style="width:200px;">
						<input type="button" class="btn btn-default" value="浏览">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">列表页模版：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" style="width:200px;">
						<input type="button" class="btn btn-default" value="浏览">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">详情页模版：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" style="width:200px;">
						<input type="button" class="btn btn-default" value="浏览">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">详细页存储规则：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="" name="">
							<option value="1">按年度划子目录</option>
							<option value="2">按年/月划分子目录</option>
							<option value="3">按年/月/日划分子目录</option>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">每页显示多少条：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="20" style="width:200px;">
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">首页文件名：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="index.html" style="width:200px;">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">关键词：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,100)"></textarea>
						<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
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

<!--请在下方写此页面业务相关的脚本-->
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
			//parent.$('.btn-refresh').click();
			// parent.layer.close(index);
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
