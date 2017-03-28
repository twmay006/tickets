function IsEmail() {
	var str = document.getElementById('psw').value.trim();
	if(str.length != 0) {
		reg =/^(?=.{6,20}$)(?![0-9]+$)(?!.*(.).*\1)[0-9a-zA-Z]+$/;
		if(!reg.test(str)) {
			alert("对不起，您输入的密码格式不正确!"); //请将“日期”改成你需要验证的属性名称!    
			psw.focus();
			return false;
		}
	}
	var str = document.getElementById('phone').value.trim();
	if(str.length != 0) {
		reg = /^((\(\d{2,3}\))|(\d{3}\-))?13\d{9}$/;
		if(!reg.test(str)) {
			alert("对不起，您输入的日期格式不正确!"); //请将“日期”改成你需要验证的属性名称!   
			phone.focus();
			return false;
		}
	}
	var str = document.getElementById('email').value.trim();
	if(str.length != 0) {
		reg = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
		if(!reg.test(str)) {
			alert("对不起，您输入的字符串类型格式不正确!"); //请将“字符串类型”要换成你要验证的那个属性名称！   
			email.focus();
			return false;
		}
	}
	var str = document.getElementById('phone').value.trim();
	if(str.length != 0) {
		reg = /^((\(\d{2,3}\))|(\d{3}\-))?13\d{9}$/;
		if(!reg.test(str)) {
			alert("对不起，您输入的日期格式不正确!"); //请将“日期”改成你需要验证的属性名称!   
			phone.focus();
			return false;
		}
	}
}
