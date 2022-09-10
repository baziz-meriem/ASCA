<template>
    <div class="px-36 py-10">
        <div class="flex gap-4">
            <div class="flex stats-cards w-1/4">
                <div
                    class="cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 mt-1 flex justify-center items-center"
                >
                    <FontAwesomeIcon
                        icon="fa-solid fa-user "
                        class="text-white text-xl w-5"
                    />
                </div>
                <div>
                    <p class="text-sm font-semibold">{{ userData.name }}</p>
                    <p class="text-xs">{{ userData.email }}</p>
                </div>
            </div>
            <div
                class="stats-cards w-1/4 flex justify-between bg-yellowColor bg-opacity-80 text-white"
            >
                <div>
                    <div class="uppercase font-semibold text-xl">
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
                    <div class="uppercase font-semibold text-xl">
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
                    <div class="uppercase font-semibold text-xl">Adhesion</div>
                    <div class="text-white text-3xl font-extrabold mt-2">2</div>
                </div>
                <FontAwesomeIcon
                    icon="fa-solid fa-flag "
                    class="text-white text-4xl mt-4"
                />
            </div>
        </div>
        <div class="flex gap-4 my-4">
            <div class="w-1/2 stats-cards">
                <div class="flex mb-4">
                    <div class="text-sm mx-2 font-semibold w-1/2">
                        Nom et Prénom:
                    </div>
                    <div class="text-sm mx-2">{{ userData.name }}</div>
                </div>
                <div class="flex mb-4">
                    <div class="text-sm mx-2 font-semibold w-1/2">Email:</div>
                    <div class="text-sm mx-2">{{ userData.email }}</div>
                </div>
                <div class="flex mb-4">
                    <div class="text-sm mx-2 font-semibold w-1/2">
                        Numéro de téléphone:
                    </div>
                    <div class="text-sm mx-2">{{ userData.phoneNumber }}</div>
                </div>
                <div class="flex mb-4">
                    <div class="text-sm mx-2 font-semibold w-1/2">Adress:</div>
                    <div class="text-sm mx-2">{{ userData.address }}</div>
                </div>
                <div class="flex mb-4">
                    <div class="text-sm mx-2 font-semibold w-1/2">
                        Data de naissance:
                    </div>
                    <div class="text-sm mx-2">
                        {{ userData.date_de_naissance }}
                    </div>
                </div>
            </div>
            <div class="w-1/2">
                <div class="bg-gray-100 stats-cards w-full">
                    <div class="w-1/2 text-xl font-bold">
                        Les Activité du Citoyen
                    </div>
                    <div class="w-1/2 mx-auto -my-8">
                        <DonutChart
                            :signalements="userData.signalements.length"
                            :contributions="userData.contributions.length"
                            :Adhesions="2"
                            v-if="userData.name"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="w-56 stats-cards bg-gray-700 text-white">
                <div>MENU</div>
                <hr />
                <button
                    class="block my-10 hover:underline"
                    @click="() => setActiveTable('Signalements')"
                >
                    Signalements
                </button>
                <button
                    class="block my-10 hover:underline"
                    @click="() => setActiveTable('Contributions')"
                >
                    Contributions
                </button>
                <button
                    class="block my-10 hover:underline"
                    @click="() => setActiveTable('Adhesions')"
                >
                    Adhesion
                </button>
            </div>
            <SignalementTable v-if="activeTable === 'Signalements'" />
            <ContributionTable v-if="activeTable === 'Contributions'" />
            <SignalementTable v-if="activeTable === 'Adhesions'" />
        </div>
    </div>
</template>

<script>
import DonutChart from "../Components/userStats/DonutChart.vue";
import Partenaire from "../Components/Dashboard/Partenaire.vue";
import SignalementTable from "../Components/userStats/SignalementTable.vue";
import ContributionTable from "../Components/userStats/ContributionTable.vue";
/* import the fontawesome core */
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
    components: {
        Partenaire,
        FontAwesomeIcon,
        DonutChart,
        SignalementTable,
        ContributionTable,
    },
    data: function () {
        return {
            userData: { signalements: [], contributions: [] },
            activeTable: "Signalements",
        };
    },
    methods: {
        setActiveTable(value) {
            this.activeTable = value;
        },
    },
    mounted() {
        axios
            .get(`/api/user/stats/${this.$route.params.id}`)
            .then((response) => {
                this.userData = response.data;
                console.log(response.data);
            });
    },
};
</script>

<style></style>