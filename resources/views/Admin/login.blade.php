<!DOCTYPE html>
<!-- saved from url=(0044)https://www.layui.com/admin/pro/#/user/login -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <title>layuiAdmin pro - 通用后台管理模板系统（单页面专业版）</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="./login_files/layui.css" media="all">
  <script src="./login_files/hm.js.下载"></script><script>
  /^http(s*):\/\//.test(location.href) || alert('请先部署到 localhost 下再访问');
  </script>
<link id="layuicss-layer" rel="stylesheet" href="./login_files/layer.css" media="all"><link id="layuicss-layuiAdmin" rel="stylesheet" href="./login_files/admin.css" media="all"></head>
<body layadmin-themealias="purple-red-header" class="layui-layout-body">
  <div id="LAY_app" class="layadmin-tabspage-none"><script type="text/html" template="">
  <link rel="stylesheet" href="{{ layui.setter.base }}style/login.css?v={{ layui.admin.v }}-1" media="all">
</script> <link rel="stylesheet" href="./login_files/login.css" media="all"> <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

  <div class="layadmin-user-login-main">
    <div class="layadmin-user-login-box layadmin-user-login-header">
      <h2>layuiAdmin</h2>
      <p>layui 官方出品的单页面后台管理模板系统</p>
    </div>
    <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
      <div class="layui-form-item">
        <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
        <input type="text" name="username" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
      </div>
      <div class="layui-form-item">
        <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
        <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
      </div>
      <div class="layui-form-item">
        <div class="layui-row">
          <div class="layui-col-xs7">
            <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
            <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
          </div>
          <div class="layui-col-xs5">
            <div style="margin-left: 10px;">
              <img src="./login_files/captcha" class="layadmin-user-login-codeimg" id="LAY-user-get-vercode">
            </div>
          </div>
        </div>
      </div>
      <div class="layui-form-item" style="margin-bottom: 20px;">
        <input type="checkbox" name="remember" lay-skin="primary" title="记住密码"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>记住密码</span><i class="layui-icon layui-icon-ok"></i></div>
        <a lay-href="/user/forget" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
      </div>
      <div class="layui-form-item">
        <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="LAY-user-login-submit">登 入</button>
      </div>
      <div class="layui-trans layui-form-item layadmin-user-login-other">
        <label>社交账号登入</label>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>
        <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>
        
        <a lay-href="/user/reg" class="layadmin-user-jump-change layadmin-link">注册帐号</a>
      </div>
    </div>
  </div>
  
  <div class="layui-trans layadmin-user-login-footer">
    
    <p>© 2018 <a href="http://www.layui.com/" target="_blank">layui.com</a></p>
    <p>
      <span><a href="http://www.layui.com/admin/#get" target="_blank">获取授权</a></span>
      <span><a href="http://www.layui.com/admin/pro/" target="_blank">在线演示</a></span>
      <span><a href="http://www.layui.com/admin/" target="_blank">前往官网</a></span>
    </p>
  </div>
  
  <!--<div class="ladmin-user-login-theme">
    <script type="text/html" template>
      <ul>
        <li data-theme=""><img src="{{ layui.setter.base }}style/res/bg-none.jpg"></li>
        <li data-theme="#03152A" style="background-color: #03152A;"></li>
        <li data-theme="#2E241B" style="background-color: #2E241B;"></li>
        <li data-theme="#50314F" style="background-color: #50314F;"></li>
        <li data-theme="#344058" style="background-color: #344058;"></li>
        <li data-theme="#20222A" style="background-color: #20222A;"></li>
      </ul>
    </script>
  </div>-->
  
</div><script>
layui.use(['admin', 'form', 'user'], function(){
  var $ = layui.$
  ,setter = layui.setter
  ,admin = layui.admin
  ,form = layui.form
  ,router = layui.router()
  ,search = router.search;

  form.render();

  //提交
  form.on('submit(LAY-user-login-submit)', function(obj){
  
    //请求登入接口
    admin.req({
      url: './json/user/login.js' //实际使用请改成服务端真实接口
      ,data: obj.field
      ,done: function(res){
      
        //请求成功后，写入 access_token
        layui.data(setter.tableName, {
          key: setter.request.tokenName
          ,value: res.data.access_token
        });
        
        //登入成功的提示与跳转
        layer.msg('登入成功', {
          offset: '15px'
          ,icon: 1
          ,time: 1000
        }, function(){
          location.hash = search.redirect ? decodeURIComponent(search.redirect) : '/';
        });
      }
    });
    
  });
  
  
  //实际使用时记得删除该代码
  layer.msg('为了方便演示，用户名密码可随意输入', {
    offset: '15px'
    ,icon: 1
  });
  
});
</script></div>
  <script src="./login_files/layui.js.下载"></script>
  <script>
  layui.config({
    base: './dist/' //指定 layuiAdmin 项目路径
    ,version: '1.2.1'
  }).use('index', function(){
    var layer = layui.layer, admin = layui.admin;
    layer.ready(function(){
      admin.popup({
        content: '单页面专业版默认未开启“多标签”功能，实际运用时，你可以自定义是否开启'
        ,area: '300px'
        ,btnAlign: 'c'
        ,shade: false
      });
    });
  });
  </script>
  
  <script>
  var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?d214947968792b839fd669a4decaaffc";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
  })();
  </script>




<style id="LAY_layadmin_theme">.layui-side-menu,.layadmin-pagetabs .layui-tab-title li:after,.layadmin-pagetabs .layui-tab-title li.layui-this:after,.layui-layer-admin .layui-layer-title,.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-item>.layui-nav-child{background-color:#50314F !important;}.layui-nav-tree .layui-this,.layui-nav-tree .layui-this>a,.layui-nav-tree .layui-nav-child dd.layui-this,.layui-nav-tree .layui-nav-child dd.layui-this a{background-color:#7A4D7B !important;}.layui-layout-admin .layui-logo{background-color:#50314F !important;}.layui-layout-admin .layui-header{background-color:#50314F;}.layui-layout-admin .layui-header a,.layui-layout-admin .layui-header a cite{color: #f8f8f8;}.layui-layout-admin .layui-header a:hover{color: #fff;}.layui-layout-admin .layui-header .layui-nav .layui-nav-more{border-top-color: #fbfbfb;}.layui-layout-admin .layui-header .layui-nav .layui-nav-mored{border-color: transparent; border-bottom-color: #fbfbfb;}.layui-layout-admin .layui-header .layui-nav .layui-this:after, .layui-layout-admin .layui-header .layui-nav-bar{background-color: #fff; background-color: rgba(255,255,255,.5);}.layadmin-pagetabs .layui-tab-title li:after{display: none;}</style><div class="layui-layer-move"></div></body></html>