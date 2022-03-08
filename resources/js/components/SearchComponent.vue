<template>
    <div id="cont">
        <div id="cont-logo">
            <div id="cont-img">
                <img id="float-img" src="storage/asset/kokolivery-logo.svg" alt="">
            </div>
            <h1 id="float-title">
                Kokolivery
            </h1> 
        </div>
        <div>
            <input type="text" placeholder="Inserisci La Via, La Citta' E La Provincia" v-model="inputSearch">
            <a href="`/api/restaurant_list/${inputSearch}`" class="btn btn-primary" >SEARCH</a>
        </div>
    </div>

</template>

<script>
    export default {
        data() {

            return {
                inputSearch:'',
            };
        },
        mounted() {

        },

        methods: {
        }
    }
</script>