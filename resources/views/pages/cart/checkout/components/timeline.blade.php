<div class="row no-gutters mb-5">
	<div class="col-4 position-relative bg-secondary-lightest" style="height: 6px">
		<div class="absolute-center bg-secondary-lightest rounded-circle d-flex flex-center font-weight-bold" style="height: 24px; width: 24px; font-size: 80%">
			1
		</div>
	</div>
	<div class="col-4 position-relative {{in_array($stage, [2, 3]) ? 'bg-secondary-lightest' : 'bg-light'}}" style="height: 6px">
		<div class="absolute-center {{in_array($stage, [2, 3]) ? 'bg-secondary-lightest' : 'bg-light text-muted'}} rounded-circle d-flex flex-center font-weight-bold" style="height: 24px; width: 24px; font-size: 80%">
			2
		</div>
	</div>
	<div class="col-4 position-relative {{in_array($stage, [3]) ? 'bg-secondary-lightest' : 'bg-light'}}" style="height: 6px">
		<div class="absolute-center {{in_array($stage, [3]) ? 'bg-secondary-lightest' : 'bg-light text-muted'}} rounded-circle d-flex flex-center font-weight-bold" style="height: 24px; width: 24px; font-size: 80%">
			3
		</div>
	</div>
</div>