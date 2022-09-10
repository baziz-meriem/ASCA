<template>
    <div class="mx-10 p-4 my-4 relative">
        <img
            alt="signalement"
            src="https://business-angels.info/images/badge/membre-actif-bg.jpg"
            class="rounded-3xl border-8 border-secondcolor object-fill h-52 w-screen"
        />
    </div>
    <div class="py-4 px-20 mx-10 relative">
        <div class="upercase font-black text-4xl text-center">Contribuer</div>
        <div class="w-16 h-2 bg-red-500 rounded-full mx-auto"></div>
        <div class="text-center text-green-500 mt-4">
            Contribuer à votre communauté en proposant des solutions pour les
            dépassements que vous rencontrés
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
                    @click="changeStep(0)"
                    :class="
                        step == 0
                            ? ' h-24 w-24'
                            : step > 0
                            ? ' rounded-full h-20 w-20  '
                            : 'h-20 w-20'
                    "
                    class="border-4 border-secondcolor rounded-full flex justify-center items-center cursor-pointer"
                >
                    <div
                        :class="
                            step == 0
                                ? 'h-20 w-20  p-2 font-extrabold text-3xl'
                                : step > 0
                                ? '   h-20 w-20  p-2 font-bold text-2xl '
                                : ' h-16 w-16  p-2 font-bold text-2xl '
                        "
                        class="rounded-full flex justify-center items-center bg-lighter-primcolor"
                    >
                        <h1>1</h1>
                    </div>
                </div>
                <h3 :class="step == 0 ? ' font-extrabold w-3' : 'w-3'">
                    Préoccupation
                </h3>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
            <div>
                <div
                    @click="changeStep(1)"
                    :class="
                        step == 1
                            ? 'border-4  h-24 w-24 '
                            : step > 1
                            ? 'border-4 h-20 w-20  bg-lighter-primcolor'
                            : 'border-2  h-20 w-20 '
                    "
                    class="border-secondcolor rounded-full flex justify-center items-center cursor-pointer"
                >
                    <div
                        :class="
                            step == 1
                                ? 'rounded-full bg-lighter-primcolor h-20 w-20  p-2 font-extrabold text-3xl  flex justify-center items-center'
                                : step > 1
                                ? ' rounded-full  h-20 w-20  p-2 font-bold text-2xl  flex justify-center items-center'
                                : 'rounded-full bg-lighter-primcolor h-16 w-16  p-2 font-bold text-2xl  flex justify-center items-center'
                        "
                    >
                        <h1>2</h1>
                    </div>
                </div>
                <h3 :class="step == 1 ? ' font-extrabold w-3' : 'w-3'">
                    Propositions
                </h3>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
            <div class="w-32 h-0.5 bg-secondcolor mt-9">
                <div class="w-32 h-0.5 bg-secondcolor mt-1"></div>
            </div>
        </div>
    </div>

    <component
        v-bind:is="steps[step]"
        :updation="updation"
        :FormData="FormsData"
        v-if="display"
        @nextStep="nextStep"
        @scroll="scrollTop"
        @saveData="saveData"
        @storeData="storeData"
        @updateData="updateData"
    >
    </component>
</template>

<script>
import Form1Contribution from "../Components/CitizenComponents/Forms/Form1Contribution.vue";
import Form2Contribution from "../Components/CitizenComponents/Forms/Form2Contribution.vue";

import { ref } from "vue";
export default {
    name: "Contribuer",
    props: ["user"],

    data() {
        return {
            loggedUser: { id: "" },
            updation: false,
            FormsData: { user_id: "" },
            display: false, //to only display components when the FormsData contains the data
        };
    },
    setup() {
        const step = ref(0);
        const steps = [Form1Contribution, Form2Contribution];

        return {
            step,
            steps,
        };
    },
    methods: {
        //update database contribution with the new FormsData
        updateData() {
            axios
                .patch(
                    `/api/updateContribution/${this.$route.params.id}`,
                    this.FormsData
                )
                .then((response) => {
                    console.log(response);
                    this.alert.fire({
                        text: "Contribution modifiée avec succès",
                    });
                })
                .catch((error) => {
                    console.log("error message");
                });
        },
        saveData(contribution) {
            Object.assign(this.FormsData, contribution); //overwrites modified contribution fields in FormsData
            console.log("from saveData", this.FormsData);
        },
        //store data in database in case its a new contribution
        storeData() {
            this.FormsData.user_id = this.loggedUser.id;
            axios
                .post("/api/store/Contribution", this.FormsData)
                .then((response) => {
                    console.log(response);
                    this.alert.fire({
                        text: "Contribution envoyée avec succès",
                    });
                    this.$router.push({ path: "/" });
                })
                .catch((error) => {
                    console.log("error message");
                });
        },
        //to scroll to the top of the form
        scrollTop() {
            this.$refs["top"].scrollIntoView({ behavior: "smooth" });
        },
        nextStep() {
            this.step++;
        },
        //to go to a previous step
        changeStep(s) {
            if (this.step > s) {
                this.step = s;
            }
        },
    },
    //to set display to true when FormsData contains the data
    watch: {
        FormsData: {
            handler(newValue) {
                this.display = true;
            },
            deep: true,
        },
    },
    mounted() {
        this.loggedUser = JSON.parse(this.user);

        this.alert = this.$swal.mixin({
            position: "top-end",
            iconColor: "#529B9B",
            showConfirmButton: false,
            width: "34rem",
            padding: "1em",
            allowOutsideClick: "true",
            icon: "success",
            toast: "true",
            background: "#d1fae5",
            color: "#2B3238",
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
    },
    //to retreive the record corresponding to the id parameter and store it in FormsData to display it later
    async created() {
        var id = this.$route.params.id;
        if (id) {
            this.updation = true;
            await axios
                .get(`/api/get/Contribution/${id}`)
                .then((response) => {
                    Object.assign(this.FormsData, response.data[0]);
                })
                .catch((error) => console.log(error));
        } else this.display = true; //in case its a new contribution creation
    },
};
</script>