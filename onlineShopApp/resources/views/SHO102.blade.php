@extends('layouts.app')

@section('content')
	<div class="container">
        <div>
        <!-- Books -->
				<div class="panel panel-default">
					<div class="panel-heading">
						商品詳細
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>商品名</th>
								<th class="search-result-center">画像</th>
                                <th>商品説明</th>
								<th>価格</th>
                                <th class="search-result-center">購入数</th>
							</thead>
							<tbody>
									<tr>
                                        <td width="200">{{ $product->PRODUCT_NAME }}</td>
                                        <td width="200"><img src="/asset/images/{{ $product->PICTURE_NAME }}" width="200" height="200"></td>
                                        <td width="200"><div>{{ $product->MEMO }}</div></td>
                                        <td width="200"><div>￥{{ $product->UNIT_PRICE }}</div></td>
                                        <td width="200"class="search-result-center" width="50"><input type="number" name="buy-num" min="0"/>個</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
                <input type="button" value="お買い物かごに入れる" onClick="location.href='KGO101'">
                <button type="button" onclick="history.back()">戻る</button>
        </div>
	</div>
@endsection
