@extends('admin.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">

                    <div id="columnchart_values" style="width: 100%; height: 100%;"></div>

                </div>{{-- End of Card Body  --}}
            </div>{{-- End of Card  --}}
        </div>{{-- End of Col-md-12  --}}
    </div>{{-- End of Row  --}}

@endsection

@section('js-code')

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", { role: "style" } ],
            ["Products", {{$count_products}}, "yellow"],
            ["Categories", {{$count_categories}}, "orange"],
            ["Orders", {{$count_orders}}, "green"],
            ["Registered Users", {{$count_users}}, "blue"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation" },
                        2]);

        var options = {
            title: "",
            width: 1500,
            height: 700,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
    </script>
    
@endsection