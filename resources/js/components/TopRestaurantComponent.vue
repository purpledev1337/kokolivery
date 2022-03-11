<template>
  <card-component :filteredRestaurants="topRestaurants"></card-component>
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