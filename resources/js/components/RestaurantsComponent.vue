<template>
    <section>

        <div id="restaurants" class="container my-4">
            <div class="row">
                <div class="col">
                    <h2 class="h2">RISTORANTI CHE CONSEGNANO ORA</h2>
                </div>
            </div>
        </div>
        
        <!-- sezione tipologie -->
        <div id="restaurantsbox">
            <div class="cardrestaurant container-fluid">
                <div class="row">
                    <div class="col-sm-3 col-md-2 pt-4">

                        <h5 class="h5">CITTA'</h5>
                        <div class="col input-group input-group mb-3">
                            <div id="searchcity" class="position-relative">
                                <input type="text" 
                                    class="form-control" 
                                    @keyup.enter.prevent="filterRestaurantsByCity" 
                                    name="city" v-model.lazy="inputCity"
                                >
                                <i class="fa-solid fa-magnifying-glass" @click.prevent="filterRestaurantsByCity"></i>
                            </div>
                            <!-- <button @click.prevent="filterRestaurantsByCity" class="btn btn-primary">search</button> -->
                        </div>

                        <h5 class="h5">CATEGORIE</h5>
                        <div class="categories input-group mb-3" v-for="type in types" :key="type.id">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" 
                                    :value="type.id" 
                                    @click="test(type.id, type.name)"
                                >
                            </div>
                            <span type="text" class="form-control" aria-label="Text input with checkbox">{{type.name}}</span>
                        </div>
                    </div>
                    <!-- componente card ristorante -->
                    <!-- loading -->
                    <div v-if="loading" id="loading"> 
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div v-else class="col-sm-9 col-md-10">
                        <card-component :filteredRestaurants="filteredRestaurants"/>
                    </div>
                </div>
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
                loading: true,
            };
        },
        props: {
            city: String,
        },
        created() {
            this.inputCity = this.city;
        },
        mounted() {
            this.getCategories();
            this.getRestaurants();
        },
        computed: {
            filteredRestaurants() {
                return this.filterRestaurantsByCity();
            },
        },
        methods: {
            getRestaurants(){
                axios.get('/api/restaurants/get')
                    .then((res)=>{
                        console.log(res.data);
                        this.restaurants = res.data;
                        this.loading = false;
                    })
                    .catch(error => console.error(error));
            },
            getCategories(){
                axios.get('/api/categories')
                    .then((res) => {
                        // recupero tutti le categorie
                        // this.restaurants = res.data.users;
                        this.types = res.data;
                    }) 
                    .catch(error => console.error(error));
            },
            // show della pagina del ristornate selezionato
            getRestaurantViewById(id){
                window.location.href = `/restaurant/shop/${id}`;   
            },
            // filtro ristornati per città --> inputCity!
            filterRestaurantsByCity(){
                if(this.inputCity === ''){
                    // ritorno tutti i ristornati
                    return this.restaurantsCity = this.restaurants;
                }
                this.restaurantsCity = [];
                // filtro i ristornati per città
                this.restaurants.forEach((restaurant) =>{
                    if(restaurant.city.toLowerCase().includes(this.inputCity.toLowerCase())){
                        this.restaurantsCity.push(restaurant);
                    }
                    console.log(this.restaurantsCitys);
                });
                return this.restaurantsCity
            },
            test(id, name){
                console.log(id, name);
            }
        }
}
</script>
