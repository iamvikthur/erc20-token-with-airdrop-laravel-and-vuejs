<template>
    <div class="row bg-white p-3 justify-content-center">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12 mb-3 mt-3 text-center">
            <h4>Explore our NFT collections</h4>
        </div>
        <div id="card_2" style="border:none;" class="shadow col-lg-3 col-md-3 col-sm-6 mx-3 col-12 my-3 layout-spacing" v-for="(nft,index) in nfts" :key="index">
            <div class="card component-card_2">
                <img :srcset="nft.srcset" :src="nft.img" class="card-img-top" alt="widget-card-2">
                <div class="card-body">
                    <h5 class="card-title">{{nft.name}}</h5>
                    <p class="card-text font-weight-bolder">{{nft.number}}</p>
                    <a href="#" @click.prevent="openSweetModal()" class="btn btn-primary btn-rounded warning confirm">Buy NFT</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Nfts",
    data(){
        return {
            nfts: [],
        }
    },
    methods: {
        openSweetModal(){
            swal({
                title: 'Unavailable',
                text: "This feature is not available now",
                type: 'warning',
                showCancelButton: false,
                confirmButtonText: 'Close',
                padding: '2em'
            })
        }
    },
    mounted(){
        const data = [
                {
                    name: "Collection One",
                    img: this.pathOrigin + '/dash/nfts/nft-1.jpg',
                    number: '#001',
                    srcset: `${this.pathOrigin}/dash/nfts/nft-1.jpg 640w, ${this.pathOrigin}/dash/nfts/nft-1.jpg 750w, ${this.pathOrigin}/dash/nfts/nft-1.jpg 828w, ${this.pathOrigin}/dash/nfts/nft-1.jpg 1080w, ${this.pathOrigin}/dash/nfts/nft-1.jpg 1200w, ${this.pathOrigin}/dash/nfts/nft-1.jpg 1920w, ${this.pathOrigin}/dash/nfts/nft-1.jpg 2048w, ${this.pathOrigin}/dash/nfts/nft-1.jpg 3840w`
                },
                {
                    name: "Collection Two",
                    img: this.pathOrigin + '/dash/nfts/nft-2.jpg',
                    number: '#002'
                },
                {
                    name: "Collection Three",
                    img: this.pathOrigin + '/dash/nfts/nft-3.jpg',
                    number: '#003'
                },
                {
                    name: "Collection Four",
                    img: this.pathOrigin + '/dash/nfts/nft-4.jpg',
                    number: '#004'
                },
                {
                    name: "Collection Five",
                    img: this.pathOrigin + '/dash/nfts/nft-1.jpg',
                    number: '#005'
                },
                {
                    name: "Collection Six",
                    img: this.pathOrigin + '/dash/nfts/nft-2.jpg',
                    number: '#006'
                },
                {
                    name: "Collection Seven",
                    img: this.pathOrigin + '/dash/nfts/nft-3.jpg',
                    number: '#007'
                },
                {
                    name: "Collection Eight",
                    img: this.pathOrigin + '/dash/nfts/nft-4.jpg',
                    number: '#008'
                },
                {
                    name: "Collection Nine",
                    img: this.pathOrigin + '/dash/nfts/nft-1.jpg',
                    number: '#010'
                },
                {
                    name: "Collection Ten",
                    img: this.pathOrigin + '/dash/nfts/nft-2.jpg',
                    number: '#011'
                },
                {
                    name: "Collection Nine",
                    img: this.pathOrigin + '/dash/nfts/nft-3.jpg',
                    number: '#010'
                },
                {
                    name: "Collection Ten",
                    img: this.pathOrigin + '/dash/nfts/nft-4.jpg',
                    number: '#011'
                }
            ];

        this.nfts = data
    }
}
</script>

<style scoped>
        .component-card_2 a.btn-primary {
        margin: 26px 0 0 0;
        padding: 10px 16px;
        background: #f8538d !important;
        border-color: #f8538d;
    }
</style>