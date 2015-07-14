@extends('/layouts/layout')
@extends('/partials/header')
@extends('/partials/navbar')
@extends('/partials/footer')

@section('body')
	<div class="main_page container">
		@include('partials/flash_messages')
		{{ Form::open(['url'=>l('parse'), 'method'=>'POST', 'class'=>'parse_form']) }}
			{{ Form::submit('Parse prices', ['class'=>'form-control']) }}
		{{ Form::close() }}

		<table class="quotations table table-striped">
			<thead>
				<tr>
					<td>#quotation_id</td>
					<td>price</td>
					<td>petrol</td>
					<td>region</td>
					<td>added_on</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				@foreach ($quotations as $quotation)
					<tr>
						<td>{{ $quotation->quotation_id }}</td>
						<td>{{ sprintf("%.2f", $quotation->price) }}</td>
						<td>{{ $quotation->petrol_title }}</td>
						<td>{{ $quotation->region_title }}</td>
						<td>{{ Carbon::parse($quotation->added_on)->format('Y-m-d') }}</td>
						<td>
							{{ Form::open(['url'=>'/remove_quotation/$quotation->quotation_id', 'method'=>'POST', 'class'=>'add_quotation']) }}
								<i aria-hidden="true" class="fa fa-times form_submit delete_quotation"></i>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop