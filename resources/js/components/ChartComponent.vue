<template>
    <!-- resources/assets/js/components -->
    <div>
        <div id="chart-cont">
            <canvas id="canvas"></canvas>
        </div>
    </div>
</template>

<script>
    import Chart from 'chart.js/auto';

    export default {
        data(){
            return{

                labels: null,
                dataProp: null,
                colors: null,
            }
        },
        methods: {
            async getDataChart(){
                let res = await axios.get('/charts')
                .catch(error => console.error(error));
                this.labels = res.data.labels;
                this.dataProp = res.data.dataset;
                this.colors = res.data.colours;
                this.renderChart();
            },
            renderChart() {
                new Chart(document.getElementById('canvas').getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            label: "I 10 piatti piu' venduti",
                            data: this.dataProp,
                            backgroundColor: this.colors
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            fontSize: 22,
                            text: "I 10 piatti piu' venduti"
                        }
                    }
                });
            }
        },
        mounted() {
            this.getDataChart();
        }
    }
</script>
