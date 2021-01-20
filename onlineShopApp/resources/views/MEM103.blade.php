@extends('layouts.app')

@section('content')
	<div class="container">
		会員登録が完了しました。<br><br>
        あなたの会員NOは{{ $user->MEMBER_NO }}です。
        <input type="button" value="メニュー画面へ" onClick="location.href='MEN101'">
	</div>
@endsection
