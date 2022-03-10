<template>
    <section>
        <div class="container">
            <h3>Restaurants List:</h3>
            <div class="row row-cols-2">
                <div class="col">
                    <label for="cityFilter">Città:</label>
                    <input @keyup.enter.prevent="filterRestaurantByCity" type="text" name="city"  v-model.lazy="inputCity">
                    <button @click.prevent="filterRestaurantByCity" class="btn btn-primary">search</button>
                </div>
            </div>
            <!-- sezione tipologie -->
            <div class="row">
                <div class="col">
                    <span class="type">
                        Sushi
                    </span>
                    <span>
                        italiano
                    </span>
                    <!-- <label for="cityFilter">Filtra qui i ristornati per tipologia:</label>
                    <input @keyup.enter.prevent="filterRestaurantByCity" type="text" name="city"  v-model.lazy="inputCity">
                    <button @click.prevent="filterRestaurantByCity" class="btn btn-primary">search</button> -->
                </div>
            </div>
        </div>

        <div id="restaurantsbox">
            <div class="cardrestaurant container-fluid">
                <card-component :filteredRestaurants="filteredRestaurants"></card-component>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {

            return {
                restaurants:[],
                types: [],
                restaurantsCity: [],
                inputCity: '',
            };
        },
        props: {
            city: String,
        },
        created() {
            this.inputCity = this.city;
        },
        mounted() {
            this.getRestaurant();
        },
        computed: {
            filteredRestaurants() {
                return this.filterRestaurantByCity();
            }
        },
        methods: {
             getRestaurant(){
                axios.get('/api/restaurants')
                    .then((res) => {
                        // recupero tutti i ristornati e le categorie
                        this.restaurants = res.data.users;
                        this.types = res.data.types;
                    }) 
                    .catch(error => console.error(error));
            },
            // show della pagina del ristornate selezionato
            getRestaurantViewById(id){
                window.location.href = `/restaurant/shop/${id}`;   
            },
            // filtro ristornati per città --> inputCity!
            filterRestaurantByCity(){
                if(this.inputCity === ''){
                    return this.restaurantsCity = this.restaurants;
                }
                this.restaurantsCity = [];
                // filtro i ristornati per città
                this.restaurants.forEach((restaurant) =>{
                    if(restaurant.city.toLowerCase().includes(this.inputCity.toLowerCase())){
                        this.restaurantsCity.push(restaurant);
                    }
                });
                return this.restaurantsCity
        }
    }
}
</script>
