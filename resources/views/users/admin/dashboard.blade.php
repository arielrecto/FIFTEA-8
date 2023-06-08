<x-app-layout>

    <div class="w-full pt-20 min-h-screen">

        <div class="flex gap-2">
            <x-admin-sidebar>
            </x-admin-sidebar>
            <div class="grow">
                <div class="w-1/2 bg-white rounded-lg h-96">
                    <div id="bar">

                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('js')
        <script>
            var options = {
                series: [{
                    name: "Desktops",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Product Trends by Month',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                }
            };
            var chart = new ApexCharts(document.querySelector("#bar"), options);
            chart.render();
        </script>
    @endpush

</x-app-layout>
