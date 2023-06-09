<x-panel>
    <div class="w-full p-4">
        <section class="text-gray-600 body-font">
            <div class="container py-10 mx-auto">
                <div class="flex flex-wrap -m-4 text-center">
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class='bx bx-user-pin text-sbgreen text-5xl'></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">2.7K</h2>
                            <p class="leading-relaxed">Registered Customers</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class='bx bx-notepad text-sbgreen text-5xl'></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">1.3K</h2>
                            <p class="leading-relaxed">Inventory Item</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class='bx bx-cart-alt text-sbgreen text-5xl'></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">74</h2>
                            <p class="leading-relaxed">Online Orders</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <i class='bx bx-store text-sbgreen text-5xl'></i>
                            <h2 class="title-font font-medium text-3xl text-gray-900">46</h2>
                            <p class="leading-relaxed">Walk-in Orders</p>
                        </div>
                    </div>
                </div>
            </div>
          </section>


        <div class="flex gap-2 space-x-4 grow">
                <div class="w-2/3 bg-white rounded-lg  h-96 p-6">
                    <div id="bar">

                    </div>
                </div>

                

                <div class="w-1/3 flex flex-col ">
                    <div class="w-full flex flex flex-col flex-wrap -m-4">
                        <div class="p-4 w-full">
                            <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                                <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                                    <i class='bx bx-line-chart text-blue-500 text-3xl'></i>
                                </div>
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Total Sales</h2>
                                    <p class="leading-relaxed text-xl font-semibold">500,000</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 w-full">
                            <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
                                <div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                                    <i class='bx bx-receipt text-blue-500 text-3xl'></i>
                                </div>
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Transactions</h2>
                                    <p class="leading-relaxed text-xl font-semibold">400</p>
                                </div>
                            </div>
                        </div>
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

</x-panel>
