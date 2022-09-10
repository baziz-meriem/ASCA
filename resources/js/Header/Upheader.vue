<template>
    <div
        class="flex justify-between w-full h-8 bg-gray-800 px-4 py-2 text-white text-sm"
    >
        <div><FontAwesomeIcon icon="fa-solid fa-map" /> Map</div>
        <div class="flex gap-2">
            <FontAwesomeIcon icon="fa-brands fa-facebook-square" />
            <FontAwesomeIcon icon="fa-brands fa-facebook-messenger" />
            <FontAwesomeIcon icon="fa-brands fa-whatsapp" />
            <FontAwesomeIcon icon="fa-solid fa-envelope" />
        </div>

        <div class="flex gap-2">
            Langue<FontAwesomeIcon icon="fa-solid fa-globe" />
        </div>
    </div>
</template>
<script>
/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import { faGlobe, faEnvelope, faMap } from "@fortawesome/free-solid-svg-icons";
import {
    faFacebookSquare,
    faFacebookMessenger,
    faWhatsapp,
} from "@fortawesome/free-brands-svg-icons";

/* add icons to the library */
library.add(
    faGlobe,
    faEnvelope,
    faFacebookSquare,
    faFacebookMessenger,
    faWhatsapp,
    faMap
);

/* add font awesome icon component */

export default {
    components: {
        FontAwesomeIcon,
    },
};
</script>
