<template>
    <div>
        <a href="/">Link alla home</a>
        <h3>Restaurants List:</h3>

        <div id="restaurants_box">
            <div class="restaurant_card" v-for="restaurant in restaurants" :key="restaurant.id">
                <img src="" :alt="restaurant.image_path">
                <h2>{{ restaurant.brand_name }}</h2>
                <h6>Indirizzo: {{ restaurant.address }}</h6>
                <span>Stelline -> {{ restaurant.rating }}</span>
                <span>({{ restaurant.num_rating }})</span>
            </div>
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
            
            axios.get('/api/restaurant_list')
                .then(r => this.restaurants = r.data)
                .catch(e => console.error(e));
        }
    }
</script>
