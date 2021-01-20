@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					メインメニュー
				</div>
                <div class="panel-body">
                    <table>
                        <tr>
                            <td class="page-name"><a href="MEM101">新規会員登録</a></td>
                            <td class="page-info"> 　 ：会員情報の登録を行います。</td>
                        </tr>
                        <tr>
                            <td class="page-name">会員情報変更・削除</td>
                            <td class="page-info"> 　 ：会員情報の変更、削除を行います。（工事中）</td>
                        </tr>
                        <tr>
                            <td class="page-name"><a href="SHO101">商品検索</a></td>
                            <td class="page-info"> 　 ：購入する商品の検索を行います。</td>
                        </tr>
                        <tr>
                            <td class="page-name"><a href="KGO101">お買い物かご</a></td>
                            <td class="page-info"> 　 ：商品の注文を行います。</td>
                        </tr>
                    </table>
                    <form action="SHO103" method="post">
                    <button type="submit">検索</button>
                    </form>
                </div>
		</div>
        <input type="button" value="ログイン" onClick="location.href='login'">
        <input type="button" value="ログアウト" onClick="location.href='logout'">
	</div>
@endsection
