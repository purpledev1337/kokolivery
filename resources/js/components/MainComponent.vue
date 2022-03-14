<template>
    <section>
        <!-- Header Component  -->
        <header-component />

        <!-- section city -->
        <city-component />

        <!-- Top Ten Restaurant -->
        <div id="title-top-restaurants" class="container py-5">
            <div class="row py-5">
                <div class="col-2 offset-5">
                    <img src="storage/asset/risto.jpeg" alt="">
                </div>
            </div>
            <div class="row">
                <h3 class="h3 text-center">
                    <span class="spancontainer">
                        I NOSTRI MIGLIORI RISTORANTI
                        <span class="highlights"></span>
                    </span>
                </h3>
            </div>
        </div>
        <div id="top-restaurant" class="cardrestaurant container-fluid">
            <top-restaurant-component :topRestaurants="filteredRestaurant" />
        </div>

        <!-- together section -->
        <together-component />

    </section>
</template>

<script>
import TopRestaurantComponent from './TopRestaurantComponent.vue';
export default {
  components: { TopRestaurantComponent },
    data() {
        return {
            restaurants: [],
            filteredRestaurant: [],
            types: [],
        }
    },
    mounted() {
        this.getRestaurant();
        // this.getCategory();
    },
    computed: {
        // filteredRestaurant(){
            
        // },
    },
    methods: {
        getRestaurant(){
            axios.get('/api/restaurants/get')
                .then((res) => {
                    // // recupero tutti i ristornati e riordino per rating
                    this.filteredRestaurant = res.data;
                    this.filteredRestaurant.sort( (a,b) => b.rating - a.rating);
                    // filtro solo i primi 10 risultati
                    this.filteredRestaurant = this.filteredRestaurant.splice(0,10);
                    // console.log(this.filteredRestaurant);
                }) 
                .catch(error => console.error(error));
        }
    },
}
</script>