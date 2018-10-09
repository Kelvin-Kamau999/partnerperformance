<table id="{{ $div }}"  cellspacing="1" cellpadding="3" class="tablehead table table-striped table-bordered">
	<thead>
		<tr class="colhead">
			<th>No</th>
			@component('partials.columns')@endcomponent
			<th>Men Clinic Facilities</th>
			<th>Men Clinic Beneficiaries</th>
			<th>Current TX Men {{ $current_range }}</th>
			<th>Men Clinic Coverage</th>					
		</tr>
	</thead>
	<tbody>
		@foreach($rows as $key => $row)
			<?php
				$tx = $get_val($groupby, $row, $art, 'males');
			?>
			<tr>
				<td> {{ $key+1 }} </td>
				@component('partials.rows', ['row' => $row])@endcomponent
				<td> {{ number_format($row->facilities) }} </td>
				<td> {{ number_format($row->men_clinic_beneficiaries) }} </td>
				<td> {{ number_format($tx) }} </td>
				<td> {{ $calc_percentage($row->men_clinic_beneficiaries, $tx) }} </td>
			</tr>
		@endforeach
	</tbody>	
</table>

@component('partials.table_footer', ['div' => $div])@endcomponent
