<template>
    <div
        class="flex pt-10 bg-primcolor bg-opacity-5 border-l-4 border-primcolor my-5"
    >
        <div class="text-2xl w-1/3 px-5 font-semibold">
            Statistiques générales
        </div>
        <div class="w-2/3">
            <div class="flex gap-4">
                <div
                    class="stats-cards w-1/4 flex justify-between bg-yellowColor bg-opacity-80 text-white"
                >
                    <div>
                        <div class="uppercase font-semibold text-md">
                            Signalement
                        </div>
                        <div class="text-white text-3xl font-extrabold mt-2">
                            {{ userData.signalements.length }}
                        </div>
                    </div>
                    <FontAwesomeIcon
                        icon="fa-solid fa-flag "
                        class="text-white text-4xl mt-4"
                    />
                </div>
                <div
                    class="stats-cards w-1/4 flex justify-between bg-primcolor bg-opacity-90 text-white"
                >
                    <div>
                        <div class="uppercase font-semibold text-md">
                            contribution
                        </div>
                        <div class="text-white text-3xl font-extrabold mt-2">
                            {{ userData.contributions.length }}
                        </div>
                    </div>
                    <FontAwesomeIcon
                        icon="fa-solid fa-handshake-angle "
                        class="text-white text-4xl mt-4"
                    />
                </div>
                <div
                    class="stats-cards w-1/4 flex justify-between bg-red-400 bg-opacity-90 text-white"
                >
                    <div>
                        <div class="uppercase font-semibold text-md">
                            Adhesion
                        </div>
                        <div class="text-white text-3xl font-extrabold mt-2">
                            2
                        </div>
                    </div>
                    <FontAwesomeIcon
                        icon="fa-solid fa-flag "
                        class="text-white text-4xl mt-4"
                    />
                </div>
            </div>
            <div class="flex mx-auto gap-8">
                <div class="w-1/3 text-xl font-semibold py-20">
                    Mes Activités
                </div>
                <DonutChart
                    :signalements="userData.signalements.length"
                    :contributions="userData.contributions.length"
                    :Adhesions="2"
                    v-if="userData.name"
                />
            </div>
        </div>
    </div>
</template>

<script>
import DonutChart from "../../Components/userStats/DonutChart.vue";
import { library } from "@fortawesome/fontawesome-svg-core";
/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
/* import specific icons */
import {
    faFlag,
    faHandshakeAngle,
    faUser,
} from "@fortawesome/free-solid-svg-icons";
/* add icons to the library */
library.add(faUser, faFlag, faHandshakeAngle);
export default {
    data: function () {
        return {
            userData: { signalements: [], contributions: [] },
        };
    },
    components: {
        DonutChart,
        FontAwesomeIcon,
    },
    props: ["userId"],
    mounted() {
        axios.get(`/api/user/stats/${this.userId}`).then((response) => {
            this.userData = response.data;
            console.log(response.data);
        });
    },
};
</script>

<style></style>
