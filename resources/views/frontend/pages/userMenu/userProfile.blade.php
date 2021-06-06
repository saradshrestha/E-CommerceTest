
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
					<div class="table" style="margin-left: 100px">
						<table>
							<tr >
								<th style="padding-right:50px;padding-bottom:10px; ">Name :</th>
								<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
							</tr>
							<tr >
								<th style="padding-right:50px;padding-bottom:10px">Email :</th>
								<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->email}}</td>
							</tr>
							<tr >
								<th style="padding-right:50px;padding-bottom:10px">Phone :</th>
								<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
							</tr>
							<tr >
								<th style="padding-right:50px;padding-bottom:10px ">Gender :</th>
								<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
							</tr>
							<tr >
								<th style="padding-right:50px;padding-bottom:10px">Address :</th>
								<td style="padding-right:50px;padding-bottom:10px">{{Auth::user()->name}}</td>
							</tr>
										
						</table>
					</div>
				</div>
			</div>
	<!-- /user details -->
		</div>
	</div>
<!-- /User -->
@endsection     


       


