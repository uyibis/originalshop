<template>
    <div class="no-selection" v-if="walletItem==0">
        No wallet selected
    </div>
    <div v-else style="background: #6a1a21" class="no-selection">
        <div>
            <div class="amount-box text-center">
                <img src="https://lh3.googleusercontent.com/ohLHGNvMvQjOcmRpL4rjS3YQlcpO0D_80jJpJ-QA7-fQln9p3n7BAnqu3mxQ6kI4Sw" alt="wallet">
                <p>Total Balance</p>
                <p v-if="walletItem.currency==1" class="amount">₦ {{walletItem.balance}}</p>
                <p v-else-if="walletItem.currency==8" class="amount">$ {{walletItem.balance}}</p>
            </div>

            <div style="display: flex; justify-content: center" v-if="walletItem.currency==1" class="btn-group text-center">

                <deposite-modal/>
<!--                <button type="button" class="btn btn-outline-light">Deposit ₦</button>-->
                <button type="button" class="btn btn-outline-light">Widthdraw</button>
            </div>
            <div style="display: flex; justify-content: center"  v-if="walletItem.currency==8" class="btn-group text-center">
                <button type="button" class="btn btn-outline-light">Request $</button>
                <button type="button" class="btn btn-outline-light">Request ₦</button>
            </div>

            <div class="txn-history">
                <p><b>History</b></p>
                <p class="txn-list">Payment to xyz shop<span class="debit-amount">-$100</span></p>

                <p class="txn-list">Payment to abc shop<span class="debit-amount">-$150</span></p>

                <p class="txn-list">Credit From abc ltd<span class="credit-amount">+$300</span></p>

                <p class="txn-list">Transfer From John Doe<span class="credit-amount">+$100</span></p>
            </div>
        </div>
    </div>
</template>

<script>
import DepositeModal from "./depositeModal.vue";
export default {
    name: "walletSubView",
    components: {DepositeModal},
    props:['subview','walletItem'],
    mounted() {
        console.log(this.subview)
    }
}
</script>

<style scoped>
.wallet-container {
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjOvSperRYjHH9-EHlKZJBfwvXy4rJpyerzHQsnp8DuuycYU5_);
    width: 320px;
    color: #fff;
    font-size: 15px;
    padding: 20px 20px 0;
    top: 55%;
    left: 50%;
    transform: translate(-50%,-50%);
    position: absolute;
}

.page-title {
    text-align: left;
}

.fa-user {
    float: right;
}

.fa-align-left {
    margin-right: 15px;
}

.amount-box img {
    width: 50px;
}

.amount {
    font-size: 35px;
}

.amount-box p {
    margin-top: 10px;
    margin-bottom: -10px;
}

.btn-group {
    margin: 20px 0;
}

.btn-group .btn {
    margin: 8px;
    border-radius: 20px !important;
    font-size: 12px;
}

.txn-history {
    text-align: left;
}

.txn-list {
    background-color: #fff;
    padding: 12px 10px;
    color: #777;
    font-size: 14px;
    margin: 7px 0;
}

.debit-amount {
    color: red;
    float: right;
}

.credit-amount {
    color: green;
    float: right;

}

.footer-menu {
    margin: 20px -20px 0;
    bottom: 0;
    border-top: 1px solid #ccc;
    padding: 10px 10px 0;
}

.footer-menu p {
    font-size: 12px;
}

@media screen and (max-width: 800px){
    .wallet-container {
        height: 115%;
        bottom: 20px;
        margin-top: 100px;
    }

}
.no-selection{
    display: flex;
    justify-content: center;
    background: #0b5ed7;
    height: 100%;
    width: 100%;
}
</style>
