@extends('admin.admin_master')
@section('title', 'Change Password')
@section('content')
<section class="content">
<div class="row">

<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Change Password </h4>
			
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form method="post" action="{{route('update.admin.password')}}" >
	@csrf
<div class="row">
<div class="col-12">

	<div class="row">  
		<div class="col-md-6">
<div class="form-group">
<h5>Current password <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="current_password" type="password"  name="oldpassword"  class="form-control" required="" > 
	
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>New password <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="password" type="password" name="password" value="" class="form-control" required="" > 
	
</div>
</div>
<!-- ====================== -->
<div class="form-group">
<h5>Confirm password <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="password_confirmation" type="password" name="password_confirmation" value="" class="form-control" required="" > 
	
</div>
</div>

		</div> <!-- col md 6 end  -->

</div>	<!-- row end  -->		
</div>
  </div>
	<div class="text-xs-right">
<input type="submit" name="submit" class="btn btn-rounded btn-info">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
</div>
</section>
@endsection