<template>
    <user-layout>
        <div class="mx-10 p-4 my-4 relative">
            <img
                alt="signalement"
                src="https://business-angels.info/images/badge/membre-actif-bg.jpg"
                class="rounded-3xl border-8 border-secondcolor object-fill h-52 w-screen"
            />
        </div>
        <div class="py-4 px-20 mx-10 relative">
            <div class="upercase font-black text-4xl text-center">SIGNALER</div>
            <div class="w-16 h-2 bg-red-500 rounded-full mx-auto"></div>
            <div class="text-center text-green-500 mt-4">
                Signaler les dépassements que vous rencontrez et Collaborer en
                donnant des solutions
            </div>

            <div ref="top" class="flex mx-32 my-6">
                <div className="flex">
                    <div
                        class="border-4 rounded-full h-20 w-20 border-secondcolor flex justify-center items-center cursor-pointer"
                    >
                        <div
                            class="rounded-full h-16 w-16 p-2 font-bold text-2xl flex justify-center items-center bg-lighter-primcolor"
                        >
                            <h1>1</h1>
                        </div>
                    </div>
                    <h3 className="p-6 font-bold capitalize">
                        Informations personnelles
                    </h3>
                </div>
            </div>
        </div>
        <Form1Signalement />
    </user-layout>
</template>

<script>
import Form1Signalement from "../../Components/CitizenComponents/Forms/Form1Signalement.vue";
/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";
/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
/* import specific icons */
import { faExclamationCircle } from "@fortawesome/free-solid-svg-icons";
import UserLayout from "../../Layouts/userLayout.vue";
import auth from "../../services/auth";
/* add icons to the library */
library.add(faExclamationCircle);
export default {
    components: {
        Form1Signalement,
        FontAwesomeIcon,
        UserLayout,
    },

};
</script>
