<template>
    <div class="mx-10 p-4 my-4 relative">
        <img
            alt="signalement"
            src="https://business-angels.info/images/badge/membre-actif-bg.jpg"
            class="rounded-3xl border-8 border-secondcolor object-fill h-52 w-screen"
        />
    </div>
    <div class="py-4 px-20 mx-10 relative">
        <div class="upercase font-black text-4xl text-center">ADHERER</div>
        <div class="w-16 h-2 bg-red-500 rounded-full mx-auto"></div>
        <div class="text-center text-green-500 mt-4">
            Rejoignez nous, Devenez Un Membre de l’Academie
        </div>
        <div
            class="absolute top-4 right-10 w-12 h-12 bg-red-600 opacity-80"
        ></div>
        <div
            class="absolute top-10 right-4 w-12 h-12 bg-green-700 opacity-60"
        ></div>

        <div ref="top" class="flex mx-32 my-6">
            <div>
                <div
                    :class="step == 0 ? ' h-24 w-24 ' : ' h-20 w-20'"
                    class="border-4 border-secondcolor rounded-full flex justify-center items-center"
                    @click="changeStep(0)"
                >
                    <div
                        :class="
                            step == 0
                                ? '  h-20 w-20 font-extrabold text-3xl'
                                : step > 0
                                ? 'h-20 w-20 font-bold text-2xl'
                                : 'h-16 w-16 font-bold text-2xl  '
                        "
                        class="p-2 rounded-full flex justify-center items-center cursor-pointer bg-lighter-primcolor"
                    >
                        <h1>1</h1>
                    </div>
                </div>
                <h3 :class="step == 0 ? ' font-extrabold w-3' : 'w-3'">
                    Informations civiles
                </h3>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
            <div>
                <div
                    @click="changeStep(1)"
                    :class="step == 1 ? 'h-24 w-24 ' : 'h-20 w-20 '"
                    class="cursor-pointer border-4 border-secondcolor rounded-full flex justify-center items-center"
                >
                    <div
                        :class="
                            step == 1
                                ? 'h-20 w-20  font-extrabold text-3xl'
                                : step > 1
                                ? ' h-20 w-20  font-bold text-2xl '
                                : ' h-16 w-16  font-bold text-2xl  '
                        "
                        class="rounded-full justify-center flex items-center p-2 bg-lighter-primcolor"
                    >
                        <h1>2</h1>
                    </div>
                </div>
                <h3 :class="step == 1 ? ' font-extrabold w-3' : 'w-3'">
                    Informations professionnelles
                </h3>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
            <div>
                <div
                    :class="step == 2 ? '  h-24 w-24  ' : 'h-20 w-20 '"
                    class="border-4 flex justify-center items-center border-secondcolor rounded-full cursor-pointer"
                    @click="changeStep(2)"
                >
                    <div
                        :class="
                            step == 2
                                ? 'h-20 w-20  p-2 font-extrabold text-3xl'
                                : step > 2
                                ? ' h-20 w-20  p-2 font-bold text-2xl '
                                : 'h-16 w-16  p-2 font-bold text-2xl'
                        "
                        class="rounded-full bg-lighter-primcolor flex justify-center items-center"
                    >
                        <h1>3</h1>
                    </div>
                </div>
                <h3 :class="step == 2 ? ' font-extrabold w-3' : 'w-3'">
                    Coordonnées
                </h3>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
        </div>
    </div>
    <component v-bind:is="steps[step]" @next="nextStep" @scroll="scrollTop">
    </component>
</template>

<script>
import Form1Adhesion from "../../Components/CitizenComponents/Forms/Form1Adhesion.vue";
import Form2Adhesion from "../../Components/CitizenComponents/Forms/Form1Adhesion.vue";
import Form3Adhesion from "../../Components/CitizenComponents/Forms/Form2Adhesion.vue";
import { ref } from "vue";

export default {
    name: "Adherer",
    components: {},
    setup() {
        const step = ref(0);
        const steps = [Form3Adhesion, Form1Adhesion, Form3Adhesion];

        return {
            step,
            steps,
        };
    },

    methods: {
        scrollTop() {
            this.$refs["top"].scrollIntoView({ behavior: "smooth" });
        },
        nextStep() {
            this.step++;
        },
        changeStep(s) {
            if (this.step > s) {
                this.step = s;
            }
        },
    },
};
</script>
