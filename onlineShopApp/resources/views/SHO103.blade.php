@extends('layouts.app')

@section('content')
	<div class="container">
        <div>
        以下の商品をお買い物かごに登録しました。<br><br>

        ●商品一覧
						<table class="table table-striped task-table">
							<thead>
								<th class="search-result-center">商品コード</th>
                                <th>商品名</th>
								<th>販売元</th>
                                <th>金額(単価)</th>
								<th class="search-result-center">購入数</th>
							</thead>
							<tbody>
								@foreach($request->session()->get('product_code') as $idx => $flag)
									<tr>
                                        <td class="table-text search-result-center"><div>{{ $request->session()->get('product_code')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('product_name')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('maker')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('price')[$idx]}}</div></td>
                                        <td class="table-text search-result-center"><div>{{ $request->session()->get('choose_value')[$idx]}}</div></td>
									</tr>
								@endforeach
							</tbody>
						</table>
                <input type="button" value="お買い物かご" onClick="location.href='KGO101'">
                <input type="button" value="戻る" onClick="location.href='SHO101'">
        </div>
	</div>
@endsection
