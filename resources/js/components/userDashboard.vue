<template>
    <div class="axil-dashboard-overview">
        <div class="welcome-text">uyi saying Hello Annie (not <span>Annie?</span> <a href="sign-in.html">Log Out</a>)</div>
        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
    </div>
     <hr/>
<wallet-view :user="user" />
</template>

<script>

import WalletView from "./walletView.vue";
export default {
    name: "userDashboard",
    components: {WalletView},
    props:['user']
}
</script>

<style scoped>

</style>
