<!doctype html>
<html >
<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  
  
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
	<script type="text/javascript" src="javascript/jquery.onepage-scroll.js"></script>
	
	<script type="text/javascript" src="javascript/semantic.min.js"></script>
	<!--<script type="text/javascript" src="javascript/validate-form.js"></script>-->
	<link href='css/onepage-scroll.css' rel='stylesheet' type='text/css'>
	
	
	<link href='css/semantic.css' rel='stylesheet' type='text/css'>
	<!--<link href='css/semantic.min.css' rel='stylesheet' type='text/css'>-->
	<link href='css/lms.css' rel='stylesheet' type='text/css'>
<script>
	  $(document).ready(function(){

	var validationRules = {
        firstName: {
      identifier  : 'first-name',
      rules: [
        {
          type   : 'empty',
          prompt : '請輸入您的姓氏'
        }
      ]
    },
    lastName: {
      identifier  : 'last-name',
      rules: [
        {
          type   : 'empty',
          prompt : '請輸入您的名字'
        }
      ]
    },
    username: {
      identifier : 'username',
      rules: [
        {
          type   : 'empty',
          prompt : '請輸入用戶名'
        }
      ]
    },
    email: {
      identifier : 'email',
      rules: [
        {
          type   : 'empty',
          prompt : '請輸入您的信箱'
        },
        {
          type   : 'email',
          prompt : '請輸入正確的信箱地址'
        }
      ]
    },
    password: {
      identifier : 'password',
      rules: [
        {
          type   : 'empty',
          prompt : '請輸入密碼'
        },
        {
          type   : 'length[6]',
          prompt : '該密碼不能小於6個字'
        }
      ]
    },
    passwordConfirm: {
      identifier : 'password-confirm',
      rules: [
        {
          type   : 'empty',
          prompt : '請輸入密碼'
        },
        {
          identifier : 'password-confirm',
          type       : 'match[password]',
          prompt     : '密碼不一致'
        }
      ]
    },
    terms: {
      identifier : 'terms',
      rules: [
        {
          type   : 'checked',
          prompt : '請勾選'
        }
      ]
    }
  };
	
	$('#add')
      .form(validationRules, {
		inline: true,
        on: 'blur',
		onValid: submitf,
		onSuccess: submitall
      })
    ;
	$('#login').form(validationRules, { onSuccess: submitForm });
	  
	$('.ui.checkbox')
		.checkbox()
	;
	function submitall(){
		var formData1 = {
          username: getFieldValue1('username'),
		  firstname: getFieldValue1('first-name'),
		  lastname: getFieldValue1('last-name'),
		  email: getFieldValue1('email'),
		  password: getFieldValue1('password'),
		  type: 'insert'
      };
	  $.ajax({ type: 'POST', url: 'usernamechek.php', data: formData1, success: onFormSubmitted });
	}

	function getFieldValue1(fieldId) { 
      // 'get field' is part of Semantics form behavior API
      return $('#add').form('get field', fieldId).val();
   }

   function submitf() {
      var formData1 = {
          username: getFieldValue1('username'),
		  firstname: getFieldValue1('first-name'),
		  lastname: getFieldValue1('last-name'),
		  email: getFieldValue1('email'),
		  password: getFieldValue1('password'),
		  type: 'check'
      };
	if(getFieldValue1('username')!='')
      $.ajax({ type: 'POST', url: 'usernamechek.php', data: formData1, success: onFormSubmitted });
   }

   // Handle post response
   function onFormSubmitted(response) {
       if(response=="此帳號可用！"){
			$('#un-er').css( 'display', 'none' );
			$('#un-su').css( 'display', 'block' );
			$('#un-su').html("<i class=\"big ok sign icon\"><\/i>"+response);

}
	   else if(response=="新增成功！"){
			$('#add_suc').dimmer('show');
			}else
			{
				$('#un-su').css( 'display', 'none' );
				$('#un-er').css( 'display', 'block' );
				$('#un-er').html("<i class=\"big delete sign icon\"><\/i>"+getFieldValue1('username')+"<-"+response);
				$('#add').form('get field', 'username').val('');
			}
   }

	

//Get value from an input field
   function getFieldValue(fieldId) { 
      // 'get field' is part of Semantics form behavior API
      return $('#login').form('get field', fieldId).val();
   }
   

   function submitForm() {
   var formData = {
          username: getFieldValue('username'),
		  password: getFieldValue('password')
      };

    var $thisform = $('#login');
    var processfile = "idchek.php"; /* gets the form destination page */
    $.ajax({
       type: "POST",
	   beforeSend:function(){
            $('#log').addClass("loading"); 
            //beforeSend 發送請求之前會執行的函式
        },
       dataType: "html",
       data: formData,
       url: processfile,

       success: function (result) {
			if(result==="登入成功！")
				window.location.href = 'index.php';
            $('.error.message').html(result).fadeIn();
			$('#log').removeClass("loading");

       },
       error: function () {

            $('.error.message').html("error");

       }
    });
   }


	
  // selector cache
  var
    $examples   = $('.cont'),
    $showButton = $examples.find('.show.button'),
    $pageButton = $examples.find('.page.button'),
    $hideButton = $examples.find('.hide.button'),
    // alias
    handler
  ;

  // event handlers
  handler = {
    show: function() {
      $(this)
        .closest('.example')
        .find('.segment')
          .dimmer('show')
      ;
    },
    hide: function() {
      $(this)
        .closest('.example')
        .find('.segment')
          .dimmer('hide')
      ;
    },
    page: function() {
      $('.cont > #login-dimmer')
        .dimmer('show')
      ;
    }
  };
  
  $pageButton
    .on('click', handler.page)
  ;
  $showButton
    .on('click', handler.show)
  ;
  $hideButton
    .on('click', handler.hide)
  ;

	
	  });	
	

</script>
<style>
.login #reg_form{
		font-size:110%;
		color:rgb(0,0,0);
    }
.login{
		padding-top:20px;
		padding-right:20px;
		padding-left:20px;
	
		color:white;
		float:left;
		bottom: 20%;
		right:25%;
		position: absolute;
		z-index: 3;
		width:40%;
		height:60%;
		background: rgba(30%,70%,50%,0.5);
		border-radius: 30px;
    }
</style>
<title>學習管理系統</title>
</head>

<body>
<div class="ui large teal inverted menu">
	<div class="menu">
		<?php include("login_header.php");?>
	</div>
</div>	
<div class="cont">
			
		
			<!--登入表單-->
			<div id="login-dimmer" class="ui page dimmer">
			  <div class="content">
	
				  
				  <div class="login">
				  <h2 class="ui small inverted icon header">
					<i class="icon circular inverted emphasized blue user"></i>
					帳號登入
				  </h2>
				
					<div id="login" class="small ui form segment">
					<!-- <form id="form" name="form" method="post">-->
					  <div class="field">
						<label id="reg_form">用戶名</label>
						<div class="ui left labeled icon input">
						  <input type="text"  name="username" placeholder="請輸入用戶名">
						  <i class="user icon"></i>
						  <div class="ui corner label">
							<i class="icon asterisk"></i>
						  </div>
						</div>
					  </div>
					  <div class="field">
						<label id="reg_form">密碼</label>
						<div class="ui left labeled icon input">
						  <input type="password" name="password" placeholder="請輸入密碼">
						  <i class="lock icon"></i>
						  <div class="ui corner label">
							<i class="icon asterisk"></i>
						  </div>
						</div>
					  </div>
					  <div class="ui error message">
					  </div>
					  <div id="log"  class="ui blue submit button animated">
					  
						<div class="visible content">Login</div>
						<div class="hidden content">登入</div>
					  
					  </div>
					  <!--</form>-->
					</div>
					
					
					</div>
			
			  </div>
			</div>
		
	
			<div class="ui two column middle aligned relaxed grid basic segment">
				
				<div class="center aligned column" >
					<i class="icon red big circular inverted emphasized blue down"></i>
					<h1 class="ui red  icon header">我已經有帳號了</h1>
					
					<div class="ui horizontal divider">
							 <i class="down icon"></i>
						</div>
							
					<div class="massive blue ui page icon labeled animated button">
								
								<i class="sign in icon"></i>
								<div class="visible content">使用本帳戶登入</div>
								<div class="hidden content">Log-In</div>
									
						
					</div>
						<div class="ui horizontal divider">
							 <i class=" facebook basic icon"></i>
						</div>
						<div class="massive facebook ui icon labeled animated button">
								<i class="facebook icon"></i>
								<div class="visible content">用其他方式登入</div>
								<div class="hidden content">
									　　Facebook帳戶
								  </div>
							</div>
						<div class="ui horizontal divider">
							 <i class="google plus sign  icon"></i>
						</div>
						<div class="massive google plus ui icon labeled animated button">
								<i class="google plus icon"></i>
								<div class="visible content">用其他方式登入</div>
								<div class="hidden content">
									　　Google Plus帳戶
								  </div>
							</div>
							
				
				</div>
				<div class="ui vertical divider">
				Or
				</div>
			
				<div class="column">
				
					<i class="icon big circular inverted emphasized blue add user basic"></i>
					<h1 class="ui inverted  icon header">註冊新會員</h1>
					
					<div id="add" class="ui tertiary inverted  purple form segment">

					<div class="two fields">
						<div class="field">
						  <label id="reg_form">姓氏：</label>
						  <input placeholder="請填入姓氏" name="first-name" type="text">
						</div>
						<div class="field">
						  <label id="reg_form">名字：</label>
						  <input placeholder="請填入名字" name="last-name" type="text">
						</div>
					 
					</div>
					<div class="two fields">
					<div id="username" class="field">
						<label id="reg_form">用戶名</label>
						<input placeholder="請填入用戶名"  name="username" type="text">
					  </div>
					<div class ="field">
						
						 <div id="un-su"  style="display: none;" class="ui green message"><i class="big ok icon"></i> 
						 </div>
						 <div id="un-er"  style="display: none;" class="ui red message"><i class="big delete basic icon"></i>
						 </div>
						 </div>
					 </div>
					  <div class="field">
						<label id="reg_form">電子信箱</label>
						<input type="email" name="email" placeholder="123@123.com">
					  </div>
					  <div class="two fields">
						  <div class="field">
							<label id="reg_form">密碼</label>
							<input type="password" name="password" placeholder="請輸入密碼">
						  </div>
						  <div class="field">
							<label id="reg_form">確認密碼</label>
							<input type="password" name="password-confirm" placeholder="請輸入密碼">
						  </div>
						</div>
					  <div class="inline field">
						<div class="ui checkbox">
						  <input type="checkbox" name="terms" />
						  <label>同意加入網站系統</label>
						</div>
					  </div>
					  <div class="ui blue submit button animated">
					  
						<div class="visible content">Submit</div>
						<div class="hidden content">確認送出</div>
					  
					  </div>
					</div>
			
					</div>
					</div>
				<div id="add_suc" class="ui page dimmer">
					<div class="content">
						<div class="center">
							<h2 id="add_su" class="ui inverted icon header">
							<i class="icon circular inverted emphasized red heart"></i>
								謝謝您註冊網站系統帳戶
					
							</h2>
						</div>
					</div>
				</div>
		<div id="add_suc" class="ui page dimmer">
				<div class="content">
					<div class="center">
						<h2 id="add_su" class="ui inverted icon header">
						<i class="icon circular inverted emphasized red heart"></i>
							謝謝您註冊網站系統帳戶！
				
						</h2>
					</div>
				</div>
			</div>
		
	
</div>
<!--Footer網頁引入-->
<?php require_once("footer.php");?>
</body>
</html>
