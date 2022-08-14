<template>
    <div class="col-right">
        <div class="col-right-content">
            <div class="navbar-item flex-row mb-5 search-ul" style="justify-content: center">
                <div class="nav-item text-center">
                    <button v-if="!isConnected" @click="connectWallet" class="btn btn-warning text-center mb-2">Connect Wallet</button>
                    <button v-else class="btn btn-default text-center mb-2 font-weight-bolder">{{ getWalletAndBalanceText() }}</button>
                </div>
            </div>

            <div class="row mb-5">
                <div class="p-3 text-white">
                    <h5 class="mb-3 text-white mb-5">Buy NGL Tokens</h5>
                    <div class="nav-item align-self-center search-animated mb-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Binance-coin-bnb-logo.png" />
                        <form class="form-inline search-full form-inline search" role="search">
                            <div class="search-bar">
                                <input @keyup="calculateNGL($event)" v-model="bnb" type="number" class="form-control search-form-control  ml-lg-auto" placeholder="0">
                            </div>
                        </form>
                    </div>

                    <div class="input-group mb-3 text-center mb-3">
                        <svg style="width: 250px; height: 15px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </div>

                    <div class="nav-item align-self-center search-animated mb-3">
                        <img :src="pathOrigin + '/dash/assets/img/cork-logo.png'" />
                        <form class="form-inline search-full form-inline search" role="search">
                            <div class="search-bar">
                                <input :value="nglprice" type="text" disabled class="form-control search-form-control  ml-lg-auto" placeholder="0">
                            </div>
                        </form>
                    </div>

                    <div class="input-group">
                        <p class="text-white small">IDO Sale price: 1BNB =  {{price}} NGL</p>
                    </div>

                    <div class="input-group justify-content-center">
                        <button v-if="!isConnected" @click="connectWallet()" class="btn btn-primary mt-3">Buy NGL</button>
                        <button v-else @click="buyToken()" class="btn btn-primary mt-3">Buy NGL</button>
                    </div>
                </div>
            </div> 
                            
            <div class="col-right-content-container">
                <div class="activity-section">
                    <!-- <div class="widget-calendar">
                        <div class="widget-title">
                            <h5>Web3 Details</h5>
                        </div>
                        <div class="widget-calendar-lists">
                            <div class="widget-calendar-lists-scroll">
                                <a href="apps_calendar.html" class="w-calendar w-calendar-c6">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    </div>
                                    <div>
                                        <p class="w-calendar-text font-weight-bolder"> Connection status</p>
                                        <p>
                                            <span v-if="!isConnected" class="calendar-number">Not connected</span>
                                            <span v-else class="calendar-number">Connected</span>
                                        </p>
                                    </div>
                                </a>

                                <a href="apps_calendar.html" class="w-calendar w-calendar-c3">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </div>
                                    <div>
                                        <p class="w-calendar-text font-weight-bolder"> Wallet Address</p>
                                        <p v-if="isConnected"><span class="calendar-number text-truncate">{{ addressFilter() }}</span></p>
                                    </div>
                                </a>

                                <a href="#" class="w-calendar w-calendar-c1">
                                    <div class="w-icon text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16">
                                        <path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z"/>
                                        <path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z"/>
                                        <path d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="w-calendar-text font-weight-bolder"> Blockchain Network</p>
                                        <p class="text-truncate text-capitalize"><span class="calendar-number">{{network}}</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>       
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    data() {
        return {
            nglprice: 0,
            bnb: null,
            price: 100
        }
    },
    // mounted() { this.$store.dispatch('connectWalletAction') },
    methods: {
        calculateNGL(e){
            console.log(e)
            const number = parseInt(this.bnb * this.price)
            this.nglprice =  new Intl.NumberFormat('ja-JP').format(number)
        },
        connectWallet(){
            this.$store.dispatch('connectWalletAction')
        },
        getWalletAndBalanceText(){
            const bal = this.balance
            const addr = this.account
            let length = addr.length
            let addr_substr = addr.substr(length - 4, 4)
            console.log(addr_substr, length)
            return addr_substr +'...('+ bal+' BNB)';
        },
        addressFilter(){
            let addr = this.account

            let f = addr.substr(0, 4)
            let s = addr.substr(addr.length - 4, 4)

            return f+ "..." +s
        },
        buyToken(){
            this.$store.dispatch('buyTokensAction', this.bnb)
        }
    },
    computed: {
        ...mapGetters(['account', 'balance', 'network', 'isConnected', 'transactionStatus'])
    },
    watch: {
        transactionStatus(statusObj){
            console.log(statusObj)
            const toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                padding: '2em'
            });

            toast({
                type: statusObj.type,
                title: statusObj.text,
                padding: '2em',
            })
        }
    }
}
</script>

<style scoped>
.nav-item.search-animated img {
    font-weight: 600;
    margin: 0 9.6px;
    cursor: pointer;
    color: #e3e4eb;
    position: absolute;
    width: 18px;
    height: 18px;
    top: 8px;
    left: 12px;
}

input[disabled] {
    background-color: #151516 !important;
}
</style>