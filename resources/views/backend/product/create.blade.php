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
							<li class="breadcrumb-item "><a href="{{route ('productIndex')}}">Product</a></li>
							<li class="breadcrumb-item active">Create</li>
						</ul>
					</div>
					<div class="col-auto float-right ml-auto">
						<a href="{{route('productIndex')}}" class="btn add-btn"><i class="fa fa-arrow-left " aria-hidden="true"></i> Return Back</a>
					</div>
				</div>
			</div>

			<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<form method="Post"  action="{{ route('productStore') }}" enctype="multipart/form-data" >
										 @csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="title">Product Category</label>
													<select class="select2 form-control" name="category_id" placeholder="Please Select Category">
														<option disabled selected="" hidden="">
															Select Product Category
														</option>
														<!-- Main Category List -->
														@forelse( $main_cats as $main_cat)
														<option value= "{{ $main_cat->id}}" disabled="" style="font-weight: bold;">
														 	{{$main_cat->title}}
														</option>
														<!-- Sub Category List Start -->
															@forelse($main_cat->mainCategory as  $cat)
																<option value= "{{ $cat->id}}"  > 
																	---{{ $cat->title}}
																</option>
															@empty
																<option disabled style="font-weight: bold">
																	--- No. Sub Category Found. 
																</option>
														  	@endforelse
														<!-- Sub Category List End  -->
															
														@empty
															<option disabled>
																No. Category Found. 
															</option>
														@endforelse
													</select>
													@error('category_id')
									    				<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>

												<div class="form-group">
													<label for="product_name">Product Name</label>
													<input type="text" class="form-control" id="product_name" name="product_name" value="{{old ('product_name')}}">
													@error('product_name')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
												
												<div class="form-group">
													<label>Product Code</label>
													<input type="text" class="form-control" name="product_code" value="{{old ('product_code')}}">
													@error('code')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group">
													<label>Product Price</label>
													<input type="text" class="form-control" name="product_price" value="{{old ('product_price')}}">
													@error('product_price')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
												
												<div class="form-group">
													<label for ="image">Product Image</label>
													<input type="file" class="form-control" id=" image"name="image" value="{{old ('product_image')}}">
													@error('image')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>

												
											</div>
											<div class="col-md-6">													
												<!-- Product Description Div Start -->
												<div class="form-group">
													<label for="product_details"> 
														Product Description
													</label>
													<textarea class="form-control" id="product_details" cols="30" rows="16" name="product_details"></textarea>
													@error('product_details')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
												<!-- Product Description Div End -->

												<!-- Status Div Start -->
												<div class="form-group row">
													<label class="col-lg-12 col-form-label">Status</label><br>
													<div class="col-lg-9">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="product_status" id="product_status" value="1"  checked>
															<label class="form-check-label">
															Active
															</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="product_status"  value="0">
															<label class="form-check-label">
															Deactive
															</label>
														</div>
														@error('product_status')
									    				<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
													</div>
													
												</div>
												<!-- Status Div End -->

												<!-- Feature Product Div Start -->
												<div class="form-group row">
													<label for="feature_product" class="col-lg-12 col-form-label">Is Featured Product ?</label>
													<div class="col-lg-9">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="featured_product"  value="1" id="feature_product" checked>
															<label class="form-check-label" >
															Yes
															</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="featured_product"  value= 0>
															<label class="form-check-label">
															No
															</label>
															</div>
													@error('featured_product')
									    				<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
														</div>
													
												<!-- Feature Product Div End -->
												
											</div>
											<div class="col-md-12">
												<div class="text-left">
													<button type="submit" class="btn btn-primary">Submit</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

@endsection