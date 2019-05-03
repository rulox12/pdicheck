@extends('admin.layout')

@section('content')
	
	<h1>Bienvenidos</h1>
	<div class="row">
		<div class="col-md-6">
		<!-- LINE CHART -->
			<div class="box box-info">
				<div class="box-header with-border">
				<h3 class="box-title">Line Chart</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
				</div>
				<div class="box-body chart-responsive">
					<canvas id="myChart" width="400" height="100"></canvas>
				</div>
				<!-- /.box-body -->
			</div>
		<!-- /.box -->

		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	
<script>
	var ctx = document.getElementById('myChart');
	var stackedLine = new Chart(ctx, {
		type: 'line',
		data: [{
			x: 10,
			y: 20
		}, {
			x: 15,
			y: 10
		}],
		options: {
			scales: {
				yAxes: [{
					stacked: true
				}]
			}
		}
	});
</script>
@stop