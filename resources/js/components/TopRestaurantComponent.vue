<template>
    <!-- <div id="top-restaurant" class="container-fluid content my-5"> -->
        <!-- <div class="row flex-nowrap overflow-auto row-cols-2 row-cols-lg-4 position-relative">
            <div v-for="restaurant in topRestaurants" :key="restaurant.id" class="col">
              <a :href="`restaurant/shop/${restaurant.id}`" class="card h-100 shadow bg-body roundedTop roundedBottom">
                  <div class="card-img-top position-relative roundedTop">
                    <img src="https://source.unsplash.com/random" class="roundedTop" alt="restaurant.brand_name">
                    <h4 class="card-title position-absolute">{{restaurant.brand_name}}</h4>
                  </div>
                <div class="card-body">
                  <p class="card-text">{{restaurant.description}}</p>
                  <span>{{restaurant.rating}} <i class="fas fa-star"></i> ({{restaurant.num_rating}}) </span>
                  <span>{{restaurant.city}}</span>
                </div>
              </a>
            </div>
        </div> -->
        <card-component :filteredRestaurants="topRestaurants"></card-component>
    <!-- </div> -->
</template>

<script>
import CardComponent from './CardComponent.vue'
export default {
  components: { CardComponent },
    data() {
        return {
            filteredRestaurant: [],
        }
    },
    props: {
        topRestaurants: Array,
    },
    methods: {
    },
}
</script>