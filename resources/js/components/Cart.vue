<template>
    <li class="shopping-cart">
    <a href="/home" class="cart-dropdown-btn">
        <span  class="cart-count">{{counts}}</span>
        <i class="flaticon-shopping-cart"></i>
    </a>
    </li>
</template>

<script>
export default {
    name: "Cart.vue",
    data(){
        return {
            itemCount:'1'
        }
    },
    props:['counts'],
    methods:{
        updateCart(val){
            this.itemCount =val;
        }
    },
    mounted(){
        // this.$root.$on('changeInCart',(item)=>{
        //     this.itemCount =item;
        // })
    }
}

</script>

<style scoped>

</style>
