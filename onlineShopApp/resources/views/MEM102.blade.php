@extends('layouts.app')

@section('content')
	<div class="container">
    この内容で登録しますか？
        <form action="MEM103" method="post">
            @csrf
		    <div>
                ●会員情報
                <?php $_POST ?>
                <div>
                    <div class="panel-body">
                        <table border="1">
                            <tr>
                                <td width="100">氏名</td>
                                <td width="300">{{ $_POST["name"]}}</td>
                            </tr>
                            <tr>
                                <td>年齢</td>
                                <td>{{ $_POST["age"]}}</td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td>{{ $_POST["sex"]}}</td>
                            </tr>
                            <tr>
                                <td>郵便番号</td>
                                <td>{{ $_POST["post-num"]}}</td>
                            </tr>
                            <tr>
                                <td>住所</td>
                                <td>{{ $_POST["address"]}}</td>
                            </tr>
                            <tr>
                                <td>電話番号</td>
                                <td>{{ $_POST["tel"]}}</td>
                            </tr>
                        </table>
                    </div>
		        </div>

                <input type="hidden" name="name"value="{{ $_POST["name"]}}"/>
                <input type="hidden" name="password" value="{{ $_POST["password"]}}"/>
                <input type="hidden" name="age"value="{{ $_POST["age"]}}"/>
                <input type="hidden" name="sex"value="{{ $_POST["sex"]}}"/>
                <input type="hidden" name="post-num"value="{{ $_POST["post-num"]}}"/>
                <input type="hidden" name="address"value="{{ $_POST["address"]}}"/>
                <input type="hidden" name="tel"value="{{ $_POST["tel"]}}"/>
            <button type="submit">登録</button>
            <button type="button" onclick="history.back()">戻る</button>
        </form>
	</div>
@endsection
