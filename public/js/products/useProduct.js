function useProduct() {


const baseUrl = "http://127.0.0.1:8000"

    return {
        state: {
            products: [],
            categories: [],
            isLoading : false
        },
        getters : {
            getProductData(){
                return this.state.products;
            }
        },
        actions: {
            async fetchProduct() {
                try {

                    this.state.isLoading = true;

                    const response = await axios.get(
                        baseUrl + '/product/data'
                    );


                    this.state.isLoading = false;
                    this.state.products = response.data.products;
                    this.state.categories = response.data.categories;

                    console.log(this.state.products)

                    console.log(response.data);
                } catch (error) {
                    console.log(error);
                }
            },
        },
        async filterDataProduct (name) {

            try {


                this.state.isLoading = true;
                const response = await axios.get(baseUrl + `/product/filter/${name}`);

                this.state.isLoading = false;
                this.state.products = response.data.products

            } catch (error) {
                console.log(error);
            }

        }
    };
}
