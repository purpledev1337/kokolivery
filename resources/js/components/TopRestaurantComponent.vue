<template>
    <div id="top-restaurant" class="container-fluid content my-5">
        <h4 class="h4 m-2">I nostri migliori Ristornati</h4>
        <div class="row flex-nowrap overflow-auto row-cols-2 row-cols-lg-4 position-relative">
            <div v-for="restaurant in topRestaurants" :key="restaurant.id" class="col">
              <div class="card h-100 shadow bg-body roundedTop roundedBottom">
                  <div class="card-img-top position-relative roundedTop">
                    <img src="https://source.unsplash.com/random" class="roundedTop" alt="restaurant.brand_name">
                    <h4 class="card-title position-absolute">{{restaurant.brand_name}}</h4>
                  </div>
                <div class="card-body">
                  <p class="card-text">{{restaurant.description}}</p>
                  <span>{{restaurant.rating}} <i class="fas fa-star"></i> ({{restaurant.num_rating}}) </span>
                  <span>{{restaurant.city}}</span>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            filteredRestaurant: [],
        }
    },
    props: {
        topRestaurants: Object,
    },
    methods: {
    },
}
</script>