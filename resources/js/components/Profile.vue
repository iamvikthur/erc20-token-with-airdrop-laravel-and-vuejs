<template>
  <!-- Content -->
    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 layout-top-spacing">
        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="text-center user-info">
                    <img style="max-width: 34%; box-shadow: none;" class="img-fluid" :src="user.photo_url || 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png'" alt="avatar">
                    <p class="text-capitalize">{{user.username}}</p>
                </div>
            </div>
        </div>
    </div>

    <div id="listGroupTask" class="col-lg-12 layout-spacing">
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
                                <input ref="group" type="checkbox" disabled class="new-control-input">
                                <span class="new-control-indicator"></span>
                                <span class="ml-2">
                                    <a target="blank" class="text-warning" href="#">Join ur telegram group</a>
                                </span>
                                <span @click.prevent="checkTask('group')" class="ml-3 d-block">
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
                                    <a target="blank" class="text-warning" href="#">Join Our telegram channel</a>
                                </span>
                                <span @click.prevent="checkTask('channel')" class="ml-3 d-block">
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
                                        <a target="blank" class="text-warning" href="#">Follow our twitter handle and retweet pinned tweet</a>
                                    </span>
                                    <span @click.prevent="checkTask('twitter')" class="ml-3 d-block">
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
                                        <a target="blank" class="text-warning" href="#">Join our discord channle</a>
                                    </span>
                                    <span @click.prevent="checkTask('discord')" class="ml-3 d-block">
                                        <span class="badge badge-primary">Confirm</span>
                                    </span>
                            </label>
                        </div>
                    </li>
                </ul>
                <div class="mt-4 text-center">
                    <button @click="openSweetModal()" class="btn btn-primary">I have completed all tasks</button>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import { mapGetters } from 'vuex'
export default {
    name: "Profile",
    mounted(){
        this.$store.dispatch('setUserAction')
    },
    methods: {
        checkTask(channel){
            this.$refs[channel].checked = true
        },
        openSweetModal(){
            swal({
                title: 'Great',
                text: "Congratulations on completing your tasks",
                type: 'info',
                showCancelButton: false,
                confirmButtonText: 'Close',
                padding: '2em'
            })
        }
    },
    computed: {
        ...mapGetters(['user'])
    }
}
</script>

<style>

</style>