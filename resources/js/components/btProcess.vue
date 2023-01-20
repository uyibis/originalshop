<template>
    <span s v-if="loader" class="loader"></span> <span v-if="showContent">{{text}}</span>
</template>

<script>
export default {
    name: "btProcess"
    ,
    props:['loader','showContent','text']
}
</script>

<style scoped>

</style>
