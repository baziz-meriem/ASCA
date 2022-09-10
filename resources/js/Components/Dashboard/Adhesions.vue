<template>
    <div class="flex-auto px-9 py-12">
        <h1
            class="text-secondcolor text-2xl font-bold border-solid border-4 border-secondcolor border-t-0 border-b-0 border-l-0 w-max px-4 py-2"
        >
            Adhésion
        </h1>
        <ul class="flex w-full justify-center gap-4 items-center mt-8">
            <li
                class="rounded-3xl bg-secondcolor px-7 py-2 w-max text-white cursor-pointer"
                @click="init"
            >
                Tous
            </li>
            <li
                class="rounded-3xl bg-secondcolor px-7 py-2 w-max text-white cursor-pointer"
            >
                Date
            </li>
            <li class="w-max text-white">
                <select
                    name="filiale"
                    class="rounded-3xl bg-secondcolor w-36 outline-none border-none bg-transparent focus:outline-none cursor-pointer"
                    @change="changeStatut($event)"
                >
                    <option value="" class="bg-secondcolor" selected hidden>
                        Filiale
                    </option>
                    <option value="traité" class="bg-secondcolor">
                        Traité
                    </option>
                    <option value="attente" class="bg-secondcolor">
                        En attente
                    </option>
                    <option value="archivé" class="bg-secondcolor">
                        Archivé
                    </option>
                </select>
            </li>
        </ul>
        <div
            class="w-full bg-primcolor flex justify-around px-5 py-3 mt-8 text-white"
        >
            <h1 class="text-xl">Date</h1>
            <h1 class="text-xl">Compte</h1>
            <h1 class="text-xl">Filiale</h1>
            <h1></h1>
        </div>
        <div class="h-72 mb-32">
            <div
                class="w-full flex flex-col"
                v-for="(item, index) in adhesions"
                v-bind:key="item.nom"
            >
                <div
                    class="bg-greyColor my-3 w-full flex justify-around items-center py-2"
                    v-if="Math.floor(index / 5) == page"
                >
                    <h2 class="capitalize text-sm">{{ item.date }}</h2>
                    <div class="flex gap-4">
                        <img
                            src="/assets/images/user.jpg"
                            class="h-11 w-11 rounded-full object-cover"
                            alt="user photo"
                        />
                        <div class="flex flex-col">
                            <h1 class="capitalize text-lg">{{ item.nom }}</h1>
                            <h2 class="text-sm opacity-70">{{ item.email }}</h2>
                        </div>
                    </div>
                    <h2>{{ item.filiale }}</h2>
                    <div class="flex gap-2">
                        <router-link to="/dashboard/ContributionSelect"
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
                v-for="index in Math.ceil(adhesions.length / 5)"
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
    faArrowRight,
    faAngleLeft,
    faAngleRight,
} from "@fortawesome/free-solid-svg-icons";

/* add icons to the library */
library.add(faArrowRight, faAngleLeft, faAngleRight);

/* add font awesome icon component */

export default {
    components: {
        FontAwesomeIcon,
    },
    data: function () {
        return {
            page: 0,
            adhesions: [
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "1/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "2/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "3/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "4/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "5/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "6/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "7/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "8/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "9/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "10/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "11/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "12/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "13/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "14/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "15/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "16/05/2022",
                },
                {
                    nom: "morad",
                    email: "morad1@gmail.com",
                    photo: "",
                    filiale: "chef",
                    date: "17/05/2022",
                },
            ],
        };
    },
    methods: {
        mod(p) {
            return (
                ((p % Math.ceil(this.adhesions.length / 5)) +
                    Math.ceil(this.adhesions.length / 5)) %
                Math.ceil(this.adhesions.length / 5)
            );
        },
    },
};
</script>
