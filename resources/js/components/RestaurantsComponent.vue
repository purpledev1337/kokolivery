<template>
    <div>
        <a href="/">Link alla home</a>
        <h3>Restaurants List:</h3>

        <div id="restaurants_box">
            <a  :href="`restaurant/shop/${restaurant.id}`" class="restaurant_card" v-for="restaurant in restaurants" :key="restaurant.id">
                <img :src="`storage/${restaurant.image}`" alt="">
                <h2>{{ restaurant.brand_name }}</h2>
                <h6>Indirizzo: {{ restaurant.address }}</h6>
                <span>Stelline -> {{ restaurant.rating }}</span>
                <span>({{ restaurant.num_rating }})</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {

            return {

                restaurants:[]
            };
        },
        mounted() {
            this.getData();
        },

        methods: {
            getData() {
                axios.get('/api/restaurant_list')
                .then(r => this.restaurants = r.data)
                .catch(e => console.error(e));
            }
        }
    }
</script>
