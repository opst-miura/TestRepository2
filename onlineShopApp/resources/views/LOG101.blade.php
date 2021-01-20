@extends('layouts.app')

@section('content')
	<div class="container">
        <form action="MEN101" method="post">
            @csrf
		    <div class="col-sm-offset-2 col-sm-8">
                <a style="text-decoration:underline; text-align: center;" href="MEN101">新規登録の方はこちら</a>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table>
                            <tr>
                                <td>会員NO:</td>
                                <td><input type="text" required name="staffNo"/></td>
                            </tr>
                            <tr>
                                <td>パスワード:</td>
                                <td><input type="text" required name="password"/></td>
                            </tr>
                        </table>
                    </div>
		        </div>
            <button type="submit">ログイン</button>
		    <button type="reset">クリア</button>
        </form>
	</div>
@endsection
