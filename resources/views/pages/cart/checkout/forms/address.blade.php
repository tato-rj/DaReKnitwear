<div class="form-row">
	<div class="form-group col-md-6">
		<input type="text" class="form-control" name="first_name" placeholder="First name">
	</div>
	<div class="form-group col-md-6">
		<input type="text" class="form-control" name="last_name" placeholder="Last name">
	</div>
</div>
<div class="form-group">
	<input type="text" class="form-control" name="address" placeholder="Address">
</div>
<div class="form-group">
	<input type="text" class="form-control" name="complement" placeholder="Apartment, studio, or floor">
</div>
<div class="form-row">
	<div class="form-group col-md-6">
		<input type="text" class="form-control" name="city" placeholder="City">
	</div>
	<div class="form-group col-md-6">
		<input type="text" class="form-control" name="zip" placeholder="ZIP code">
	</div>
</div>
<div class="form-row">
	<div class="form-group col-6">
		<div class="label-inside">
			<label class="">Country</label>
			<select class="form-control" name="country">
				<option selected>United States</option>
				<option>Canada</option>
				<option>France</option>
				<option>Italy</option>
				<option>Switzerland</option>
			</select>
		</div>
	</div>
	<div class="form-group col-6">
		<div class="label-inside">
			<label class="">State</label>
			<select class="form-control" name="state">
				@foreach(states('us') as $abbr => $name)
				<option value="{{$abbr}}" {{$name == 'Connecticut' ? 'selected' : null}}>{{$name}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>