 layui.use('layim', function(layim){
  var zhuangtai='';
  //基础配置
  var rightWidth=0;
  if(document.body.clientWidth>1000){
  	rightWidth="78px";
  }else{
  	return;
  }
  layim.config({
    //初始化接口
    init: {
      url: '/teacher_work/index.php/Chat?uname='+localStorage.u_name,
      data: {}
    }
    
    //或采用以下方式初始化接口
    /*
    ,init: {
      mine: {
        "username": "LayIM体验者" //我的昵称
        ,"id": "100000123" //我的ID
        ,"status": "online" //在线状态 online：在线、hide：隐身
        ,"remark": "在深邃的编码世界，做一枚轻盈的纸飞机" //我的签名
        ,"avatar": "a.jpg" //我的头像
      }
      ,friend: []
      ,group: []
    }
    */
    

    //查看群员接口
    ,members: {
      url: 'json/getMembers.json'
      ,data: {}
    }
    
    //上传图片接口
    ,uploadImage: {
      url: '/upload/image' //（返回的数据格式见下文）
      ,type: '' //默认post
    } 
    
    //上传文件接口
    ,uploadFile: {
      url: '/upload/file' //（返回的数据格式见下文）
      ,type: '' //默认post
    }
    
    //扩展工具栏
    ,tool: [{
      alias: 'code'
      ,title: '代码'
      ,icon: '&#xe64e;'
    }]
    
//    ,brief: true //是否简约模式（若开启则不显示主面板）
    
      ,title: '微聊' //自定义主面板最小化时的标题
      ,right:rightWidth  //主面板相对浏览器右侧距离
//    ,minRight: '2550px' //聊天面板最小化时相对浏览器右侧距离
    ,initSkin: '3.jpg' //1-5 设置初始背景
//    ,skin: ['aaa.jpg'] //新增皮肤
    //,isfriend: false //是否开启好友
      ,isgroup: false //是否开启群组
      ,min: true //是否始终最小化主面板，默认false
    ,notice: true //是否开启桌面消息提醒，默认false
      ,voice: 'default.wav' //声音提醒，默认开启，声音文件为：default.wav
    
    ,msgbox: layui.cache.dir + 'css/modules/layim/html/msgbox.html' //消息盒子页面地址，若不开启，剔除该项即可
    ,find: layui.cache.dir + 'css/modules/layim/html/find.html' //发现页面地址，若不开启，剔除该项即可
//  ,chatLog: layui.cache.dir + 'css/modules/layim/html/chatLog.html' //聊天记录页面地址，若不开启，剔除该项即可
    
  });

  /*
  layim.chat({
    name: '在线客服-小苍'
    ,type: 'kefu'
    ,avatar: 'http://tva3.sinaimg.cn/crop.0.0.180.180.180/7f5f6861jw1e8qgp5bmzyj2050050aa8.jpg'
    ,id: -1
  });
  layim.chat({
    name: '在线客服-心心'
    ,type: 'kefu'
    ,avatar: 'http://tva1.sinaimg.cn/crop.219.144.555.555.180/0068iARejw8esk724mra6j30rs0rstap.jpg'
    ,id: -2
  });
  layim.setChatMin();*/

  //监听在线状态的切换事件
  layim.on('online', function(data){
      if(data=="hide"){
      	zhuangtai="隐藏";
      }else if(data=="online"){
      	zhuangtai="在线";
      }
      $.ajax({
            url: "/teacher_work/index.php/Chat/isonline?zt="+data+"&uname="+localStorage.u_name,
            type: "POST",
            success: function (data) {
            }
        })
  });
  
  //监听签名修改
  layim.on('sign', function(value){
       $.ajax({
            url: "/teacher_work/index.php/Chat/sign?sign="+value+"&uname="+localStorage.u_name,
            type: "POST",
            success: function (data) {
            	swal({title:"签名修改成功",type:"success"})
            }
        })
  });

  //监听自定义工具栏点击，以添加代码为例
  layim.on('tool(code)', function(insert){
    layer.prompt({
      title: '插入代码'
      ,formType: 2
      ,shade: 0
    }, function(text, index){
      layer.close(index);
      insert('[pre class=layui-code]' + text + '[/pre]'); //将内容插入到编辑器
    });
  });
  
  //监听layim建立就绪
  layim.on('ready', function(res){

      var data=res.mine.status;
    	if(data=="hide"){
      				zhuangtai="隐藏";
      			}else if(data=="online"){
      				zhuangtai="在线";
      			}
    layim.msgbox(5); //模拟消息盒子有新消息，实际使用时，一般是动态获得
  
    //添加好友（如果检测到该socket）
    layim.addList({
      type: 'group'
      ,avatar: "http://tva3.sinaimg.cn/crop.64.106.361.361.50/7181dbb3jw8evfbtem8edj20ci0dpq3a.jpg"
      ,groupname: 'Angular开发'
      ,id: "12333333"
      ,members: 0
    });
    layim.addList({
      type: 'friend'
      ,avatar: "http://tp2.sinaimg.cn/2386568184/180/40050524279/0"
      ,username: '冲田杏梨'
      ,groupid: 2
      ,id: "1233333312121212"
      ,remark: "本人冲田杏梨将结束AV女优的工作"
    });
    
    setTimeout(function(){
      //接受消息（如果检测到该socket）
      layim.getMessage({
        username: "Hi"
        ,avatar: "http://qzapp.qlogo.cn/qzapp/100280987/56ADC83E78CEC046F8DF2C5D0DD63CDE/100"
        ,id: "10000111"
        ,type: "friend"
        ,content: "临时："+ new Date().getTime()
      });
      
      /*layim.getMessage({
        username: "贤心"
        ,avatar: "http://tp1.sinaimg.cn/1571889140/180/40030060651/1"
        ,id: "100001"
        ,type: "friend"
        ,content: "嗨，你好！欢迎体验LayIM。演示标记："+ new Date().getTime()
      });*/
      
    }, 9000);
  });

  //监听发送消息
  layim.on('sendMessage', function(data){
  	console.log(data);
    var To = data.to;
    	$.ajax({
    		url:"/teacher_work/index.php/Chat/send?who="+data.mine.username+"&send="+data.to.username+"&content="+data.mine.content+"&avatar="+data.mine.avatar+"&id="+data.to.id+"&type="+data.to.type+"&zt="+zhuangtai,
    		dataType:'json',
    		success:function(data){
    			console.log(data);
    		}
    	})
//  if(To.type === 'friend'){
//    layim.setChatStatus('<span style="color:#FF5722;">对方正在输入。。。</span>');
//  }
  });
  
	 setInterval(function(){
    	var content='';
    	$.ajax({
    		url:"/teacher_work/index.php/Chat/timeout?send="+localStorage.u_name,
    		type: "POST",
    		success:function(data){
    			content=eval(data);
    			for (var i in content) {
    				var obj = {};
	        		obj = {
			          username: content[i].mine
			          ,avatar: content[i].avatar
			          ,id: content[i].id
			          ,type: content[i].type
			          ,content: content[i].content
	       			}
	        		layim.setChatStatus(`<span style="color:#FF5722;">${content[i].zt}</span>`);
    				layim.getMessage(obj);
    			}
    		}
    	})
      
    }, 1000);
    
  //监听查看群员
  layim.on('members', function(data){
    //console.log(data);
  });
  
  //监听聊天窗口的切换
  layim.on('chatChange', function(res){
    var type = res.data.type;
    console.log(res.data.id)
    if(type === 'friend'){
      //模拟标注好友状态
      //layim.setChatStatus('<span style="color:#FF5722;">在线</span>');
    } else if(type === 'group'){
      //模拟系统消息
      layim.getMessage({
        system: true
        ,id: res.data.id
        ,type: "group"
        ,content: '模拟群员'+(Math.random()*100|0) + '加入群聊'
      });
    }
  });
  
  

});