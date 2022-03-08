<template>
    <section>
        <!-- Header Component  -->
        <header-component />

        <!-- Top Ten Restaurant -->
        <top-restaurant-component :topRestaurants="filteredRestaurant" />
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
            axios.get('/api/restaurants')
                .then((res) => {
                    // recupero tutti i ristornati
                    this.restaurants = res.data.users;
                    this.types = res.data.types;
                    console.log('risto',this.restaurants);
                    console.log('types',this.types);
                    // ordino i ristoranti x rating discendete
                    this.filteredRestaurant = this.restaurants;
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