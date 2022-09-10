<template>
    <div
        class="px-10 py-8 rounded-r-lg min-h-screen w-max bg-secondcolor text-white mb-8 shadow-md"
    >
        <ul class="flex gap-4 flex-col">
            <li>
                <router-link to="/dashboard/citoyen" class="capitalize text-lg">
                    <FontAwesomeIcon
                        icon="fa-solid fa-gauge-high"
                        class="pr-2 text-2xl"
                /></router-link>
            </li>
            <li>
                <router-link
                    to="/dashboard/signalements"
                    class="capitalize text-lg"
                >
                    <FontAwesomeIcon
                        icon="fa-solid fa-pen-to-square"
                        class="pr-2 text-2xl"
                /></router-link>
            </li>
            <li>
                <router-link
                    to="/dashboard/adhesion"
                    class="capitalize text-lg"
                >
                    <FontAwesomeIcon
                        icon="fa-solid fa-user-plus"
                        class="pr-2 text-2xl"
                /></router-link>
            </li>
            <li>
                <router-link
                    to="/dashboard/partenaire"
                    class="capitalize text-lg"
                >
                    <FontAwesomeIcon
                        icon="fa-solid fa-user-shield"
                        class="pr-2 text-2xl"
                /></router-link>
            </li>
            <li>
                <router-link
                    to="/dashboard/sondages"
                    class="capitalize text-lg"
                >
                    <FontAwesomeIcon
                        icon="fa-solid fa-file-lines"
                        class="pr-2 text-2xl"
                /></router-link>
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
import {
    faGaugeHigh,
    faPenToSquare,
    faUserPlus,
    faUserShield,
    faFileLines,
} from "@fortawesome/free-solid-svg-icons";

/* add icons to the library */
library.add(faGaugeHigh, faPenToSquare, faUserPlus, faUserShield, faFileLines);

/* add font awesome icon component */

export default {
    components: {
        FontAwesomeIcon,
    },
};
</script>
