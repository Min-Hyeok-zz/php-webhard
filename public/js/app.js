$(document)
.on("click","a[href='#']",function(){ return false; })
.on("change","#chk",function(){
	var _this = this;
	$("input[name='chk[]'").each(function(){
		this.checked = _this.checked;
	})
})