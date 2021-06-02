@extends('backend.includes.main')

@section('content')

<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
							<div class="col-12">
										<h3 class="page-title">Leave Settings</h3>
										<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route ('adminDashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Change Password</li>
								</ul>
							</div>
						<div class="col-md-6 offset-md-3">
						
							<!-- Page Header -->
							<div class="page-header">
								<div class="row">
								
									<div class="col-sm-12">
										<h3 class="page-title">Change Password</h3>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
							
							<form method="Post" action ="{{route('passwordChangeSubmit' )}}">
								 @csrf

								<div class="form-group">
									<label>Old password <span style="color:red;">*</span> </label>
									<input type="password" class="form-control" name='current_password' required>
									@error('current_password')
									    <div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label>New password <span style="color:red;">*</span></label>
									<input type="password" class="form-control" name="new_password">
									@error('new_password')
									    <div class="danger" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label>Confirm password <span style="color:red;">*</span></label>
									<input type="password" class="form-control" name="confirm_new_password">
									@error('confirm_new_password')
									    <div class="danger" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
									@enderror
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Update Password</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Page Content -->
				
			</div>
			<!-- /Page Wrapper -->
@endsection
