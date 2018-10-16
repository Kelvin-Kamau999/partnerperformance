@extends('layouts.master')

@section('content')

<style type="text/css">
	.display_date {
		width: 130px;
		display: inline;
	}
	.display_date {
		width: 130px;
		display: inline;
	}
</style>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
		    <div class="panel-heading">
			    {{ $partner->name ?? '' }} 
          <br />
          Download PNS Excel
		    </div>
			<div class="panel-body" id="user_guide">
				<form action="{{ url('pns/download') }}" method="post" class="form-horizontal"> 
					@csrf

          <div class="form-group">
              <label class="col-sm-3 control-label">Financial Year</label>
              <select class="col-sm-7 select_tag" name="financial_year">
                <option value="2018" selected>2018</option>
                <option value="2019">2019</option>
              </select>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label">Months (You can select multiple months)</label>
              <select class="col-sm-7 select_tag" required multiple="multiple" name="months[]">
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">Mar</option>
                <option value="4">Apr</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">Jul</option>
                <option value="8">Aug</option>
                <option value="9">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
              </select>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label">Data Items (You can select multiple data items)</label>
              <select class="col-sm-7 select_tag" required multiple="multiple" name="items[]">
                <option value="screened">Index Clients Screened</option>
                <option value="contacts_identified">Contacts Identified</option>
                <option value="pos_contacts">Known HIV Positive Contacts</option>
                <option value="eligible_contacts">Eligible Contacts</option>
                <option value="contacts_tested">Contacts Tested</option>
                <option value="new_pos">Newly Identified Positives</option>
                <option value="linked_haart">Linked To HAART</option>
              </select>
          </div>

          <div class="col-sm-6 col-sm-offset-6">
              <button class="btn btn-success" type="submit" >Submit</button>
          </div>
        </form>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')

<script src="{{ secure_asset('js/validate/jquery.validate.min.js') }}"></script>
<script type="text/javascript">

    function reload_page(){}

    $(document).ready(function(){
        $(".form-control").attr('autocomplete', 'off');

        $(".select_tag").select2();

        $(".form-horizontal select").select2();

        $(".form-horizontal").validate({
            errorPlacement: function (error, element)
            {
            element.before(error);
            }
            {{ $val_rules ?? '' }}
        });
    });

</script>

@endsection


