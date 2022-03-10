
<template>
    <!-- resources/assets/js/components -->
    <div>
        <canvas id="canvas2"></canvas>
    </div>
</template>

<script>
    import {Chart} from 'Chart.js';
    export default {
        props: {
            labels: String,
            dataProp: String,
            colors: String,
        },
        methods: {
            renderChart() {
                new Chart(document.getElementById('canvas2').getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: JSON.parse(this.labels),
                        datasets: [{
                            label: '# of Laravel apps made by Jack Russels',
                            data: JSON.parse(this.dataProp),
                            backgroundColor: JSON.parse(this.colors)
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            fontSize: 22,
                            text: 'Example'
                        }
                    }
                });
            }
        },
        mounted() {
            console.log(JSON.parse(this.labels));
            console.log('data',JSON.parse(this.dataProp));
            this.renderChart();
        }
    }
</script>