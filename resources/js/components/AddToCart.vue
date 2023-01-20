<template>
    <hr>
    <button class="btn btn-warning text-center"
    @click.prevent="addProdcutToCart()">
        Add To Cart
    </button>
</template>

<script>
export default {
    data(){
        return {}
    },
    emits:['changeCart'],
    props:['productId','userId'],
    methods:{
        async addProdcutToCart() {
            //alert(this.productId);
            //alert(this.userId);
            //checking for user
            if (this.userId == 0) {
                // this.$toasted.e('you need to login to add this product to cart')
                Toastify({
                    text: "This is a toast",
                    duration: 3000,
                    destination: "https://github.com/apvarun/toastify-js",
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "left", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    onClick: function () {
                    } // Callback after click
                }).showToast();
                this.$emit('changeCart',2);
            }else {
                let response = await axios.post('/cart', {
                    'product_id': this.productId
                });
                console.log(response.data);
                this.$emit('changeCart',response.data.itemCount);
            }
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
