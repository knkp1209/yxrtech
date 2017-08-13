document.writeln("<link rel=\"stylesheet\" type=\"text/css\" href=\"http://www.jsqq.cn/kf/17/css/jsqq_17.css\">");
document.writeln("<div id='jsqq' style='top:100px'>");
document.writeln("	<span class='cs_title'>在线咨询</span>");
document.writeln("	<span class='cs_close'>x</span>");
document.writeln("	<div class='cs_img'></div>");
document.writeln("	<div class='cs_btn'>客服一</div>");

document.writeln("</div>");
document.writeln("<script>");
document.writeln("	myEvent(window,'load',function(){");
document.writeln("		jsqq.set({");
document.writeln("			img_path : 'img/jsqq_17_1.jpg',	//设置图片路径");
document.writeln("			qq : '1803065228',	//设置QQ号码");
document.writeln("		});");
document.writeln("	});");
document.writeln("</script>");


function myEvent(obj,ev,fn){
	if (obj.attachEvent){
		obj.attachEvent('on'+ev,fn);
	}else{
		obj.addEventListener(ev,fn,false);
	};
};

function getByClass(obj,sClass){
	var array = [];
	var elements = obj.getElementsByTagName('*');
	for (var i=0; i<elements.length; i++){
		if (elements[i].className == sClass){
			array.push (elements[i]);
		};
	};
	return array;
};

var jsqq = {
	set : function(json){
		this.box = document.getElementById('jsqq');
		//this.setimg(json);
		this.qqfn(json);
		this.cs_close();
	},
	qqfn : function(json){
		this.btn = getByClass(this.box,'cs_btn')[0];
		var link = 'http://wpa.qq.com/msgrd?v=3&uin='+json.qq+'&site=qq&menu=yes';
		this.btn.onclick = function(){
			window.open(link,'_blank');
		};
	},
	cs_close : function(){
		this.btn = getByClass(this.box,'cs_close')[0];
		var _this = this;
		var speed = 0;
		var timer = null;
		var sh = document.documentElement.clientHeight || document.body.clientHeight;
		this.btn.onclick = function(){
			clearInterval(timer);
			timer = setInterval(function(){
				speed += 4;
				var t = _this.box.offsetTop + speed;
				if (t >= sh-_this.box.offsetHeight){
					speed *= -0.8;
					t = sh-_this.box.offsetHeight;
				};
				if (Math.abs(speed)<2)speed = 0;
				if (speed == 0  && sh-_this.box.offsetHeight == t){
					clearInterval(timer);
					_this.fn();
				};
				_this.box.style.top = t + 'px';
			}, 30);
		};
	},
	fn : function(){
		var _this = this;
		var timer = setTimeout(function(){
			_this.box.style.display = 'none';
		}, 1000);
	},
};