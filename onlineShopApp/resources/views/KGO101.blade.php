@extends('layouts.app')

@section('content')
	<div class="container">
        
        ●商品一覧
        <?php if ($request->session()->get('kagoIsNull')== "false" ): ?>
                        <form action="KGO102" method="post">
                        @csrf
						<table class="table table-striped task-table">
							<thead>
                                <th>選択</th>
								<th class="search-result-center">商品コード</th>
                                <th>商品名</th>
								<th>販売元</th>
                                <th>金額(単価)</th>
								<th class="search-result-center">購入数</th>
							</thead>
							<tbody>
								@foreach($request->session()->get('product_code') as $idx => $flag)
									<tr>
                                        <td class="table-text search-result-center"><input type="checkbox" name="torikeshi[]" value="1"></td>
                                        <td class="table-text search-result-center"><div>{{ $request->session()->get('product_code')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('product_name')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('maker')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('price')[$idx]}}</div></td>
                                        <td class="table-text search-result-center"><div><input type="number" name="choose_value[]" min="0" value="{{ $request->session()->get('choose_value')[$idx]}}"/><div></td>
                                        <input type="hidden"name="choose_value[]" value="false"/>
                                        <input type="hidden"name="product_code[]" value="{{ $request->session()->get('product_code')[$idx]}}"/>
                                        <input type="hidden"name="product_name[]" value="{{ $request->session()->get('product_name')[$idx]}}"/>
                                        <input type="hidden"name="maker[]" value="{{ $request->session()->get('maker')[$idx]}}"/>
                                        <input type="hidden"name="price[]" value="{{ $request->session()->get('price')[$idx]}}"/>
									</tr>
								@endforeach
							</tbody>
						</table>
                <input type="button" value="取り消し"  disabled onClick="location.href='KGO101_torikeshi'">
                <input type="button" value="買い物をやめる" onClick="location.href='KGO101_allCancel'">
                <button type="submit">注文する</button>
                <input type="button" value="メニューへ" onClick="location.href='MEN101'">
                </form>
            <?php else: ?>
            かごの中に商品は入ってません。
          <?php endif; ?>

   
	</div>
@endsection
