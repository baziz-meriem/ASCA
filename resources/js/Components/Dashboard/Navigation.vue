<template>
    <div class=" px-10 py-8 rounded-r-3xl min-h-screen w-max bg-secondcolor text-white">
        <img src="/assets/images/ASCA.png" alt="logo">
        <h1 class="py-10 text-xl">Bonjour Morad</h1>
        <ul class=" flex gap-10 flex-col">
            <li>
                <router-link to="/dashboard/citoyen" class=" capitalize text-lg"> <FontAwesomeIcon icon="fa-solid fa-gauge-high" class="pr-2 text-2xl" /> Tableau de bord</router-link>
            </li>
            <li>
                <router-link to="/dashboard/signalements" class=" capitalize text-lg"> <FontAwesomeIcon icon="fa-solid fa-pen-to-square" class="pr-2 text-2xl" />Signalement</router-link>
            </li>
            <li>
                <router-link to="/dashboard/contributions" class=" capitalize text-lg"> <FontAwesomeIcon icon="fa-solid fa-pen-to-square" class="pr-2 text-2xl" /> Contributions</router-link>
            </li>
            <li>
                <router-link to="/dashboard/adhesions" class=" capitalize text-lg"> <FontAwesomeIcon icon="fa-solid fa-user-plus" class="pr-2 text-2xl" />Adhesions</router-link>
            </li>
            <li>
                <router-link to="/dashboard/partenaire" class=" capitalize text-lg"> <FontAwesomeIcon icon="fa-solid fa-user-shield" class="pr-2 text-2xl" /> Partenaires</router-link>
            </li>
            <li>
                <router-link to="/dashboard/sondages" class=" capitalize text-lg"> <FontAwesomeIcon icon="fa-solid fa-file-lines" class="pr-2 text-2xl" />Sondages</router-link>
            </li>
        </ul>
    </div>
</template>
<script>
/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import { faGaugeHigh, faPenToSquare, faUserPlus, faUserShield, faFileLines } from "@fortawesome/free-solid-svg-icons";


/* add icons to the library */
library.add(
    faGaugeHigh,
    faPenToSquare,
    faUserPlus,
    faUserShield,
    faFileLines
);

/* add font awesome icon component */

export default {
    components: {
        FontAwesomeIcon,
    },
};
</script>