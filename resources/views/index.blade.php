@extends('/layouts/layout')
@extends('/partials/header')
@extends('/partials/navbar')
@extends('/partials/footer')

@section('body')
	<div class="main_page container">
		<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
			<input class='btn_fixed datepicker form-control btn btn-warning' value="{{ Carbon::today()->format('d/m/Y') }}" readonly="readonly">
		</div>

		@include('partials/flash_messages')
		<div class="col-lg-8 col-md-6 col-sm-6 col-xs-4"></div>
		<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
			{{ Form::open(['url'=>l('parse'), 'method'=>'POST', 'class'=>'parse_form']) }}
				{{ Form::submit('UPDATE PRICES', ['class'=>'btn_fixed form-control btn btn-info btn-md']) }}
			{{ Form::close() }}
		</div>

		<table class="quotations table table-striped table-hover table-bordered table-condensed table-responsive">
			<thead>
				<tr class='grey_tr'>
					<th>Region</th>
					<th class='text-center'>A76/80</th>
					<th class='text-center'>A92</th>
					<th class='text-center'>A95</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($quotations as $quotation)
					<tr>
						<td>{{ $quotation->region_title }}</td>
						<td class='text-center'>{{ sprintf("%.2f", $quotation->A76_80) }}</td>
						<td class='text-center'>{{ sprintf("%.2f", $quotation->A92) }}</td>
						<td class='text-center'>{{ sprintf("%.2f", $quotation->A95) }}</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr class='grey_tr'>
					<th>Region</th>
					<th class='text-center'>A76/80</th>
					<th class='text-center'>A92</th>
					<th class='text-center'>A95</th>
				</tr>
			</tfoot>
		</table>
	</div>
@stop