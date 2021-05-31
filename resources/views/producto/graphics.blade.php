@extends('producto.layout')

@section('content')
<div class="container">

<div class="row">

    <div class="col-md-10 offset-md-1">

        <div class="panel panel-default">

            <div class="panel-heading">Ventas</div>

            <div class="panel-body">

                <canvas id="canvas" height="280" width="600"></canvas>

            </div>

        </div>

    </div>

</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>

var x = <?php echo json_encode((array_values($x))); ?>;

var y = <?php echo json_encode((array_values($y))); ?>;

var barChartData = {

    labels: x,

    datasets: [{

        label: 'Cantidades',

        backgroundColor: "pink",

        data: y

    }]

};


window.onload = function() {

    var ctx = document.getElementById("canvas").getContext("2d");

    window.myBar = new Chart(ctx, {

        type: 'bar',

        data: barChartData,

        options: {

            elements: {

                rectangle: {

                    borderWidth: 2,

                    borderColor: '#c1c1c1',

                    borderSkipped: 'bottom'

                }

            },
            scales: {
                    yAxes: [{
                        ticks: {
                            min: 50
                        }
                    }]
                },

            responsive: true,

            title: {

                display: true,

                text: 'Ventas por No. semana'

            }

        }

    });

};

</script>

</div>
@endsection