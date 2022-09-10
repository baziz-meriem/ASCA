<template>
    <div class="p-4 flex-auto px-9 py-12">
        <h1
            class="text-secondcolor text-2xl font-bold border-solid border-4 border-secondcolor border-t-0 border-b-0 border-l-0 w-max px-4 py-2"
        >
            Contributions
        </h1>

        <ul class="flex w-full justify-center gap-4 items-center mt-8">
            <li
                class="rounded-3xl bg-secondcolor px-7 py-2 w-max text-white cursor-pointer"
                @click="init"
            >
                Tous
            </li>
            <li>
                <button
                    @click="dateSelect = !dateSelect"
                    class="rounded-3xl bg-secondcolor px-7 py-2 w-max text-white cursor-pointer"
                >
                    Date
                </button>
            </li>
            <li class="w-max text-white">
                <select
                    name="catégorie"
                    class="rounded-3xl bg-secondcolor w-40 outline-none border-none bg-transparent focus:outline-none cursor-pointer"
                    @change="changeCategorie($event)"
                >
                    <option value="" class="bg-secondcolor" selected>
                        Catégorie
                    </option>
                    <option value="environement1" class="bg-secondcolor">
                        Environement1
                    </option>
                    <option value="environement2" class="bg-secondcolor">
                        Environement2
                    </option>
                    <option value="environement3" class="bg-secondcolor">
                        Environement3
                    </option>
                    <option value="environement4" class="bg-secondcolor">
                        Environement4
                    </option>
                </select>
            </li>
            <li class="w-max text-white">
                <select
                    name="statut"
                    class="rounded-3xl bg-secondcolor w-36 outline-none border-none bg-transparent focus:outline-none cursor-pointer"
                    @change="changeStatut($event)"
                >
                    <option value="" class="bg-secondcolor" selected>
                        Statut
                    </option>
                    <option value="traité" class="bg-secondcolor">
                        Traité
                    </option>
                    <option value="attente" class="bg-secondcolor">
                        en attente
                    </option>
                    <option value="archivé" class="bg-secondcolor">
                        Archivé
                    </option>
                </select>
            </li>
        </ul>

        <div
            v-if="dateSelect == true"
            class="relative my-3 grid place-items-center"
        >
            <div class="w-1/3">
                <Datepicker
                    name="date-picker"
                    v-model="searchDate"
                    modelType="dd/MM/yyyy"
                    :format="format"
                    locale="fr"
                    :clearable="true"
                    placeholder="Sélectionner une date"
                    autoApply
                    :closeOnAutoApply="false"
                    weekStart="1"
                    :yearRange="[
                        new Date().getFullYear() - 100,
                        new Date().getFullYear(),
                    ]"
                    inputClassName="form-input"
                    menuClassName="dp-custom-menu"
                    calendarClassName="dp-custom-calendar"
                    calendarCellClassName="dp-custom-cell"
                    :enableTimePicker="false"
                ></Datepicker>
            </div>
        </div>

        <div
            class="w-full bg-primcolor flex justify-around py-3 mt-8 text-white"
        >
            <h1 class="text-center text-base fuppercase tracking-wider">
                Date
            </h1>
            <h1 class="text-center w-2/12 text-base uppercase tracking-wider">
                Compte
            </h1>
            <h1 class="text-center text-base w-1/12 fuppercase tracking-wider">
                Catégorie
            </h1>
            <h1 class="text-center text-base uppercase tracking-wider">
                Statuts
            </h1>
            <h1></h1>
        </div>
        <div class="h-72 mb-32">
            <div
                class="w-full flex flex-col"
                v-for="(item, index) in signalements"
                v-bind:key="item.nom"
            >
                <div
                    class="bg-greyColor my-3 w-full flex justify-around items-center py-2"
                    v-if="
                        (categorie == '' || item.categorie == categorie) &&
                        (statut == '' || item.statut == statut) &&
                        Math.floor(index / 5) == page
                    "
                >
                    <h2 class="capitalize text-sm w-2/12">
                        {{ item.date_creation }}
                    </h2>
                    <div class="flex gap-4 w-3/12">
                        <div
                            class="cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 flex justify-center items-center"
                        >
                            <FontAwesomeIcon
                                icon="fa-solid fa-user "
                                class="text-white text-2xl h-4 w-4"
                            />
                        </div>
                        <div class="flex flex-col">
                            <h1 class="capitalize text-sm">
                                {{ item.user.name }}
                            </h1>
                            <h2 class="text-xs opacity-70">
                                {{ item.user.email }}
                            </h2>
                        </div>
                    </div>
                    <h2 class="capitalize text-sm w-2/12 text-center">
                        {{ item.nature }}
                    </h2>
                    <h2 class="capitalize text-sm w-2/12 text-center">
                        {{ item.statut }}
                    </h2>
                    <div class="flex gap-2">
                        <div
                            class="cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                        >
                            <FontAwesomeIcon
                                icon="fa-solid fa-bookmark "
                                class="text-white text-2xl h-4 w-4"
                            />
                        </div>

                        <router-link
                            :to="'/dashboard/SignalementPreview/' + item.id"
                            ><div
                                class="cursor-pointer rounded-full w-8 h-8 bg-secondcolor p-3 mr-2 flex justify-center items-center"
                            >
                                <FontAwesomeIcon
                                    icon="fa-solid fa-arrow-right "
                                    class="text-white text-2xl w-5"
                                /></div
                        ></router-link>
                    </div>
                </div>
            </div>
        </div>
        <ul class="flex w-full justify-center items-center gap-4 py-6 mt-4">
            <div
                class="flex gap-1 cursor-pointer"
                @click="page = mod(page - 1)"
            >
                <FontAwesomeIcon
                    icon="fa-solid fa-angle-left"
                    class="pr-2 text-2xl"
                />
                Prev
            </div>
            <li
                v-for="index in Math.ceil(signalements.length / 5)"
                :key="index"
                class="cursor-pointer px-4 py-2"
                :class="
                    index === page + 1
                        ? 'text-white bg-primcolor'
                        : 'text-black'
                "
                @click="page = index - 1"
            >
                {{ index }}
            </li>
            <div
                class="flex gap-1 cursor-pointer"
                @click="page = mod(page + 1)"
            >
                Next
                <FontAwesomeIcon
                    icon="fa-solid fa-angle-right"
                    class="pl-2 text-2xl"
                />
            </div>
        </ul>
    </div>
</template>
<script>
/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";
/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
/* import specific icons */
import {
    faBookmark,
    faArrowRight,
    faAngleLeft,
    faAngleRight,
    faUser,
} from "@fortawesome/free-solid-svg-icons";
/* add icons to the library */
library.add(faBookmark, faArrowRight, faAngleLeft, faAngleRight, faUser);

import { ref } from "vue";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

export default {
    mounted() {
        axios
            .get(`/api/contribution/user/${this.$route.params.id}`)
            .then((response) => {
                this.setData(response.data);
            });
    },
    components: {
        FontAwesomeIcon,
        Datepicker,
    },

    setup: function () {
        const date = ref(new Date());

        const format = (date) => {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();

            return `${day}/${month}/${year}`;
        };

        return { date, format };
    },

    data: function () {
        return {
            page: 0,
            categorie: "",
            statut: "",
            searchDate: "",
            dateSelect: false,
            signalements: [],
        };
    },

    computed: {
        filteredItems() {
            return this.signalements
                .filter((signalement) => {
                    return signalement.date.includes(
                        this.searchDate.toString()
                    );
                })
                .filter((signalement) => {
                    return signalement.categorie.includes(this.categorie);
                })
                .filter((signalement) => {
                    return signalement.statut.includes(this.statut);
                });
        },
    },

    methods: {
        changeStatut(event) {
            this.statut = event.target.value;
        },
        changeCategorie(event) {
            this.categorie = event.target.value;
        },
        init() {
            this.categorie = "";
            this.statut = "";
            this.searchDate = "";
        },
        setData(data) {
            this.signalements = data;
        },
        mod(p) {
            return (
                ((p % Math.ceil(this.signalements.length / 5)) +
                    Math.ceil(this.signalements.length / 5)) %
                Math.ceil(this.signalements.length / 5)
            );
        },
    },
};
</script>
