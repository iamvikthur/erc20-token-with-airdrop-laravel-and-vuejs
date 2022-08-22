<template>
  <!-- Content -->
    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-6 col-6 layout-top-spacing">
        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="text-center user-info">
                    <img style="max-width: 34%; box-shadow: none;" class="img-fluid" :src="user != null ? user.photo_url : 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png'" alt="avatar">
                    <p class="text-capitalize">{{user ? user.username : ""}}</p>
                </div>
            </div>
        </div>
    </div>

    <div id="listGroupTask" class="col-lg-12 layout-spacing" v-if="!airdropDone">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Airdrop Tasks</h4> 
                    </div>                   
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <ul class="list-group list-group-flush task-list-group">
                    <li class="list-group-item list-group-item-action mb-4">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                <input :checked="isConnected" ref="wallet" type="checkbox" disabled class="new-control-input">
                                <span class="new-control-indicator"></span>
                                <span class="ml-2">
                                    <a target="blank" @click.prevent="connectWallet()" class="text-info" href="#">Connect Wallet</a>
                                </span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action mb-4">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                <input ref="group" type="checkbox" disabled class="new-control-input">
                                <span class="new-control-indicator"></span>
                                <span class="ml-2">
                                    <a target="blank" @click.prevent="openLink('https://t.me/thengltokennews', 'group')" class="text-info" href="#">Join our telegram group</a>
                                </span>
                                <span v-if="page.group" @click.prevent="checkTelegramTask('group')" class="ml-3 d-block">
                                    <span class="badge badge-primary">Confirm</span>
                                </span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action mb-4">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                <input ref="channel" type="checkbox" disabled class="new-control-input">
                                <span class="new-control-indicator"></span>
                                <span class="ml-2">
                                    <a target="blank" class="text-info" @click.prevent="openLink('https://t.me/thengltokennews', 'channel')" href="#">Join our telegram channel</a>
                                </span>
                                <span v-if="page.channel" @click.prevent="checkTelegramTask('channel')" class="ml-3 d-block">
                                    <span class="badge badge-primary">Confirm</span>
                                </span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action mb-4">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                <input ref="twitter" type="checkbox" disabled class="new-control-input">
                                <span class="new-control-indicator"></span>
                                    <span class="ml-2">
                                        <a target="blank" class="text-info" @click.prevent="openLink('http://twitter.com', 'twitter')" href="#">Follow our twitter handle and retweet pinned tweet</a>
                                    </span>
                                    <span v-if="page.twitter" @click.prevent="checkTwitterTask('twitter')" class="ml-3 d-block">
                                        <span class="badge badge-primary">Confirm</span>
                                    </span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="n-chk">
                            <label class="new-control new-checkbox checkbox-primary w-100 justify-content-between">
                                <input ref="discord" type="checkbox" disabled class="new-control-input">
                                <span class="new-control-indicator"></span>
                                    <span class="ml-2">
                                        <a target="blank" class="text-info" @click.prevent="openLink('http://discord.com', 'discord')" href="#">Join our discord server</a>
                                    </span>
                                    <span v-if="page.discord" @click.prevent="checkDiscordTask('discord')" class="ml-3 d-block">
                                        <span class="badge badge-primary">Confirm</span>
                                    </span>
                            </label>
                        </div>
                    </li>
                </ul>
                <div class="mt-4 text-center">
                    <button v-if="tasksCompleted" @click="saveAirdropUser()" class="btn btn-primary">I have completed all tasks</button>
                    <button v-else @click="openSweetModal('error', 'You must complete all tasks', 'Not Allowed')" class="btn btn-primary">I have not completed all tasks</button>
                </div>
            </div>
        </div>
    </div>

    <div id="listGroupTask" class="col-lg-12 layout-spacing" v-else>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Airdrop Tasks</h4> 
                    </div>                   
                </div>
            </div>
            <div class="widget-content widget-content-area success">
                <p class="alert alert-success">You have completed all your tasks</p>
            </div>
            <div class="widget-content widget-content-area">
            <h4>Your Referral link</h4>
            <input v-if="authUser.referral" type="text" class="form-control" :value="pathOrigin +'/home?ref='+authUser.referral" />
            <input v-else type="text" disabled class="form-control" value="Connect Wallet " />
        </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: "Profile",
    data(){
        return {
            formdata: {
                twitterUsername: null,
                discordUsername: null,
                telGroup: null,
                telChannel: null,
                walletConnected: false
            },
            airdropTasksCompleted: false,
            page: {
                group: false,
                channel: false,
                twitter: false,
                discord: false
            }
        }
    },
    mounted(){
        this.$store.dispatch('setUserAction').then( (ins) => {
            if (!this.user) {
                window.location.href = this.pathOrigin  + "/airdrop"
            } else {
                this.$store.dispatch('checkIfUserHasDoneAirdropAction', this.user.id /* 2069983613 */ );
            }
        })
    },
    methods: {
        openLink(link, info){
            this.page[info] = true
            window.open(link, '_blank')
        },
        saveAirdropUser(){
            this.openSweetModal('success', 'Congratulations on completing your tasks, you will get your NGL tokens within 24 to 48 hours after proper confirmation');
            let fd = {};

            fd.telegram_id = this.user.id // 2069983613 
            fd.bep20_address =  this.account;
            fd.discord_username = this.formdata.discordUsername;
            fd.telegram_name = this.user.first_name + ' ' + this.user.last_name; // "lauren Gooz"
            fd.telegram_username = this.user.username; //"laurengooz" 
            fd.twitter_username = this.formdata.twitterUsername;

            this.$store.dispatch('saveAirdropUserAction', fd);
        },
        connectWallet(){
            this.$store.dispatch('connectWalletAction').then(() => {
                if (this.account) {
                    this.formdata.walletConnected = true
                    this.$refs.wallet.checked = true
                }
            })
            
        },
        async checkTwitterTask(){
            const { value: twitterUsername } = await swal.fire({
            title: 'Enter your twitter username',
            input: 'text',
            inputLabel: 'Your IP address',
            inputPlaceholder: 'e.g @ngltoken',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                return 'Twitter username required'
                }
            }
            })

            if (twitterUsername) {
                // save data to backend
                this.formdata.twitterUsername = twitterUsername;
                this.$refs.twitter.checked = true
                swal.fire({text: `Your twitter username is ${twitterUsername}`, type: 'success'})
            }
        },
        async checkDiscordTask(){
            const { value: discordUsername } = await swal.fire({
            title: 'Enter your discord username',
            input: 'text',
            inputLabel: 'Your IP address',
            inputPlaceholder: 'e.g @ngldiscordtoken',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                return 'Discord username required'
                }
            }
            })

            if (discordUsername) {
                // save data to backend
                this.formdata.discordUsername = discordUsername;
                this.$refs.discord.checked = true
                swal.fire({text: `Your twitter username is ${discordUsername}`, type: 'success'})
            }
        },
        checkTelegramTask(channel){
            const vue = this
            swal({
                title: 'confirming task...',
                text: 'Do not close modal',
                padding: '2em',
                type: 'info',
                onOpen: function () {
                    swal.showLoading()
                    try {
                        setTimeout( () => {
                            const Token = "5471859339:AAG8nAcCsJadCnnXUWS4AL7Nr40uPdas8YE";
                            const Method = "GET";

                            const req = {
                                chat_id: channel == 'group' ? '@thengltoken' : '@thengltokennews',
                            }
                            const user_id = 2069983613;
                            const URL = `https://api.telegram.org/bot${Token}/getChatMember?chat_id=${req.chat_id}&user_id=${user_id}`;
                            var xmlHttp = new XMLHttpRequest();
                            xmlHttp.open(Method, URL, false);
                            xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xmlHttp.send(null);

                            const response = JSON.parse(xmlHttp.responseText)

                            if (response.ok) {

                                vue.openSweetModal('success', 'Task completed Successfully')
                                vue.$refs[channel].checked = true
                                if (channel == 'group') {
                                     vue.formdata.telGroup = true
                                } else {
                                     vue.formdata.telChannel = true
                                }

                            }else {
                                vue.openSweetModal('error', 'You have not completed this task')
                            }

                            console.log(JSON.parse(xmlHttp.responseText))

                        }, 2000)
                        
                    } catch (error) {
                        console.log(error)
                        vue.openSweetModal('error', error)
                    }

                }
            })

        },
        openSweetModal(type, message, title){
            const r_title = title || type == 'error' ? "Error" : "Great"
            swal({
                title: r_title,
                text: message,
                type: type,
                showCancelButton: false,
                confirmButtonText: 'Close',
                padding: '2em'
            })
        },
    },
    computed: {
        ...mapGetters(['user', 'account', 'airdropDone', 'authUser', 'isConnected']),
        tasksCompleted(){
            return (
                this.formdata.twitterUsername !== null && 
                this.formdata.discordUsername !== null &&
                this.formdata.telGroup !== null &&
                this.formdata.telChannel !== null &&
                this.formdata.walletConnected !== false
            )
        }
    }
}
</script>

<style>

</style>