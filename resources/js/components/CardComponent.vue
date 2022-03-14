<template>
  <div class="row row-cols-3 justify-content-center">
        <div
          class="col card-wrapper"
          @click.prevent="getRestaurantViewById(restaurant.id)"
          v-for="restaurant in filteredRestaurants"
          :key="restaurant.id"
        >
          <div class="card">
            <h2 class="brandname">{{ restaurant.brand_name }}</h2>
            <div class="card-image">
              <img :src="`../storage/${restaurant.image}`" alt="" />
            </div>

            <div class="container-description">
              <p class="description">{{ restaurant.description }}</p>
            </div>

            <div class="details">
              <h6>
                {{ restaurant.city }} - 
                <!-- stampo categorie -->
                <span v-for="categories in restaurant.categories" :key="categories.id">
                  {{categories.name}}
                </span>
                
                <br />
                 {{ restaurant.address }}
                 <br />
                <span class="more-details"
                  >{{ restaurant.rating }} <i class="fas fa-star"></i> ({{
                    restaurant.num_rating
                  }})</span
                >
              </h6>
            </div>
          </div>
        </div>
        <!-- end box wrapper -->
  </div>
</template>

<script>
export default {
  data() {
    return {
    };
  },
  props: {
    filteredRestaurants: Array,
  },
  methods: {
    // show della pagina del ristornate selezionato
    getRestaurantViewById(id) {
      window.location.href = `/restaurant/shop/${id}`;
    },
  },
};
</script>