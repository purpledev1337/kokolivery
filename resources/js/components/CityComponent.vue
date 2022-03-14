<template>
    <section id="cityactive">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-2 offset-5">
                    <img src="storage/asset/cities.svg" alt="">
                </div>
            </div>
            <div class="row text-center">
                <h3 class="h3 display-6">
                    <span class="spancontainer">
                        SIAMO PRESENTI NELLE SEGUENTI CITTA'
                        <span class="highlights"></span>
                    </span>
                </h3>
            </div>
        </div>
        <!-- stampiamo tutte le città -->
        <div class="container py-5">
            <div class="row">
                <div class="col g-5" v-for="city in cities" :key="city.id">
                    <span class="city">{{city}}</span>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            cities: [],
        }
    },
    mounted() {
        this.getCities()
    },
    methods: {
        getCities(){
            axios.get('/api/city/get')
                .then((result) => {
                    result.data.forEach(element => {
                        this.cities.push(element.city);
                    });
                })
                .catch((err) => console.error(err));
        }
    },
}
</script>