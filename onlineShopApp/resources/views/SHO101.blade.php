@extends('layouts.app')

@section('content')

	<div class="container">
        <div>
        <form action="SHO101" method="post">
            @csrf
                <div class="panel-body">
                    検索条件を入力して下さい。
                    <table border="1">
                        <tr>
                            <td class="search-name">カテゴリ</td>
                            <td>
                                <select  class="search-value" name="category-id">
                                <option value="0">値を選択してください。</option>
                                <option value="1">カテゴリ1</option>
                                <option value="2">カテゴリ2</option>
                                <option value="3">カテゴリ3</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="search-name" width="150">商品名</td>
                            <td class="search-value"><input type="text" name="product-name" size="50"/></td>
                        </tr>
                        <tr>
                            <td class="search-name">販売元</td>
                            <td class="search-value"><input type="text" name="maker" size="50"/></td>
                        </tr>
                        <tr>
                            <td class="search-name">金額上限</td>
                            <td class="search-value"><input type="number" name="price-max" min="0" placeholder="数値を入力して下さい。"/></td>
                        </tr>
                        <tr>
                            <td class="search-name">金額下限</td>
                            <td class="search-value"><input type="number" name="price-min" min="0" placeholder="数値を入力して下さい。"/></td>
                        </tr>
                    </table>
            <button type="submit">検索</button>
            <button type="button" onclick="history.back()">戻る</button>
		    <button type="reset">クリア</button>
        </form>
        </div>

        <div>
        <?php if (count($products) > 0) : ?>
                <form  name="cart">
                @csrf
				<div class="panel panel-default">
					<div class="panel-heading">
						商品一覧
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th class="search-result-center">選択</th>
								<th class="search-result-center">商品コード</th>
                                <th>商品名</th>
								<th>販売元</th>
                                <th>金額(単価)</th>
								<th>メモ</th>
								<th class="search-result-center">購入数</th>
							</thead>
							<tbody>
								@foreach ($products as $product)
									<tr>
                                        <input type="hidden"name="choose_flag[]" value="false"/>
                                        <input type="hidden"name="choose_value[]" value="false"/>
                                        <input type="hidden"name="product_code[]" value="{{ $product->PRODUCT_CODE }}"/>
                                        <input type="hidden"name="product_name[]" value="{{ $product->PRODUCT_NAME }}"/>
                                        <input type="hidden"name="maker[]" value="{{ $product->MAKER }}"/>
                                        <input type="hidden"name="price[]" value="{{ $product->UNIT_PRICE }}"/>
                                        <td class="table-text search-result-center"><input type="checkbox" name="buy-flag[]" value="1"></td>
										<td class="table-text search-result-center"><div><a style="text-decoration:underline;" href="SHO102?product_code={{$product->PRODUCT_CODE}}">{{ $product->PRODUCT_CODE }}</a></div></td>
                                        <td class="table-text"><div>{{ $product->PRODUCT_NAME }}</div></td>
                                        <td class="table-text" ><div>{{ $product->MAKER }}</div></td>
                                        <td class="table-text" ><div>{{ $product->UNIT_PRICE }}</div></td>
                                        <td class="table-text" ><div>{{ $product->MEMO }}</div></td>
                                        <td class="search-result-center" width="100"><input type="number" name="buy-num[]" min="0"/></td>
                                        
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
                <button type="button" onClick="CartIn()">お買い物かごに入れる</button>
                 </form>
			
            <?php endif; ?>
           
        </div>
	</div>
@endsection
