<template>
    <div class="admin-data-content layout-top-spacing">
        <div class="helpdesk">
            <div class="helpdesk layout-spacing container">
                <div class="hd-header-wrapper">
                    <div class="row">                                
                        <div class="col-md-12 text-center">
                            <h4 class="text-white">Welcome to our airdrop</h4>
                            <p class="">Please read the instructions below </p>
                        </div>
                    </div>
                </div>

                <div class="hd-contact-section">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Instructions</h4>
                            <ol class="font-weight-bolder">
                                <li>You must complete all tasks.</li>
                                <li>You can only participate once.</li>
                                <li>After completeing your tasks, airdrop distribution is within 48hrs.</li>
                                <li>Airdrop tokens will be locked till after presale.</li>
                                <li>Airdrop reward is 500 NGL tokens worth $200.</li>
                            </ol>
                        </div>
                        <div class="col-12 text-right">
                            <!-- <button class="btn btn-info btn-rounded">Continue with telegram</button> -->
                            <telegram-login-temp 
                            mode="callback"
                            telegram-login="NglAuthBot"
                            @callback="authenticateUser" />
                        </div>
                    </div>
                </div>
        
            </div>
        </div>

        </div>
</template>

<script>
import { telegramLoginTemp } from 'vue3-telegram-login'
export default {
    name: "Airdrop",
    mounted(){},
    methods: {
        authenticateUser(user){
            console.log(user)
            this.$store.dispatch('userAction', user)
            window.location.href = window.location.origin  + "/profile"
        }
    },
    components: {
        telegramLoginTemp
    }
}
</script>

<style>

</style>