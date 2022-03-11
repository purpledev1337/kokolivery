<template>
    <section>
        <!-- Header Component  -->
        <header-component />

        <!-- Top Ten Restaurant -->
        <h4 class="h4 m-2">I nostri migliori Ristornati</h4>
        <div id="top-restaurant" class="cardrestaurant container-fluid">
            <top-restaurant-component :topRestaurants="filteredRestaurant" />
        </div>
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