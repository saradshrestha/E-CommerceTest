
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
						<table>
							<tr >
								<th style="padding-right:50px;padding-bottom:10px; ">S.No.</th>
								<th style="padding-right:50px;padding-bottom:10px">Date</th>
								<th style="padding-right:50px;padding-bottom:10px">Products</th>
								<th style="padding-right:50px;padding-bottom:10px">Price</th>
								<th style="padding-right:50px;padding-bottom:10px">Total Amount</th>
							</tr>
							 @forelse  ( $orders as  $order)
							<tr >
								
								<td style="padding-right:50px;padding-bottom:10px">{{ $no++}}</td>
								<td style="padding-right:50px;padding-bottom:10px">{{  $order->created_at->format('j F, Y')}}</td>
								
									<td style="padding-right:50px;padding-bottom:10px">
										@foreach ( $order->products as $product)
										{{ $product->product_name}}<br>
										 @endforeach
									</td>
									<td style="padding-right:50px;padding-bottom:10px">
										@foreach ( $order->products as $product)
										Rs. {{ $product->product_price}}<br>
										@endforeach
									</td>
							
								<td style="padding-right:50px;padding-bottom:10px">Rs. {{ $order->total_amount}}</td>
								
							</tr>
							 @empty
							 <strong>No Orders Has Been Placed.</strong>
							 @endforelse
							
										
						</table>
					</div>
				</div>
			</div>
	<!-- /user details -->
		</div>
	</div>
<!-- /User -->
@endsection     


       


