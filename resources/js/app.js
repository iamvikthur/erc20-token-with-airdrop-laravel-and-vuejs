/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import { createStore } from 'vuex'
import mixing from './mixin';

import Web3 from "web3";
import Web3Modal from "web3modal";
import Torus from "@toruslabs/torus-embed";
import WalletConnectProvider from "@walletconnect/web3-provider";
import CoinbaseWalletSDK from '@coinbase/wallet-sdk';

import NGLTOKEN from '../../build/contracts/NGL.json';
import NGLSALE from '../../build/contracts/NGLSALE.json';
import NGLADDRLOCK from '../../build/contracts/NGLADDRESSLOCK.json'

import axios from 'axios'
import VueAxios from 'vue-axios'

// import VueSweetalert2 from 'vue-sweetalert2';
// import 'sweetalert2/dist/sweetalert2.min.css';



const app = createApp({});

import SidebarLeft from './components/shared/SidebarLeft.vue';
import SidebarRight from './components/shared/SidebarRight.vue';
import Summary from './components/Summary.vue';
import TokenSale from './components/TokenSale.vue';
import Nfts from './components/Nfts.vue'
import Farm from './components/Farm.vue'
import Airdrop from './components/Airdrop.vue'
import Profile from './components/Profile.vue'
import Index from "./components/Index.vue"
import Others from "./components/shared/Others.vue"

app.component('sidebar-left-component', SidebarLeft);
app.component('sidebar-right-component', SidebarRight);
app.component('summary-component', Summary);
app.component('token-sale-component', TokenSale);
app.component('nft-component', Nfts);
app.component('farm-component', Farm);
app.component('airdrop-component', Airdrop);
app.component('profile-component', Profile);
app.component('index-component', Index);
app.component('others-component', Others);


// Create a new store instance.
const baseUrl = window.location.origin
const store = createStore({
    state () {
      return {
        user: { referral_count: 0 },
        account: null,
        balance: null,
        network: null,
        isConnected: false,
        web3: null,
        authUser: {},
        transactionStatus: {type: null, text: null},
        airdropDone: false,
        NGLAccountBalance: 0
      }
    },
    actions: {
        async checkWeb3ConnectionAction({commit, dispatch}){
            const provider = window.ethereum

            if (provider) {
                const accounts = await provider.request({
                    method: 'eth_accounts'
                })
                if (accounts.length) {
                    const web3 =  new Web3(provider)
                    const balance = await web3.eth.getBalance(accounts[0]);
                    const ethBalance = web3.utils.fromWei(balance, "ether");

                    const data = {
                        account: accounts[0],
                        web3,
                        balance: parseFloat(ethBalance).toFixed(4)
                    }
                    commit('setWeb3Data', data)
                    dispatch('getNGLAccountBalanceAction')
                    dispatch('authUserAction', {account: accounts[0], referrer: null })

                    console.log(accounts[0])
                } else {
                    console.log("!!! SITE NOT CONNECTED")
                }
            } else {
                console.log("!!! METAMASK NOT INSTALLED !!!")
            }
        },
        async getNGLAccountBalanceAction({state, commit}){
            if (state.account) {
                const web3 = state.web3
                const account = state.account

                try {
                    const Token = new web3.eth.Contract(NGLTOKEN.abi, '0x7044Dff9fbe4539Caea989F5E08EFAafd40E8c5B');
                    const bal = await Token.methods.balanceOf(account).call();

                    const accountBalance = web3.utils.fromWei(bal)
    
                    commit('setUserNGLBalance', accountBalance)
                    
                } catch (error) {
                    console.log(error)
                }
            }
        },
        checkIfUserHasDoneAirdropAction({commit}, userId){
            axios.get(`${baseUrl}/check_airdrop/${userId}`)
            .then(res => {
                commit('userHasDoneAirdrop')
            })
        },
        async saveAirdropUserAction({commit}, formdata){
            axios.post(`${baseUrl}/airdrop`, formdata)
            .then(res => {
                commit('userHasDoneAirdrop')
                console.log(res)
            })
            .catch(error => {
                console.log(error)
            })
        },
        async authUserAction({commit}, obj){
            const fd = {
                bep20_address: obj.account[0],
                referrer: obj.referrer
            }
            const res = await axios.post(`${baseUrl}/auth_user`, fd)
            const data = await res.data;
            console.log("this is the user data", data);
            commit('setAuthUser', data)
        },
        userAction({commit}, data){
            localStorage.setItem('user', JSON.stringify(data))
            commit('setUser', data)
        },
        setUserAction({commit}){
            const data = JSON.parse(localStorage.getItem('user'))
            commit('setUser', data)
        },
        async connectWalletAction({commit, dispatch}, referrer){
            const expectedChainId = 97
            const providerOptions = {
                injected: {
                  display: {
                    logo: 'data:image/png;base64,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',
                    name: 'Metamask',
                    description: 'Connect with the provider in your Browser',
                  },
                  package: null,
                },
                walletconnect: {
                    package: WalletConnectProvider, // required
                    options: {
                        // infuraId: "8fa36a685e88497d93ae5945a92051ad", // required
                        rpc: {
                            97: "https://data-seed-prebsc-1-s1.binance.org:8545/"
                        }
                    }
                },
                coinbasewallet: {
                    package: CoinbaseWalletSDK, // Required
                    options: {
                        appName: "NGL TOKEN", // Required
                        infuraId: "8fa36a685e88497d93ae5945a92051ad", // Required
                        rpc: "", // Optional if `infuraId` is provided; otherwise it's required
                        chainId: 4, // Optional. It defaults to 1 if not provided
                        darkMode: false // Optional. Use dark theme, defaults to false
                    }
                },
                torus: {
                    package: Torus, // required
                    options: {
                    networkParams: {
                        host: "https://ropsten.infura.io/v3/7df6857af12b4aa6b61f8e4813690599", // optional
                        chainId: expectedChainId, // optional
                        networkId: expectedChainId // optional
                    },
                    config: {
                        buildEnv: "development" // optional
                    }
                    }
                }
            }

            const web3modal = new Web3Modal({
                // network: "Smart Chain - Testnet",
                cacheProvider: true,
                providerOptions,
            });

            try {
                const provider = await web3modal.connect();
                const web3 = new Web3(provider);
                const chainId = await web3.eth.getChainId();

                if (chainId != expectedChainId) {
                    try {

                        await web3.currentProvider.request({
                            method: 'wallet_switchEthereumChain',
                            params: [{chainId: "0x61"}]
                        })
                        
                    } catch (error) {
                        if (error.code == 4902) {
                            await web3.currentProvider.request({
                                method: 'wallet_addEthereumChain',
                                params: [{
                                    chainId: '0x61',
                                    chainName: 'Binance Smart Chain - Testnet',
                                    rpcUrls: ['https://data-seed-prebsc-1-s1.binance.org:8545/'],
                                    blockExplorerUrls: ['https://testnet.bscscan.com']
                                }]
                            })
                            .catch((error) => {
                                console.log(error)
                            }) 
                        }

                    }

                }

                let data = {}

                const account = await web3.eth.getAccounts();
                const balance = await web3.eth.getBalance(account[0]);
                const ethBalance = web3.utils.fromWei(balance, "ether");
                data.balance = parseFloat(ethBalance).toFixed(4);
                data.network = await web3.eth.net.getNetworkType();
                data.account = account[0]
                data.web3 = web3

                commit('setWeb3Data', data)
                dispatch('getNGLAccountBalanceAction')
                dispatch('authUserAction', {account, referrer})

            } catch (error) {
                console.log(error)
                alert(error)
            }
        },
        async buyTokensAction({state, commit, dispatch}, amount){
            const web3 = state.web3
            const account = state.account
            try {
                const TokenSale = new web3.eth.Contract(NGLSALE.abi, '0x911B759279dce1751b404E03F1304Ccc652BcDa0');
                const wei_amount = web3.utils.toWei(amount.toString(), 'ether')

                const tx = await TokenSale.methods.buyTokens(account).send({from: account, value: wei_amount, gas: 3000000});

                commit('transactionSuccessful')
                dispatch('openSwalToastAction')

                console.log(tx)
                
            } catch (error) {
                commit('transactionError')
                dispatch('openSwalToastAction')
                console.log(error)
            }

        },
        openSwalToastAction({state}){
            const toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                padding: '2em'
            });

            toast({
                type: state.transactionStatus.type,
                title: state.transactionStatus.text,
                padding: '2em',
            })
        }
        
    },
    mutations: {
        transactionSuccessful(state){
            state.transactionStatus.type = 'success';
            state.transactionStatus.text = "Transaction successful";
        },
        transactionError(state){
            state.transactionStatus.type = 'error';
            state.transactionStatus.text = "Transaction encountered an error";
        },
        setUser (state, data) {
            state.user = data
        },
        setWeb3Data(state, data){
            state.account = data.account;
            state.balance = data.balance;
            state.network = data.network;
            state.web3 = data.web3;
            state.isConnected = true
        },
        setAuthUser(state, data){
            state.authUser = data
        },
        userHasDoneAirdrop(state){
            state.airdropDone = true
        },
        setUserNGLBalance(state, data){
            state.NGLAccountBalance = new Intl.NumberFormat('ja-JP').format(data)
        }
    },
    getters: {
        user: (state) => state.user,
        account: (state) => state.account,
        balance: (state) => state.balance,
        network: (state) => state.network,
        isConnected: (state) => state.isConnected,
        web3: (state) => state.web3,
        authUser: (state) => state.authUser,
        transactionStatus: (state) => state.transactionStatus,
        airdropDone: (state) => state.airdropDone,
        NGLAccountBalance: (state) => state.NGLAccountBalance,
    }
})

app.use(VueAxios, axios)
app.use(store)
app.mixin(mixing);
app.mount('#app');
