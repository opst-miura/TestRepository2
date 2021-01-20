@extends('layouts.app')

@section('content')
	<div class="container">

        <?php
        $sumPrice='0';
        $tax='10';
        ?>

        ●商品一覧
        <?php if($request->session()->get('kagoIsNull')== "false" ): ?>
        
                    
						<table class="table table-striped task-table">
							<thead>
								<th class="search-result-center">商品コード</th>
                                <th>商品名</th>
								<th>販売元</th>
                                <th>金額(単価)</th>
								<th class="search-result-center">購入数</th>
							</thead>
							<tbody>
								@foreach($request->session()->get('product_code') as $idx => $flag)o
									<tr>
                                        <td class="table-text search-result-center"><div>{{ $request->session()->get('product_code')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('product_name')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('maker')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('price')[$idx]}}</div></td>
                                        <td class="table-text"><div>{{ $request->session()->get('choose_value')[$idx]}}</div></td>
									</tr>
                                    <?php $sumPrice= $request->session()->get('price')[$idx] * (int)$request->session()->get('choose_value')[$idx];?>
								@endforeach
							</tbody>
						</table>
                        <br>
                
             ●料金
             <br>
             <table>
                <tr>
                    <td>小計</td>
                    <td>　{{$sumPrice}}円</td>
                </tr>
                <tr>
                    <td>消費税</td>
                    <td>　{{$sumPrice / $tax}}円</td>
                </tr>
                <tr>
                    <td>合計金額</td>
                    <td>　{{$sumPrice + $sumPrice / $tax}}円</td>
                </tr>
                
             </table>

                <input type="button" value="買い物をやめる" onClick="location.href='KGO101_allCancel'">
                <input type="button" value="注文する" onClick="location.href='kojichu'">
                <input type="button" value="メニューへ" onClick="location.href='MEN101'">
            <?php else: ?>
            かごの中に商品は入ってません。
          <?php endif; ?>

   
	</div>
@endsection
