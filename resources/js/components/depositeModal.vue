<template>
    <!-- Button trigger modal -->
    <button @click="openDeposit" type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#depositModal">Deposit ₦</button>

    <!-- Modal -->
    <div class="modal fade" id="depositModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img width="100" src="assets/images/mastercard-and-visa-logos-visa.png" alt="accepted card"/>
                </div>
                <div class="modal-body">
                    <deposit-component amount="120" :payment="process" @loader-trigger="postSunmit"/>
                </div>
                <div class="modal-footer">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button>
                        </div>
                        <div class="col-md-6">
                            <button @click.prevent="sunmit" type="submit" class="btn btn-success btn-lg btn-block"><bt-process :loader="loader" :show-content="showContent" text="Submit"/></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DepositComponent from "./depositComponent.vue";
import BtProcess from "./btProcess.vue";
export default {
    name: "depositeModal",
    components: {BtProcess, DepositComponent},
    data(){
        return{
            loader:false,
            showContent:true,
            process:1
        }
    }
,
    methods:{
        processPayment(data){
            let handler = PaystackPop.setup({
                key: 'pk_test_4a3795c4b29d689ddba4fbdd8563645e884349a3', // Replace with your public key
                email: data.email,
                amount: 120* 100,
                // label: "Optional string that replaces customer email"
                onClose: function(){
                    alert('Window closed.');
                },
                callback: function(response){
                    let message = 'Payment complete! Reference: ' + response.reference;
                    console.log(response);
                    console.log(data)
                    alert(message);
                }
            });
            handler.openIframe();
        },
        openDeposit(){
            //$('#depositModal').modal('show')
            this.processPayment({email:'uyibis@gmail.com'});
        }
        ,
        loaderOn(){
            this.loader=true;
            this.showContent=false;
        },
        loaderOf(){
            this.loader=false;
            this.showContent=true;
        },
        sunmit(){
            this.process++;
        },
        postSunmit(val){
           if(val==0)
               this.loaderOn();
           else this.loaderOf();
        }
    }
}
</script>

<style scoped>

</style>
