<template>
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">                                
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                        <h4>Buy NGL Tokens</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area row justify-content-center">
                <div class="input-group mb-5 col-12 col-xl-10 col-md-10 col-sm-12">
                    <div class="input-group-prepend">
                        <span class="input-group-text">BNB</span>
                    </div>
                    <input placeholder="0.00" min="0.1" max="10" @keyup="calculateNGL($event)" step="0.1" v-model="bnb" type="number" class="form-control">
                </div>

                <div class="input-group mb-4 col-12 col-xl-10 col-md-10 col-sm-12">
                    <div class="input-group-prepend">
                        <span class="input-group-text">NGL</span>
                    </div>
                    <input disabled type="text" :value="nglprice" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>

                <div class="input-group col-10">
                    <p>IDO Sale price: 1BNB =  {{price}} NGL</p>
                </div>

                <div class="input-group justify-content-center">
                    <button v-if="!isConnected" @click="connectWallet()" class="btn btn-primary mt-3">Connect Wallet</button>
                    <button @click="buyToken()" v-else class="btn btn-primary mt-3">Buy NGL</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: "TokenSale",
    data(){
        return {
            bnb: null,
            price: 100,
            nglprice: 0
        }
    },
    mounted(){},
    methods: {
        calculateNGL(e){
            console.log(e)
            this.nglprice =  new Intl.NumberFormat('ja-JP').format(this.bnb * this.price)
        },
        connectWallet(){
            this.$store.dispatch('connectWalletAction')
        },
        buyToken(){
            if (this.bnb < 0.1 || this.bnb > 10) {

                const text = this.bnb < 0.1 ? "Minimum BNB is 0.1" : "Maximum BNB is 10";

                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '2em'
                });

                toast({
                    type: 'error',
                    title: text,
                    padding: '2em',
                })

                return

            }
            
            this.$store.dispatch('buyTokensAction', this.bnb)
        }
    },
    computed: {
        ...mapGetters(['isConnected'])
    },
}
</script>