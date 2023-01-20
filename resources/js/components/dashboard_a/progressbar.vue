<template >
    <div style="display: flex">
  <img :src="image" style="height: 4em; width: 4em">  <div id="myProgress" v-if="display">
        <div class="" id="myBar">
    </div>
    </div><span v-if="display" class="flex-center">{{i}}%</span>
    </div>
</template>

<script>
export default {
    name: "progressbar",
    props:['i','display','image'],
    data(){
        return{

        }
    },
    watch:{
        i:function (prev,next) {
            var elem = document.getElementById("myBar");
            elem.style.width = this.i + "%";
            //this.progress();
        }
    }
,
    methods:{
        progress(){
            if (this.i == 0) {
                this.i = 1;
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);
                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                        this.i = 0;
                    } else {
                        width++;

                    }
                }
            }
        }
    }
}
</script>

<style scoped>
#myProgress {
    width: 80%;
    background-color: grey;
    height: 30px;
}

#myBar {
    width: 1%;
    height: 30px;
    background-color: green;
}
</style>
