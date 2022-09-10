<template>
    <div>
        <canvas id="myChart" height="400" width="400"></canvas>
    </div>
</template>

<script>
import Chart from "chart.js/auto";
export default {
    props: ["signalements", "contributions", "Adhesions"],
    mounted() {
        const ctx = document.getElementById("myChart").getContext("2d");
        const myChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Signalements", "contributions", "Adhesions"],
                datasets: [
                    {
                        label: "My First Dataset",
                        data: [
                            this.signalements,
                            this.contributions,
                            this.Adhesions,
                        ],
                        backgroundColor: [
                            "rgb(255, 205, 86)",
                            "#529B9B",

                            "rgb(255, 99, 132)",
                        ],
                        hoverOffset: 10,
                    },
                ],
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: "right",
                        labels: {
                            color: "red",
                        },
                    },
                },
            },
        });
        myChart;
    },
};
</script>

<style></style>
