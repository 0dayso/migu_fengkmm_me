(function ($) {
	"use strict";
	var fengkmm = {
		_init_: function () {
			var _this_ = this;
			_this_.fengkmmAjax("geturl","",function(data){
				$("#m").val(data.responseText);
			});
			$('#jc').click(function(){
				$('.mess').text("检测结果：检测中。。。");
					_this_.miguAjax($("#m").val(),function(data){
						if(data.status===200){
							$('.mess').text("检测结果：网址正常。");
						}else{
							$('.mess').text("地址失效联系群主QQ:2218890669。");
						}
				});
			});
			$('.migu').click(function(){
				$("#miguText").text("输入中。。。");
				var cellphone = prompt("你的手机号码");
				$("#miguText").text("查询中。。。");
				_this_.fengkmmAjax("getflow",cellphone,function(data){
					data = $.parseJSON(data.responseText);
					if(data.result===0){
						$("#miguText").text((10240-data.flow)+"M");
					}else{
						$("#miguText").text("无优惠流量。");
					}
				});
			});
		},
		fengkmmAjax: function (postAction, postData, fun) {
			$.ajax({
				type: "post",
				url: "api/fengkmm.php",
				dataType: "json",
				timeout: 10000,
				data: {
					a: postAction,
					d: postData
				},
				complete: function (data) {
					fun(data);
				}
			});
		},
		miguAjax: function (url, fun) {
			$.ajax({
				type: 'get',
				url: url,
				cache: false,
				dataType: "jsonp",
				processData: false,
				timeout: 10000,
				complete: function (data) {
					if (data.status === 200) {
						fun(data);
					} else {
						console.log("出错101");
					}
				}
			});
		},
	};
 	var finish_num = 1;
  function execAjax(url,n){
			finish_num++;
			$.ajax({
				type: 'get',
				url: url,
				cache: false,
				dataType: "jsonp",
				processData: false,
				timeout: 10000, 
				complete: function () {
					var finishSize = finish_num * 222.35 / 1024;
					if(finish_num<=n){
						$('#finish_n').text(finish_num);
						$('#finish_flow_n').text(finishSize.toFixed(2));
						execAjax(url,n);
					}else{
						$('.header').text("任务完成");
					}
				}
			});
		}
	fengkmm._init_();
  window.exec = execAjax;
	window.fengkmm = fengkmm;
})(jQuery);