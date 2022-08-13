<template>
    <div class="admin-data-content layout-top-spacing bg-white mx-3 rounded">
        <div class="mt-5 mb-5 pl-4">
            <h4>NGL Token Referrals</h4>
        </div>
        <div class="faq row px-3">
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="infobox-2" style="width: 100%;">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    </div>
                    <h5 class="info-heading">Amazing Referals</h5>
                    <p class="info-text">Get 10% BNB when a person you refer buy's our token, and 10% NGL of everything they buy</p>
                    <a class="info-link" href="">Discover <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="infobox-2" style="width: 100%;">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    </div>
                    <h5 class="info-heading">NGL Token</h5>
                    <p class="info-text">Our token rewards you just by moving your body either by running or walking.</p>
                    <a class="info-link" href="">Discover <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 text-center">
                <div class="infobox-2" style="width: 100%;">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    </div>
                    <h5 class="info-heading">Dynamic NFTs</h5>
                    <p class="info-text">Grow your NFT collections. The more you accumulate, the more you earn. and you van win amazing gifts.</p>
                    <a class="info-link" href="">Discover <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                </div>
            </div>                       
        </div>
        <div class="faq mt-5 row px-3 justify-content-center">
            <div class="col-8">
                <h4>Your NGL Referral link</h4>
                <input v-if="authUser.referral" type="text" class="form-control" :value="'http://127.0.0.1:8002/home?ref='+authUser.referral" />
                <input v-else type="text" disabled class="form-control" value="Connect Wallet " />
            </div>
        </div>
    </div>
  
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: "OthersComponent",

    mounted(){},
    computed: {
        ...mapGetters(['authUser'])
    }

}
</script>

<style>

</style>