
















<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0" name="viewport">
<link rel="stylesheet" href="/tpl/y101/ver1/app/css/bootstrap.min.css">
<script type="text/javascript" src="/public/js/jquery.js"></script>
<title>Cashier</title>
</head>
<body style="background-color: #ecedf2;">

	<style>
	body{
		background-color:#f3f7f8;
		font-size: 1.6rem;
		color:#000;
	}
	
	.headerbox {
		min-height:91px;margin-top:0;padding-top:36px;display: inline-block;width: 100%;
	}
	.headerbox .title{
		15px;padding: 0 24px;font-weight:700;width:50%;float: left;
	}
	.headerbox .timer{
		width: 50%;float: left; margin-top: 12px;
		
	}
	.footerbox{
		background: #fafbfb;height: 78px;border-radius: 0 0 8px 8px;position: relative;padding: 21px 21px 22px;-webkit-box-shadow: 0 17px 28px 0 rgba(0,0,0,.04);box-shadow: 0 17px 28px 0 rgba(0,0,0,.04);
	}
	
	.f1 {
		vertical-align: middle;
	}
	
	.fleft {
		margin-top: 3px;float:left;
	}
	
	.qr_img{
		display:block;
		text-align: center;
		border-radius: 8px 8px 0 0;
	}
	
	.qr_img div{
   		text-align: center;
	}
	
	.start_btn{
		text-align: center;
    　　line-height: 60px;
    	margin-top: 5px;
	}
	.info_describe{
    	margin-top: 10px;
	}

	.qr_img img{
		height:350px;
		border: 0px solid darkorange;
		border-left-width: 30%;
	}
	
	.fimg {
		width: 18px;height: 20px;background-position: -49px -157px;background-image: url(/assets/pay/paytm/sprite2.png);display: inline-block;vertical-align: middle;
	}
	.ftxt {
		color: #666;padding-top: 3px;margin-left: 25px;font-size: 1.2rem;
	}
	
	.fright {
		float:right;
		margin-bottom: 5px;
	}
	
	.frimg {
		max-width: 272px;
	}
	
	.contentbox {
		min-height: 105px;width:100%;
	}
	
	.ct1 {
		background: #fff;border-radius: 8px 8px 0 0;color: #222;min-height: 105px;width: 100%;vertical-align: top;display: inline-block;
	}
	
	.ctleft {
		padding: 0 24px;height: 36px;border-bottom: 1px solid #f3f7f8;font-size: 1.8rem;line-height: 18px;letter-spacing: 1px;font-weight: 300;
	}
	.ctright {
		padding: 17px 24px 13px;border-bottom: 8px solid #f4f7f8;width: 100%;vertical-align: top;display: inline-block;
	}
	
	.cfbtn {
		background: 0 0;border: 0;padding: 11px 0 10px;cursor: pointer;
	}
	.cfbtn i {
		margin-right: 0;width: 7px;height: 7px;display: inline-block;border: solid #000;border-width: 0 0 2px 2px; -webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);transform: rotate(45deg); background-position: -69px -160px; vertical-align: middle; 
	}
	.cr1 {
		font-size: 1.2rem;float: left;
	}
	.cr1 label {
		font-size: 1.8rem;margin-bottom: 5px;display: block;font-weight: 500;
	}
	.crorder {
		cursor: pointer;position: relative;
	}
	.croid {
		line-height: 1.2rem;font-weight: 400;margin-right: 5px;vertical-align: middle;display: inline-block;
	}
	
	.cr2 {
		text-align: right;float: right;margin-top: 5px;
		
	}
	.cr2 label {
		font-weight: 400;display: block;margin-bottom: 5px;font-size: 1.2rem;
	}
	.crmoney {
		font-size: 2.4rem;line-height: 2.4rem;font-weight: 600;
	}
	
	.cr3 {
		text-align: right;float: right;
	}
	.cr3 label {
		font-size: 1.8rem;margin-bottom: 5px;display: block;font-weight: 500;
		
	}
	.crname {
		line-height: 1.2rem;font-weight: 400;margin-right: 5px;vertical-align: middle;display: inline-block;
		
	}
	.upi-payment-step {
	    display: flex;
	    align-items: center;
	    justify-content: flex-start;
	    margin-bottom: 16px;
	}
	.upi-payment-step input {
	    flex: 1;
	    height: 32px;
	    border: 2px solid #74a5f3;
	    margin-left: 10px;
	    border-radius: 6px;
	    padding-left: 8px;
	}
	.setp .box {
	    margin: 0 auto;
	    min-width: 300px;
	    max-width: 520px;
	}
	.text-left {
	    text-align: left;
	}
	.img-row {
	    display: flex;
	    align-items: center;
	    justify-content: space-between;
	    padding-bottom: 20px;
	}
	.img-row img {
	    width: 48%;
	    height: auto;
	    border: 2px solid #528FF0;
	}
	</style>
	<div id="div_paytm" class="container">
		<div class="headerbox">
			<div class="title">
				<img src="/tpl/y101/ver1/app/images/UPI_logo.png" width="177.5px" height="94.5px" >
			</div>
			<div class="timer" align="right">                    
                <img style="width:16px;margin-bottom: 3px;" src="/tpl/y101/ver1/app/images/hourglass.svg">
               	<span class="ng-binding" id="second_show">600</span>
             </div>
		</div>
		
		<div class="contentbox">
			<div class="ct1">
				<div class="ctleft">
					<div class="cfbtn">
						<span>Order details</span>
					</div>
				</div>
				
				<div class="ctright">
					<div class="info_describe">
						<span style="color: red;font-size: 12px">STEP 1.Please copy &amp; paste the UPI Account ID to pay(example:Google Pay / Phonepe / Paytm / Any Bank )</span><br>
					</div>
				</div>
				
				
				<div class="ctright">
					<div class="cr1">
						<div class="crorder">
							<input type="hidden" id="sn" name="sn" value="2020121714175897482517">
							<input type="hidden" id="account" name="account" value="7838582657">
							<span class="croid">Transaction ID: VtCC20221019203535563316</span>
						</div>
					</div>
					<div class="cr2" style="width:100%;">
						<label>Amount to be paid </label>
						<div class="crmoney">
							<i class="crmoney1">$</i>&nbsp;<span id="span_amount">1000</span>
 							<button type="button" class="btn btn-success btn-sm" onclick="copyBtn('span_amount')">Copy amount</button>
 						</div>
					 </div>		
					  		 
 					 <div class="cr2" style="width:100%;">
						<label>payee </label>
						<div class="crmoney">
							<span id="nes"></span>
								
							 <button type="button" class="btn btn-success btn-sm" onclick="copyBtn('nes')">Copy UPI</button>
							  
 							
 						</div>
					 </div>
					 	
					 
				</div>
				
				<div class="ctleft" id="div_step_2_txt">
					<div class="cfbtn">
						<div class="upi-payment-step">
	                        <span style="color: red;font-size: 12px">STEP 2:</span>
	                        <input type="text" id="txt_ref_no" name="txt_ref_no" placeholder="ENTER REF NO: 2178xxxxxxxx" maxlength="12" oninput="this.value=this.value.replace(/[^\d]/g,'')" onchange="this.value=this.value.replace(/[^\d]/g,'')">
	                    </div>
					</div>
				</div>
				<div class="ctright" id="div_step_2_btn">
					<div class="start_btn">
						<a href="javascript:void(0);" id="submitBtn" onclick="toSubmitPay()" class="btn btn-primary">Submit Ref Number</a>
					</div>
				</div>
				<div id="div_step_2_tip" class="ctright" style="display:none;color:red;"></div>
				
				
				
				<div class="qr_img" style="display:block;">
					<div id="lodings">
						<strong>Matching orders</strong>
					</div>
					<div class="box">
	                    <div class="text-left">
	                        <p class="level-2" style="margin-bottom:0;color:#333;">Ref No. Example</p>
	                        <div class="img-row">
	                            <img data-big-img="example1" src="/tpl/y101/ver1/app/images/small1.png">
	                            <img data-big-img="example2" src="/tpl/y101/ver1/app/images/small2.png">
	                        </div>
	                        <div class="img-row">
	                            <img data-big-img="example3" src="/tpl/y101/ver1/app/images/small3.png">
	                            <img data-big-img="example4" src="/tpl/y101/ver1/app/images/small4.png">
	                        </div>
	                        <div class="img-row">
	                            <img data-big-img="example5" src="/tpl/y101/ver1/app/images/small5.png">
	                        </div>
	                    </div>
	                </div>					
				</div>

				<div class="footerbox">
					<div class="f1">
						<div class="fleft">
							<i class="fimg"></i><span class="ftxt">100% Secure Payments Powered by Paytm</span>
						</div>
						<div class="fright">
							<img src="/tpl/y101/ver1/app/images/footer-new-logos.png" class="frimg">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="div_upi" class="container" style="display:none;">
		<div class="headerbox">
			<div class="title">
				<img src="/tpl/y101/ver1/app/images/UPI_logo.png" width="177.5px" height="94.5px" >
			</div>
			<div class="timer" align="right">                    
            	<img style="width:16px;margin-bottom: 3px;" src="/tpl/y101/ver1/app/images/hourglass.svg">
           		<span class="ng-binding" id="second_show_1">600</span>
            </div>
		</div>
		<div class="contentbox">
			<div class="ct1">
				<div class="ctleft">
					<div class="cfbtn">
						<span>Order details</span>
					</div>
				</div>
				<div class="ctright">
					<div class="info_describe">
						<span style="color: red;font-size: 12px">1.Please copy &amp; paste the UPI Account ID to pay(example:Google Pay / Phonepe / Paytm / Any Bank )</span><br>
					</div>
				</div>
				
				<div class="ctright">
					<div class="cr1">
						<div class="crorder">
							<input type="hidden" id="sn" name="sn" value="2020121714175897482517">
							<input type="hidden" id="account" name="account" value="7838582657">
							<span class="croid">Transaction ID:  VtCC20221019203535563316</span>
						</div>
					</div>
					<div class="cr2" style="width:100%;">
						<label>Amount to be paid </label>
						<div class="crmoney">
							<i class="crmoney1">$</i>&nbsp;<span id="span_amount_1">1000</span>
 							<button type="button" class="btn btn-success btn-sm" onclick="copyBtn('span_amount_1')">Copy amount</button>
 						</div>
					 </div>					  
					 <div class="cr2" style="width:100%;">
						<label>payee </label>
						<div class="crmoney">
							<span id="nes_1"></span>
							 <button type="button" class="btn btn-success btn-sm" onclick="copyBtn('nes_1')">Copy UPI</button>
 						</div>
					 </div>
				</div>
				<div class="ctright">
					<div class="start_btn">
						<a href="javascript:void(0);" id="submitBtn" onclick="toDiv('paytm')" class="btn btn-primary">PayTm</a>	
						<a href="phonepe://" class="btn btn-primary" style="background-color:#5f259f">PhonePe</a>
						<a href="comgooglewallet://" class="btn btn-primary" style="background-color: #6f7bf3">GooglePay</a>
					</div>
				</div>
				<div class="footerbox">
					<div class="f1">
						<div class="fleft">
							<i class="fimg"></i><span class="ftxt">100% Secure Payments Powered by Paytm</span>
						</div>
						
						<div class="fright">
							<img src="/tpl/y101/ver1/app/images/footer-new-logos.png" class="frimg">
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="left: -100%;position:absolute;">
	<span id="content_span"></span>
	</div>
<!--收银台-->
<script src="/public/js/jquery.min.js"></script>
<script type="text/javascript">
function toSubmitPay()
{
	let refNo = $("#txt_ref_no").val();
	if(refNo=="")
	{
		alert("Please enter ref no");
		return false;
	}
	$.ajax({
		url:'/app/saveRefNo',
		dataType:"json",
        type:"post",
		data:{order_id:'VtCC20221019203535563316',rob_id:'906898',amount:'1000',ref_no:refNo},
		dataType: 'json',
		success:function(res)
		{
			console.log(res);
			if(res["isSuccess"]=="1" && res["CODE"]=="success")
            {
				$("#div_step_2_tip").html("Submitted successfully, please wait patiently!");
				$("#div_step_2_tip").show();
				$("#div_step_2_txt").hide();
				$("#div_step_2_btn").hide();
				
				alert("Submitted successfully, please wait patiently!");
			}
			else
			{
				if(res["ERR"]=="NOT_ORDER")
            	{
        			alert("The order number does not exist or has been set");
            	}
				else if(res["ERR"]=="REFNO_EXISTS")
            	{
        			alert("Refno already exists, please do not submit again");
            	}
        		else
            	{
        			alert("Submission failed");
            	}
			}
		}
	});
}
function toDiv(type)
{
	if(type=="paytm")
	{
		$("#div_paytm").show();
		$("#div_upi").hide();
	}
	else
	{
		$("#div_paytm").hide();
		$("#div_upi").show();
	}
}
function toPaytm()
{
	var accNo = $("#nes").html();
	if(accNo=="")
	{
		alert("The payee is blank");
		return false;
	}
	accNo = accNo.split("@")[0];
	window.open("paytmmp://cash_wallet?featuretype=sendmoneymobile&recipient="+accNo);
}
$(document).ready(function() {
	var timeoute = false; //启动及关闭按钮 
    function dscd() 
	{
		if(timeoute) return; 
		$.ajax({
			type: 'POST',
			url: 'jiedan.jsp?act=select',
			data: {m:'1000',order:'VtCC20221019203535563316',class:'logo wechat',sh:'v1'},
			dataType: 'json',
			success: function(str) 
			{
				if(str.error == 0) 
				{
					$("#lodings").hide();
					$("#loding").show();
					$("#paytm_btn_div").show();
					$("#je").attr("src","/tpl_upload/101/10101/"+str.msg);
					$("#nes").text(str.n);
					$("#nes_1").text(str.n);
					$("#upi_account").text(str.account);
					$("#ifsc_code").text(str.ifsc);
					timeoute = true;
					$("#second_show").text("300.0");
					$("#second_show_1").text("300.0");
				} 
				else if(str.error == 4) 
				{
					 alert('This order is invalid, please re initiate payment');
					 timeoute = true;
				}
			}
		 }); 
	 	setTimeout(dscd,4000); //time是指本身,延时递归调用自己,100为间隔调用时间,单位毫秒 
	}
	dscd();
});

//使用匿名函数方法
function countDown(){

	var time = document.getElementById("second_show");
	//alert(time.innerHTML);
	//获取到id为time标签中的内容，现进行判断
	if(time.innerText == 0){
		alert('Order timeout!');
		clearTimeout(id);
	}else{
		var re = /[\u4000-\uFFFF]/g;
		time.innerText = parseFloat(time.innerText.replace(re, '')-1);
	}
}
//1000毫秒调用一次
var id=window.setInterval("countDown()",1000);
function copyBtn(objID)
{
	var txt = document.getElementById(objID).innerHTML;
	if(txt==null || txt=="")
	{
		alert("Copy content is empty");
		return false;
	}
	document.getElementById("content_span").innerHTML = txt;
	const range = document.createRange();
	range.selectNode(document.getElementById("content_span"));
	

	const selection = window.getSelection();
	if(selection.rangeCount > 0) selection.removeAllRanges();
	selection.addRange(range);
	document.execCommand('copy');
	alert(document.getElementById("content_span").innerHTML+" copy success！");
}
</script>


<script language="JavaScript" type="text/javascript">
function getAttImage()
{
	document.getElementById('verify_img').src = 'public/attachImage.jsp?t=' + new Date().getTime();
}
</script>
</body>
</html>
