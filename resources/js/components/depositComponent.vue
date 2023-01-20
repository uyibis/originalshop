<template>
    <div  class="cardbody flex justify-center items-center min-h-screen bg-blue-300">
        <div class="h-auto w-80 bg-white p-3 rounded-lg">
            <p class="text-xl font-semibold">Payment Details</p>
            <div class="input_text mt-6 relative"> <input v-model="cardName" type="text" id="name" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="John Row" /> <span class="absolute left-0 text-sm -top-4">Cardholder Name</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-user"></i> </div>
            <div class="input_text mt-8 relative"> <input @input="formatterCard" v-model="carNumber" type="text" id="cardnumber" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="0000 0000 0000 0000" data-slots="0" data-accept="\d" size="19" /> <span class="absolute left-0 text-sm -top-4">Card Number</span> <i class="absolute left-2 top-[14px] text-gray-400 text-sm fa fa-credit-card"></i> </div>
            <div class="mt-8 flex gap-5 ">
                <div  id="expirationdate" class="input_text relative w-full"> <input v-model="cardDate" @input="formatterDate" type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="mm/yyyy" data-slots="my" /> <span class="absolute left-0 text-sm -top-4">Expiry</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-calendar-o"></i> </div>
                <div id="securitycode"  class="input_text relative w-full"> <input v-model="cvv" type="text" class="h-12 pl-7 outline-none px-2 focus:border-blue-900 transition-all w-full border-b " placeholder="000" data-slots="0" data-accept="\d" size="3" /> <span class="absolute left-0 text-sm -top-4">CVV</span> <i class="absolute left-2 top-4 text-gray-400 fa fa-lock"></i> </div>
            </div>
            <p id="output" class="text-lg text-xs-center mt-4 text-gray-600 font-semibold">Payment amount:{{amount}}</p>
<!--            <div class="flex justify-center mt-4"> <button class="outline-none pay h-12 bg-orange-600 text-white mb-3 hover:bg-orange-700 rounded-lg w-1/2 cursor-pointer transition-all">Pay</button> </div>
  -->
        </div>
    </div>
</template>

<script>
export default {
    name: "depositComponent",
    data(){
        return{
            carNumber:'',
            cardDate:'',
            cvv:'',
            cardName:'',
            loader:false,
            showContent:true
        }
    },
emits:['loaderTrigger']
,
    props:['amount','payment']
    ,
    watch:{
       payment:async function (prev,next){
           this.$emit('loaderTrigger',0);
           //alert('helll ');
           let para={cardNumber:this.carNumber,cardName:this.cardName,cvv:this.cvv,cardDate:this.cardDate}
           let data=await   axios.post('/payment',para);

           //console.log(`${{prev}} ${{next}}`)
           this.$emit('loaderTrigger',1);
       }
    }
,
    methods:{
        loaderOn(){
            this.loader=true;
            this.showContent=false;
        },
        loaderOf(){
            this.loader=false;
            this.showContent=true;
        },
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
                    alert(message);
                }
            });

            handler.openIframe();
        },
        formatterCard(){
          this.carNumber=   this.cc_format(this.carNumber)
        },
        formatterDate(){
            //alert('hello')
            this.cardDate=this.cc_expires_format(this.cardDate)
        }
        ,
        cc_format(value) {
    let v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
    let matches = v.match(/\d{4,16}/g);
    let match = matches && matches[0] || '';
    let parts = [];

    for (let i=0, len=match.length; i<len; i+=4) {
        parts.push(match.substring(i, i+4))
    }

    if (parts.length) {
        return parts.join(' ')
    } else {
        return value
    }
},
        cc_expires_format(string) {
    return string.replace(
        /[^0-9]/g, '' // To allow only numbers
    ).replace(
        /^([2-9])$/g, '0$1' // To handle 3 > 03
    ).replace(
        /^(1{1})([3-9]{1})$/g, '0$1/$2' // 13 > 01/3
    ).replace(
        /^0{1,}/g, '0' // To handle 00 > 0
    ).replace(
        /^([0-1]{1}[0-9]{1})([0-9]{1,2}).*/g, '$1/$2' // To handle 113 > 11/3
    );
},


    }
    ,

    mounted() {
//this.formatter();
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


.cardbody{
    background: linear-gradient(to right, rgba(235,224,232,1) 52%,rgba(254,191,1,1) 53%,rgba(254,191,1,1) 100%);
    font-family: 'Roboto', sans-serif;
}

.card{
    border: none;
    max-width: 450px;
    border-radius: 15px;
    margin: 150px 0 150px;
    padding: 35px;
    padding-bottom: 20px!important;
}
.heading{
    color: #C1C1C1;
    font-size: 14px;
    font-weight: 500;
}
img{
    transform: translate(160px,-10px);
}
img:hover{
    cursor: pointer;
}
.text-warning{
    font-size: 12px;
    font-weight: 500;
    color: #edb537!important;
}
#cno{
    transform: translateY(-10px);
}
input{
    border-bottom: 1.5px solid #E8E5D2!important;
    font-weight: bold;
    border-radius: 0;
    border: 0;

}
.form-group input:focus{
    border: 0;
    outline: 0;
}
.col-sm-5{
    padding-left: 90px;
}
.btn{
    background: #F3A002!important;
    border: none;
    border-radius: 30px;
}
.btn:focus{
    box-shadow: none;
}
</style>
