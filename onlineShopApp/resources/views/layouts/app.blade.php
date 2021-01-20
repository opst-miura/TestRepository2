<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>オンラインショップ</title>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>
    function CartIn(){
    document.cart.action="SHO103";
	document.cart.method="post";
	
    for(i = 0; i < document.getElementsByName("buy-flag[]").length; i++)
    {
            if(document.getElementsByName("buy-flag[]")[i].checked)
            {
                document.getElementsByName("choose_flag[]")[i].value= 'true';
            }
         }
    for(i = 0; i < document.getElementsByName("buy-num[]").length; i++)
        {
 
            if(document.getElementsByName("buy-num[]")[i].value=="")
            {
                document.getElementsByName("choose_value[]")[i].value= '0';
            }
            else
            {
                document.getElementsByName("choose_value[]")[i].value= document.getElementsByName("buy-num[]")[i].value;
            }
            }
       
     document.cart.submit();
    }
    </script>

	<style>
		body {
			font-family: 'Raleway';
			margin-top: 25px;
		}

        .page-name   { font-size:19px; text-decoration:underline;}

        .page-info   { font-size:13px;}

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .search-result-center {text-align: center;}

	</style>

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					    <a style="text-decoration:underline; class="navbar-brand" href="MEN101">オンラインショッピングサイト</a>
                        <p style="text-align:right;">
                        <?php
                            $date = date("Y/m/d");
                            $name = !isset($request) || !$request->session()->has('userId') ? 'ゲスト' : $request->session()->get('userName');
                            echo "$date 　ようこそ「 $name 」さん";
                        ?>
                        </p>
                        <?php
                        if(!isset($request) || !$request->session()->has('userId'))
                        {
                            echo "<input type=\"button\" value=\"ログイン画面へ\" onClick=\"location.href='login'\">";
                        }
                        else
                        {
                            echo "<input type=\"button\" value=\"ログアウト\" onClick=\"location.href='logout'\">";
                        }
                        ?>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						&nbsp;
					</ul>
				</div>
			</div>
		</nav>
	</div>
	@yield('content')
</body>
</html>
