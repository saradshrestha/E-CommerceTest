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
							<li class="breadcrumb-item active">Category</li>
						</ul>
					</div>
					<div class="col-auto float-right ml-auto">
						<a href="{{route('categoryCreate')}}" class="btn add-btn"><i class="fa fa-plus"></i> Create Category</a>
					</div>
				</div>
			</div>
			<!-- /Page Header -->	
			<div class="row">
				<div class="col-sm-12">
					<div class="card mb-0">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-stripped mb-0">
									<thead>
										<tr>
											<th>Title</th>
											<th>Image</th>
											<th>CODE</th>
											<th>Status</th>
											<th>Parent Class</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@forelse ( $categories as  $category)
										<tr>
											<td>{{  $category->title }}</td>
											<td>
												@if  ($category->image == Null)
												<img src="{{ asset ('Category/uploads/no-image.png') }}" width="100">
												
												 @else
												<img src="{{asset ('Category/uploads/'.$category->image) }}" width="100">
												 @endif
											</td>
											<td>{{ $category->code}}</td>
											<td>
												<input data-id="{{$category->id}}" class="toggle-class " type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $category->status ? 'checked' : '' }}>
											</td>			
											@if ($category->parent_id == 0)
												<td>Main Category</td>
											@else
											 	<td>{{  $category->subCategory->title }}</td>
											@endif
											<td style="padding-right:5px;">
												<button class="btn btn-primary" data-toggle="modal" data-target="#category_view{{ $category->id}}" ><i class="fa fa-eye"></i></button>
												<a href="{{ route('categoryEdit',  $category->id ) }}">
													<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
												</a>
												<button class="btn btn-danger" onclick= "deleteConfirmation({{ $category->id}} )">
													<i class="fa fa-trash"></i>
												</button>
											</td>
										</tr>
	<!--------------------------------------- Create CATEGORY VIEW Model -->
										<div id="category_view{{ $category->id}}" class="modal custom-modal fade" role="dialog">
											<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header" style="border-bottom: solid 1px orange; padding-bottom:2px;" >
														<h5 class="modal-title">Category Details</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
														</button>
													</div>

												<div class="modal-body">
													<p><strong>Category Title</strong>: {{ $category->title}}</p>
													<p><strong>Category Code</strong>: {{ $category->code}}</p>
													<p><strong>Category Description</strong>: {{ $category->details}}</p>
													<p><strong>Category Status</strong>: 
													@if  ($category->status == 1)
														 <a class="btn btn-white btn-sm btn-rounded" href="javascript:">
															<i class="fa fa-dot-circle-o text-success"></i> Active
														</a>
														@else
														<a class="btn btn-white btn-sm btn-rounded" href="javascript:">
															<i class="fa fa-dot-circle-o text-success"></i> In Active
														</a>
													@endif
													</p>
													<p><strong>Category Type</strong>: 
														@if ($category->parent_id == 0)
																Main Category
														@else
															{{ $category->subCategory->title }}
														@endif
													</p>
													<p>
														<strong>Category Image</strong>:  
													</p>
													<p>
													@if  ($category->image == Null)
														<img src="{{ asset ('Category/uploads/no-image.png') }}" width="200">
									
									 				@else
													<img src="{{asset ('Category/uploads/'.$category->image) }}" width="200">
								 					@endif
													</p>
													</div>
												</div>
											</div>
										</div>
									</div>
	<!----------------------------------------------- /Create Category View Modal -->
									@empty
										  <td colspan="6"> <strong><center>No Categories Found.</center></strong></td>
								    @endforelse
										
									</tbody>
								</table>
							</div>
						</div>
							<div class="d-flex justify-content-center">
    			{!! $categories->links() !!}
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





	<!-- Error Msg With Sweet Alert -->
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
 	<!-- Success Msg With Sweet Alert -->
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

 <!-- Delete Category With Sweet Alert -->

  	<script type="text/javascript">
		function deleteConfirmation(id) {
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
                    url: '/admin/category/delete/'+ id,
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


@endsection
