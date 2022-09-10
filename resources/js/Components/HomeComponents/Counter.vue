<template>
    <section class="counters bg-primcolor relative bg-opacity-90">
        <div class="container py-10">
            <div>
                <i class=""></i>
                <div class="counter" data-target="60000">
                    <VueJsCounter
                        start="0"
                        end="5000"
                        duration="5000"
                    ></VueJsCounter>
                </div>
                <h3>Utilisateurs</h3>
            </div>
            <div>
                <div class="counter" data-target="15000">
                    <VueJsCounter
                        start="0"
                        end="2000"
                        duration="5000"
                    ></VueJsCounter>
                </div>
                <h3>Signalements</h3>
            </div>
            <div>
                <div class="counter" data-target="9000">
                    <VueJsCounter
                        start="0"
                        end="550"
                        duration="5000"
                    ></VueJsCounter>
                </div>
                <h3>Contributions</h3>
            </div>
            <div>
                <div class="counter" data-target="5000">
                    <VueJsCounter
                        start="0"
                        end="1000"
                        duration="5000"
                    ></VueJsCounter>
                </div>

                <h3>Adhérants</h3>
            </div>
        </div>
        <div
            class="absolute border-4 border-primcolor w-full h-full md:-top-3 -top-2 left-2 md:left-3"
        ></div>
    </section>
</template>
<script>
import VueJsCounter from "vue-js-counter";
export default {
    components: {
        VueJsCounter,
    },
};
</script>

<style scoped>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 100vh;
}

.container {
    max-width: 1100px;
    overflow: auto;
}

header {
    flex: 1;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

header h1 {
    font-size: 60px;
}

.counters {
    color: #fff;
    padding: 40px;
    box-shadow: 0 25px 20px -12px rgb(0 0 0 / 0.25);
}

.counters .container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 30px;
    text-align: center;
}

.counters i {
    color: lightskyblue;
    margin-bottom: 5px;
}

.counters .counter {
    font-size: 45px;
    margin: 5px 0;
    font-weight: 800;
}

@media (max-width: 700px) {
    .counters .container {
        grid-template-columns: repeat(2, 1fr);
    }

    .counters .container > div:nth-of-type(1),
    .counters .container > div:nth-of-type(2) {
        border-bottom: 1px lightskyblue solid;
        padding-bottom: 20px;
    }
    .counters .counter {
        font-size: 30px;
    }
}
</style>
