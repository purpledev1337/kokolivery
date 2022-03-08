<template>
    <div class="container">
        <!-- <input v-model="field" type="hidden"> -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                field: ''
            }
        },
        mounted() {
            this.field = localStorage.cart;
        },
        watch: {
            field: function (val) {
                this.$root.payment = val;
            }
        }
    }
</script>