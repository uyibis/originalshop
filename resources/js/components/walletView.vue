<template>
    <div class="container-fluid">
        <div class="wallet">
            <aside  class="left-wallet">
                <div class="wallet-head">
                    <h3 style="display: inline" class=""> My Wallets </h3>
                    <div @click="openModal" style="display: inline"  class="modal-open float-end display-6 text-primary"
                    title="add wallet">+
                    </div>
                </div>
                <hr>
                <div class="cc-select" style="padding-top: 10px">
                    <template  v-for="(item,index) in wallets" >
                            <option class="card text-center"  style="cursor: pointer; margin-bottom: 5px; padding: 5px;" :value="index"  v-if="item.currency==1" @click="subWallet">₦ wallet</option>
                            <option class="card text-center"  style="cursor: pointer; margin-bottom: 5px; padding: 5px;" :value="index" v-else  @click="subWallet">$ Wallet</option>
                    </template>
                </div>
            </aside>

            <div style="width: 100%" class="right-trans">
                <wallet-sub-view  :subview="subview" :wallet-item="walletItem"/>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLongTitle" >Wallet</h5> <span @click="closeModal" class="text-primary closemodal" aria-hidden="true">&times;</span>

                </div>
                <div class="modal-body">
                    <h3>Create new wallet</h3>
                    <h5>you can only have one wallet per currency</h5>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Currency</label>
                            <select  v-model="selectedCurrency" class="form-control form-control">
                                <option disabled selected value="0">Please select currency</option>
                                <template v-for="item in currency">
                                    <option  :value="item.id">{{item.name}}</option>
                                </template>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Balance</label>
                            <input type="email" disabled v-model="balance" class="form-control" id="exampleInputEmail1">

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button @click="add" style="display: flex; justify-content: center" class="modal-add-cc"><bt-process :loader="loader" :show-content="showContent" text="Add"/> </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import WalletSubView from "./walletSubView.vue";
import BtProcess from "./btProcess.vue";
export default {
    name: "walletView",
    components: {BtProcess, WalletSubView},
    data(){
        return {
            balance:0,
            currency:[],
            selectedCurrency:0,
            loader:false,
            showContent:true,
            subview:1,
            wallets:[],
            walletItem:0
        }
    },
    methods:{
        openModal(){
            $('#exampleModalCenter').modal('show');
        },
        closeModal(){
            $('#exampleModalCenter').modal('hide');
        }
        ,
        check(user_id){
            alert(user_id);
        }
        ,
       async loadCurrency(){
           this.currency=(await   axios.get('/currency')).data.data;
           console.log(JSON.stringify( this.currency));
       }
       ,
        async loadWallet(){
            this.wallets=(await   axios.get('/wallet')).data.data;
            console.log(JSON.stringify( this.wallets));
        },
        loaderOn(){
            this.loader=true;
            this.showContent=false;
        },
        loaderOf(){
            this.loader=false;
            this.showContent=true;
        }
        ,
        async add() {
            let data = {user_id: this.user, currency_id: this.selectedCurrency};
            if(data.currency_id==0)
            {
                Toast("you have not select wallet currency");
                return;
            }
            this.loaderOn();
           let resp= await axios.post('/wallet', data);
           this.loaderOf();
          // console.log(resp);
           if(resp.data.status){
               Toast('Wallet created');
               this.closeModal();
           }
        },
        subWallet($event){
          //  console.log($event.target);
          this.subview=  $event.target.value;
          this.walletItem=this.wallets[this.subview];
         console.log(this.walletItem);
        }
    },
    props:['user'],
    mounted() {
        //this.check(this.user);
        this.loadCurrency();
        this.loadWallet();
    }

}
</script>

<style scoped>
.wallet {
    margin: 0 auto;
    border-radius: 5px;
    background-color: #fff;
    /*box-shadow: 0px 8px 20px 6px rgb(255, 178, 22);
    -webkit-box-shadow: 0px 8px 20px 6px rgb(255, 178, 22);
    -moz-box-shadow: 0px 8px 20px 6px rgb(255, 178, 22);*/
    min-height: 100px; /*  height: 680px;*/
    width: 100%;
    /*max-width: 900px;*/
  /*  min-width: 800px;*/
    display: flex;
}

.left-wallet {
    background-color: #f2f2f2;
    width: 30%;
    height: initial;
    padding: 40px;
    border-radius: 5px;
}
.modal-open{
    margin-top: -5px;
    cursor: pointer;
}
.closemodal{
    cursor: pointer;

}
.modal {
    text-align: center;
    /*display: none;*/
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    /* background-color: rgba(0, 0, 0, 0.6);
    z-index: 1;*/
}
</style>
