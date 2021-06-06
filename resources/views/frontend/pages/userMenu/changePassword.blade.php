
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
							<li><a>Change Account Password</a></li>				
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
						<h3><center>Change Password</center></h3>
					</div>
					<div class="table" style="margin-left: 100px">
						<form action = "{{ route('changePasswordSubmit') }}" method="post">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label style="padding-right:10px;" >Current Password</label>
								<input type="password" name="current_password" required>
								@error('current_password')
								    <div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label style="padding-right: 32px;">New Password</label>
								<input type="password" name="new_password" required>
								@error('new_password')
								    <div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label style="padding-right: 5px;">Confirm Password</label>

								<input type="password" name="confirm_password" required>
								@error('confirm_password')
								    <div class="has-error" style="padding-left: 10px; background-color: red; border-radius: 5px;">{{ $message }}</div>
								@enderror
							</div>
							<button class="btn btn-primary" type="submit"> Save</button>
						</form>
					</div>
				</div>
			</div>
	<!-- /user details -->
		</div>
	</div>
<!-- /User -->
@endsection     


       


