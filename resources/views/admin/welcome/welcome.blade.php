﻿@include('admin.inc.inc_head', ['title' => '我的桌面'])
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用laravel - dk <span class="f-14">v1.0</span>后台模版！</p>
	<p>登录次数：18 </p>
	<p>上次登录IP：{{$server}}  上次登录时间：2014-6-14 11:19:55</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>资讯库</th>
				<th>图片库</th>
				<th>产品库</th>
				<th>用户</th>
				<th>管理员</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td>92</td>
				<td>9</td>
				<td>0</td>
				<td>8</td>
				<td>20</td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName">{{$computer_name}}</span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td>{{$host}}</td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td>{{$domain_name}}</td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td>{{$server_port}}</td>
			</tr>
			<tr>
				<td>服务器IIS版本 </td>
				<td>{{$signature}}</td>
			</tr>
			<tr>
				<td>本文件所在文件夹 </td>
				<td>{{ $file }}</td>
			</tr>
			<tr>
				<td>服务器操作系统 </td>
				<td>{{$os}}</td>
			</tr>
			<tr>
				<td>系统所在文件夹 </td>
				<td>{{ $file }}</td>
			</tr>
			<tr>
				<td>服务器脚本超时时间 </td>
				<td>30000秒</td>
			</tr>
			<tr>
				<td>服务器的语言种类 </td>
				<td>{{$language}}</td>
			</tr>
			<tr>
				<td>PHP版本 </td>
				<td>{{$php_version}}</td>
			</tr>
			<tr>
				<td>服务器当前时间 </td>
				<td>{{$server_name}}</td>
			</tr>
			<tr>
				<td>服务器IE版本 </td>
				<td>6.0000</td>
			</tr>
			<tr>
				<td>服务器上次启动到现在已运行 </td>
				<td>7210分钟</td>
			</tr>
			<tr>
				<td>逻辑驱动器 </td>
				<td>C:\D:\</td>
			</tr>
			<tr>
				<td>CPU 总数 </td>
				<td>4</td>
			</tr>
			<tr>
				<td>CPU 类型 </td>
				<td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
			</tr>
			<tr>
				<td>虚拟内存 </td>
				<td>52480M</td>
			</tr>
			<tr>
				<td>当前程序占用内存 </td>
				<td>3.29M</td>
			</tr>
			<tr>
				<td>Asp.net所占内存 </td>
				<td>51.46M</td>
			</tr>
			<tr>
				<td>当前Session数量 </td>
				<td>8</td>
			</tr>
			<tr>
				<td>当前SessionID </td>
				<td>gznhpwmp34004345jz2q3l45</td>
			</tr>
			<tr>
				<td>当前系统用户名 </td>
				<td>NETWORK SERVICE</td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p><br>
			@if( $power ) {{$power}} @endif</p>
	</div>
</footer>
<script type="text/javascript" src="{{URL::asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/static/h-ui/js/H-ui.min.js')}}"></script>

</body>
</html>
