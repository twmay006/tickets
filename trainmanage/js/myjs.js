function yanzheng1(){
	var pw=document.getElementById("psw");
	var pw1=document.getElementById("psw1");
	if(pw.value.length<4||pw1.value.length<4){
		alert("请输入至少4位密码");
		pw.focus();
		return false;	
	}
	if(pw.value!=pw1.value){
		alert("两次密码不匹配");
		pw.focus();
		return false;	
	}
	var phone=document.getElementById("phone");
	if(phone.value.length!=11){
		alert("请输入正确的电话号码");
		phone.focus();
		return false;
	}	
	for(var i=0;i<phone.value.length;i++){
		var x=phone.value.charAt(i);
		if( ! (x>='0'&&x<='9') ){
				alert("输入的电话号码不正确");
				phone.focus();
				return false;
			}
		}
	var email=document.getElementById("email");
	//验证email格式自己写	
	
	var card_id=document.getElementById("cardid");
	if(card_id.value.length!=18){
		alert("请输入正确的身份证号");	
		card_id.focus();
		return false;
	}
	for(var i=0;i<card_id.value.length;i++){
		var x=card_id.value.charAt(i);
		if( !((x>='0'&&x<='9')||(x=='X')) ){
				alert("输入的身份号不正确");
				card_id.focus();
				return false;
			}
		}
		
	return true;
}
function yanzheng0(){
	var user=document.getElementById("user");
	if(user.value.length!=11){
		alert("输入的电话号码不正确");
		return false;
	}
	for(var i=0;i<user.value.length;i++){
		var x=user.value.charAt(i);
		if( ! (x>='0'&&x<='9') ){
				alert("输入的电话号码不正确");
				user.focus();
				return false;
			}
	}

	var pw=document.getElementById("psw");
	if(pw.value.length<4){
		alert("请输入至少4位密码");
		pw.focus();
		return false;	
	}
}

function clean_data(){
	document.getElementById("user").value="";
	document.getElementById("psw").value="";
	}
	
function subTrain(){
	var train=document.getElementById("trainum");
	if(train.value.length==0){
		alert("请填写车次编号");
		return false;
	}
	var comma=document.getElementById("commander");
	if(comma.value.length==0){
		alert("请填写列车长");
		return false;
	}
	document.getElementById("cardStations").submit();
	return true;
	}