export default {
    data(){
        return {
            pathOrigin: window.location.origin
        }
    },
    mounted(){
        this.$store.dispatch('checkWeb3ConnectionAction')
    }
}