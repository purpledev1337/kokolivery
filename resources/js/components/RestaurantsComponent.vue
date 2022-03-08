<template>
    <div>
        <h3>Restaurants List:</h3>
        {{city}}
        <div id="restaurants_box">
            <div @click.prevent="searchRestaurantsFromCity(restaurant.id)"  class="restaurant_card" v-for="restaurant in restaurants" :key="restaurant.id">
                <img class="restaurant_img" :src="`../storage/${restaurant.image}`" alt="">
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
                restaurants:[],
                types: [],
            };
        },
        props: {
            city: String,
        },
        mounted() {
            this.getRestaurant();
        },

        methods: {
             getRestaurant(){
                axios.get('/api/restaurants')
                    .then((res) => {
                        // recupero tutti i ristornati
                        this.restaurants = res.data.users;
                        this.types = res.data.types;
                        console.log('risto',this.restaurants);
                        console.log('types',this.types);
                    }) 
                    .catch(error => console.error(error));
            },
            searchRestaurantsFromCity(id){
                window.location.href = `/restaurant/shop/${id}`;   
            },
        }
    }
</script>
