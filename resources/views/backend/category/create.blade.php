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
						<h3 class="page-title">Category</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{route ('adminDashboard')}}">Dashboard</a></li>
							<li class="breadcrumb-item "><a href="{{route ('categoryIndex')}}">Category</a></li>
							<li class="breadcrumb-item active">Create</li>
						</ul>
					</div>
					<div class="col-auto float-right ml-auto">
						<a href="{{route('categoryIndex')}}" class="btn add-btn"><i class="fa fa-plus"></i> Return Back</a>
					</div>
				</div>
			</div>

			<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<form method="Post"  action="{{ route('categoryStore') }}" enctype="multipart/form-data" >
										 @csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="title">Under Main Category</label>
													<select class="select2 form-control" name="parent_id">
														
														<option disabled> Select Parent Category</option>
														<option value="0" selected>Main Category</option>
														@foreach( $main_cats as $maincat)
														<option value= "{{ $maincat->id }}"> {{$maincat->title}}</option>
														 @endforeach
													</select>
													@error('title')
									    				<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
												{{-- For Sub Category Testing --}}
											{{-- 	<div class="form-group">
													<label for="title">Under Sub - Category</label>
													<select class="select2 form-control" name="parent_id">
														
														<option disabled> Select From Sub Category</option>
														<option value="">Sub Category</option>
														@foreach( $sub_cats as $cat)
															<option value= "{{ $cat->id}}" > {{ $cat->title}} </option>
														@endforeach
													</select>
													@error('title')
									    				<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div> --}}
												
												<div class="form-group">
													<label>Category Code</label>
													<input type="text" class="form-control" name="code" value=" {{ old  ('code')}}">
													@error('code')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
												
												<div class="form-group">
													<label>Category Image</label>
													<input type="file" class="form-control" name="image" value=" {{ old  ('image')}}">
													@error('image')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>

												
											</div>
											<div class="col-md-6">													
												<div class="form-group">
													<label for="title">Category Title</label>
													<input type="text" class="form-control" name="title" value=" {{ old  ('title')}}">
													@error('title')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
												<div class="form-group">
													<div class="form-check">
														<label for="checkbox" style="margin-left: -18px;">Active</label>
														<input class="form-check-input" type="checkbox" value=" {{ old  ('status') ?? 1}}" name ="status" checked="" style="margin-left: 20px;">
														@error('status')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
													</div>
												</div>
												<div class="form-group">
													<label> Category Description</label>
													<textarea class="form-control"  cols="30" rows="10" name="details">{{ old  ('status')}}</textarea>
													@error('details')
										    			<div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
													@enderror
												</div>
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