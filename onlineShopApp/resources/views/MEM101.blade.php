@extends('layouts.app')

@section('content')
	<div class="container">
    会員情報を入力して下さい。
        <form action="MEM102" method="post">
            @csrf
		    <div>
                ●会員情報
                <div>
                    <div class="panel-body">
                        <table border="1">
                            <tr>
                                <td>氏名</td>
                                <td><input type="text" required name="name"/></td>
                            </tr>
                            <tr>
                                <td>パスワード</td>
                                <td><input type="password" maxlength="8"required name="password" placeholder="最大8文字"/></td>
                            </tr>
                            <tr>
                                <td>パスワード(確認用)</td>
                                <td><input type="password" maxlength="8"required name="re-password" placeholder="最大8文字"/></td>
                            </tr>
                            <tr>
                                <td>年齢</td>
                                <td><input type="number"  min="0" required name="age"/></td>
                            </tr>
                            <tr>
                                <td>性別</td>
                                <td>
                                    <select name="sex">
                                    <option value="1">男性</option>
                                    <option value="2">女性</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>郵便番号</td>
                                <td><input type="text"  pattern="^\d{3}-\d{4}$" required name="post-num" placeholder="XXX-XXXX形式"/></td>
                            </tr>
                            <tr>
                                <td>住所</td>
                                <td><input type="text" maxlength="50" required name="address" placeholder="最大50文字"/></td>
                            </tr>
                            <tr>
                                <td>電話番号</td>
                                <td><input type="text" pattern="[0-9-]*" requiredmaxlength="20" name="tel" placeholder="数値+ﾊｲﾌﾝ 最大20文字"/></td>
                            </tr>

                        </table>
                    </div>
		        </div>
            <button type="submit">確認</button>
            <button type="button" onclick="history.back()">戻る</button>
		    <button type="reset">クリア</button>
        </form>
	</div>
@endsection
