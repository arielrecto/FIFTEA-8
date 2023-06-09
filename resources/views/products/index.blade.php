<x-app-layout>
    <section class="pt-20 ">
        <div class="container mx-auto flex px-5 md:px-22 lg:px-28">

            {{-- x-init="actions.fetchProduct" --}}
            <div class="flex w-full flex-col space-y-2" x-data="sample" x-init="fetchProduct">



                <div class="w-full flex border-b border-gray-200">


                        <button @click="getFilterProducts('all')" class="nav py-1 px-4 rounded hover:bg-gray-200">
                            <p>All</p>
                        </button>

                        <template x-for="category in categories" :key="category.id">
                            <button @click="getFilterProducts(category.name)"
                                class="nav py-1 px-4 rounded hover:bg-gray-200">
                                <p x-text="category.name"></p>
                            </button>
                        </template>
                </div>

                <section id="products-container" class="flex w-full flex-wrap">
                    <template x-for="product in productsFilter" :key="product.id">

                        <div class="p-4 lg:w-1/4 transition duration-500 ease-in-out" x-show="!isLoading">
                            <div
                                class="h-fit border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden  hover:shadow-lg bg-white">
                                <img class="lg:h-80 md:h-60 w-full object-cover object-center" :src="product.image.url"
                                    alt="blog">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        CATEGORY : <span x-text="product.categories[0].name"></span> </span></h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3" x-text="product.name">
                                    </h1>
                                    <div class="flex items-center justify-between flex-wrap ">

                                        <p class="font-sans text-sbblack" x-text="product.price"></p>

                                        <label for="my-modal"
                                            class="text-sm text-white bg-sbgreen rounded py-1 px-4">ORDER</label>

                                        <input type="checkbox" id="my-modal" class="modal-toggle" />
                                        <div class="modal">
                                            <div class="modal-box">

                                                <div>
                                                    dito yung mg add ons
                                                </div>

                                                <div class="modal-action">
                                                    <label for="my-modal"
                                                        class="py-2 px-4 bg-sbgreen text-white rounded">
                                                        Add to Cart
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </section>
            </div>
        </div>
    </section>

    <script>
        function sample() {

            const baseUrl = "http://localhost:8000";
            return {

                products: [],
                categories: [],
                isLoading: false,
                productsFilter: [],
                getFilterProducts(data) {
                    if (data === 'all') {
                       return this.productsFilter = this.products;
                    }



                    this.productsFilter = this.productsFilter.filter((item)=>{
                        if(item.categories.length !== 0){
                           return item.categories[0].name === data
                        }
                    });


                },

                async fetchProduct() {
                    try {

                        this.isLoading = true;

                        const response = await axios.get(
                            baseUrl + '/product/data'
                        );


                        this.isLoading = false;
                        this.products = response.data.products;
                        this.categories = response.data.categories;
                        this.productsFilter = response.data.products;

                        console.log(this.products)

                        console.log(response.data);
                    } catch (error) {
                        console.log(error);
                    }
                },
                // async filterDataProduct(name) {

                //     try {
                //         console.log(name)

                //         this.isLoading = true;

                //         const response = await axios.get(baseUrl + `/product/filter/${name}`);

                //         this.isLoading = false;


                //         this.products = response.data.products.map(item => {
                //             return {...item, categories : [{
                //                 name : response.data.name
                //             }]}
                //         })

                //         console.log(response.data)

                //     } catch (error) {
                //         console.log(error);
                //     }

                // }
            }
        }
    </script>



</x-app-layout>
