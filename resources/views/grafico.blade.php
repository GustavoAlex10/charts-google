<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Google Charts ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    <!-- Inicio do Grafico -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            var population = <?php echo $population; ?>;
        console.log(population);
        google.charts.load('current', { 
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(lineChart);

        function lineChart() {
            var data = google.visualization.arrayToDataTable(population);
            var options = {
                title: 'Meu Grafico',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }        
    </script>

    <!-- Fim -->
<!-- Chama o Grafico -->

        <div id="linechart" style="width: 1000px; height: 500px"></div>    

        </div>
        </div>
    </div>
</x-app-layout>
