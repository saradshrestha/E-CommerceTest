@extends('backend.includes.main')

@section('content')
		<!-- Page Wrapper -->
    <div class="page-wrapper">
		<!-- Page Content -->
        <div class="content container-fluid">
			<!-- Page Header -->
			<div class="page-header">        
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">Product</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{route ('adminDashboard')}}">Dashboard</a></li>
							<li class="breadcrumb-item active">Product</li>

						</ul>
					</div>
					<div class="col-auto float-right ml-auto">
						<a href="{{route('productCreate')}}" class="btn add-btn"><i class="fa fa-plus"></i> Create Product</a>
					</div>
				</div>
			</div>
			<!-- /Page Header -->	
			<div class="row">
				<div class="col-sm-12">
					<div class="card mb-0">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-stripped mb-0" style="text-align: center;">
									<thead>
										<tr>
											<th>Name</th>
											<th>Image</th>
											<th>Product Code</th>
											<th>Status</th>
											<th>Featured</th>
											<th>Price</th>
											<th>Category</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>
										@if( $products->count() != 0 )
										 	@foreach($products as $product)
											<tr>
												<td>{{  $product->product_name }}</td>
												<td>
												@if($product->product_image == Null)
													<img src="{{ asset('Category/uploads/no-image.png') }}" width="100">
												@else
													<img src="{{ asset('Products/uploads/'.$product->product_image) }}" width="100">
												 @endif
											</td>
											<td>{{$product->product_code}}</td>
	<!------------------------------------ Product Status --------------------------------------------->
											<td>
												<input data-id="{{$product->id}}" class="toggle-class-product" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $product->status ? 'checked' : '' }}>

											</td>

<!------------------------------------- Feature Product ---------------------------------------------->
											<td>
										
													@if ($product->featured_product == 1)

														<a href="javascript:" class="badge-primary productFeatureChange" id="status-{{$product->id}}" product_id= "{{$product->id}}" status ="{{ $product->featured_product}}" style="font-weight: bold;" >Yes</a>													
													
													@else

														<a href="javascript:" class="badge-primary productFeatureChange" id="status-{{$product->id}}" product_id= "{{$product->id}}" status ="{{ $product->featured_product}}" style="font-weight: bold;">No</a>


													<!-- <a class="text-danger productFeatureChange" href="javascript:" style="min-width: 55px;" id="product-{{ $product->id}}" status="{{ $product->featured_product}}" product_id= "{{$product->id}}">
														<i class="fa fa-dot-circle-o text-danger"></i> No
													</a> -->
													@endif
												
											</td>

											<td>{{  $product->product_price }}</td>
											<td>{{  $product->category->title }}</td>
											<!-- Action Buttons Start -->
											<td style="padding-right:5px;">
												<button class="btn btn-primary" data-toggle="modal" data-target="#product_view{{ $product->id}}" ><i class="fa fa-eye"></i></button>
												<a href="{{ route('productEdit',$product->id ) }}">
													<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
												</a>
												<button class="btn btn-danger" 
												onclick= "productDeleteConfirmation({{ $product->id }})">
													<i class="fa fa-trash"></i>
												</button>
											</td>
											<!-- Action Buttons End -->
										</tr>

<!------------------------ Create Product VIEW Model -------------------------------->
										<div id="product_view{{ $product->id}}" class="modal custom-modal fade" role="dialog">
											<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header" style="border-bottom: solid 1px orange; padding-bottom:2px;" >
														<h5 class="modal-title">Product Details</h5>

														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">
														<p><strong>Product Title</strong>: {{ $product->product_name}}</p>
														<p><strong>Product Code</strong>: {{ $product->product_code}}</p>
														<p><strong>Product Description</strong>: {{ $product->product_details}}</p>
														<p><strong>Product Status</strong>: 
															@if  ($product->product_status == 1)
															 <a class="btn btn-white btn-sm btn-rounded" href="javascript:">
																<i class="fa fa-dot-circle-o text-success"></i> Active
															</a>
															@else
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:">
															<i class="fa fa-dot-circle-o text-danger"></i> In Active
															</a>
															@endif
														</p>

														<p><strong>Featured Product</strong>: 
															@if($product->featured_product == 1)
															 <a class="btn btn-white btn-sm btn-rounded" href="javascript:">
																<i class="fa fa-dot-circle-o text-success"></i>Yes
															</a>
															@else
															<a class="btn btn-white btn-sm btn-rounded" href="javascript:">
															<i class="fa fa-dot-circle-o text-danger"></i>No
															</a>
															@endif
														</p>
														<p><strong> Product Category</strong>: 
														
															{{$product->category->title}}
													
														</p>
														<p>
															<strong>Product Image</strong>:  
														</p>
														<p>
															@if($product->product_image == Null)
																<img src="{{ asset ('Category/uploads/no-image.png') }}" width="200">
											
											 				@else
																<img src="{{asset('Products/uploads/'.$product->product_image) }}" width="200">
											 					@endif
															</p>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /Create Project Modal -->									  
										 @endforeach
										 @else
										 <td colspan="8"> <strong><center>No Product(s) Found.</center></strong></td>
										 @endif
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="d-flex justify-content-center">
    						{!! $products->links() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content -->
    </div>
	<!-- /Page Wrapper -->
@endsection
 
@section('js')
<script src="{{ asset('backend/assets/js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>

	<script type="text/javascript">
		$(".productFeatureChange").click(function ()
		{
			var status = $(this).attr('status');
			var product_id = $(this).attr('product_id');
			
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				        url: '/admin/product/featurestatus',
				        type: 'post',
				        data: {
				            '_token': CSRF_TOKEN,
				            'product_id': product_id,
				            'status': status, 
				        },
				        success: function(resp){
				        	if (resp['status'] == 1){
				        		$("#status-"+product_id).html('<a href="javascript:" class="badge-primary productFeatureChange" id="status-{{$product->id}}" product_id= "{{$product->id}}" status ="{{ $product->featured_product}}"style="font-weight: bold;" >Yes</a>')
				        	}
				        	else
				        	{
				        		$("#status."+product_id).html('<a href="javascript:" class="badge-primary productFeatureChange" id="status-{{$product->id}}" product_id= "{{$product->id}}" status ="{{ $product->featured_product}}"style="font-weight: bold;" >No</a>')		
				        	}
				        },
				        error: function(){
				        	alert ('Error');
				        }
				    });
		} )
	</script>






<!----- Delete Category With Sweet Alert -->

  	<script type="text/javascript">
		function productDeleteConfirmation(id) {
        Swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '/admin/product/delete/'+id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                        if (results.success === true) {
                            Swal.fire("Done!", results.message, "success").then
                                 (function(){ 
                                location.reload();
                            });
                        } else {
                            Swal.fire("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
  	</script>

<!---------- Error Msg With Sweet Alert -->
	@if(Session::has('error'))
	{
  		<script type="text/javascript">
  			Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: '{{ Session::get ('error')}}'
				})
 		</script>
	}
 	@endif
<!----- Success Msg With Sweet Alert -->
	@if  (Session::has('success'))
	{
  		<script type="text/javascript">
  			Swal.fire({
				  icon: 'success',
				  title: 'Great',
				  text: '{{ Session::get('success')}}'
				} )
 		</script>
	}
  	@endif


@endsection
