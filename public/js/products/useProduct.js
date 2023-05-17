function useProduct() {

    return {
        state: {
            products: [],
            categories: []
        },
        getters: {
            getData(state, id) {

            }
        },
        actions: {
            async fetchProduct() {
                try {
                    const response = await axios.get('http://127.0.0.1:8000/product/data');

                    this.state.products = response.data.products
                    this.state.categories = response.data.categories

                    console.log(response.data);
                } catch (error) {
                    console.log(error)
                }
            }
        }
    }

}
