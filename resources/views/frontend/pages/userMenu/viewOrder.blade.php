
@extends('frontend.pages.userMenu.layouts')

@section ('breadcrumb')
<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" style="margin-left: -20px;">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{ route('index') }}">Home</a></li>
							<li><a>{{auth()->user()->name}}</a></li>
							<li><a>All Orders</a></li>
							
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<!-- /BREADCRUMB -->
@endsection


@section('content')
<!-- User -->
	<div class="col-md-9" style="width:80%; height: 100%;border-left: solid 1px gainsboro;">
		<div class="row">
		<!-- user details -->
			<div class="col-md-9">
				<div class="user">
					<div class="title" style="padding-bottom: 30px;">
						<h3><center>User Details</center></h3>
					</div>
					<div class="table" style="margin-left: 30px">
						<table border="border-collapse: collapse ;" style="padding-right: 50px; padding-bottom: 10px">
						@if($orders->count() != 0)
							<tr>
								<th width="50" style="padding: 5px 0px 5px 0px"><center>S.No.</center></th>
								<th width="120"><center>Date</center></th>
								<th width="200"><center>Products</center></th>
								<th width="80"><center>Quantity</center></th>
								<th width="120"><center>Price</center></th>
								<th width="150"><center>Total Amount</center></th>
							</tr>
							
							<tr>
								@foreach($orders as $order)
								
								<td><center>{{ $no++}}</center></td>
								<td style="padding:2px 15px 2px 5px; ">{{  $order->created_at->format('j F, Y')}}</td>
								
									<td style="padding:2px 15px 2px 5px; ">
										@foreach ( $order->products as $product)
										{{ $product->product_name}} x {{ $product->pivot->quantity }}<br>
										 @endforeach
									</td>
									<td style="padding:2px 15px 2px 5px; "><center>
										@foreach ( $order->products as $product)
										x {{ $product->pivot->quantity }}<br>
										@endforeach </center>
									</td>
									<td style="padding:2px 15px 2px 5px; ">
										@foreach ( $order->products as $product)
										Rs. {{ $product->product_price}}<br>
										@endforeach
									</td>

							
								<td style="padding:5px 5px 5px 0px; text-align: right;">Rs. {{ $order->total_amount}}</td>
							</tr>				 
							@endforeach

							 @else
							 <strong>No Orders Has Been Placed.</strong>
							  @endif
							
											
						</table>
						{{ $orders ->links()}}
					</div>
				</div>
			</div>
	<!-- /user details -->
		</div>
	</div>
<!-- /User -->
@endsection     


       


