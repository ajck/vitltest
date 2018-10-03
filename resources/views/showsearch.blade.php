@extends('layout')

@section('content')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form id="namesearchform" class="contact form-horizontal">
					{!! csrf_field() !!}
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Enter name to search for" id="terms">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" id="searchbtn"><i class="fa fa-lg fa-search"></i></button>
						</span>
							<label class="control-label leftmargin"><input type="checkbox" id="avoiddupes"> Avoid dupes?</label>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				<table class="table table-responsive topmargin">
					<tbody id="results">
						<!-- Results injected in here by JS -->
					</tbody>
				</table>			
			</div>
		</div>
@endsection