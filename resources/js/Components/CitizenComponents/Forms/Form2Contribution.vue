<template>
    <div class="form-section">
        <label for="description" class="block mb-2 text-base font-semibold mt-8"
            >Déscription
        </label>
        <textarea
            id="description"
            rows="4"
            :class="
                v$.description.$error === true
                    ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                    : ''
            "
            class="form-text-area"
            placeholder=" Type your description..."
            v-model="contribution.description"
        ></textarea>
        <span class="text-orangeColor pl-2" v-if="v$.description.$error">
            {{ v$.description.$errors[0].$message }}
        </span>

        <label
            for="proposition"
            class="block mb-2 text-base font-semibold mt-8"
            >Propositions</label
        >
        <textarea
            id="proposition"
            rows="4"
            :class="
                v$.proposition.$error === true
                    ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor'
                    : ''
            "
            class="form-text-area"
            placeholder="Type your propositions..."
            v-model="contribution.proposition"
        ></textarea>
        <span class="text-orangeColor pl-2" v-if="v$.proposition.$error">
            {{ v$.proposition.$errors[0].$message }}
        </span>

        <div class="text-center"  >
            <button
                class="form-button uppercase font-bold bg-primcolor hover:bg-lighter-primcolor hover:text-primcolor text-white"
                 @click="submitForm()"
            >
                 Envoyer
            </button>
        </div>
    </div>
</template>
<script>
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required} from "@vuelidate/validators";

export default {
    
    name: "ContributionForm2",
    props: ["FormData"],
    setup() {
        const contribution = reactive({
            v$: useVuelidate(),
            description: "",
            proposition: "",
          
        });

        const rules = {
            description: { required },
            proposition: { required },
        };
        const v$ = useVuelidate(rules, contribution);
        return { contribution, v$ };
    },

    emits: ["scroll", "saveData", "storeData","updateData"],
    methods: {
        submitForm() {
            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {
                
                this.$emit("scroll");
                this.$emit('saveData', this.contribution);//emit to contribuer to save data in FormsData whether its gonna be updated or newly created

                if(this.updating === 'true') this.$emit('updateData')//to update data
                     else this.$emit("storeData");//emit to contribuer to create new contribution in database
                

            } else {
                this.$emit("scroll");
            }
        },
         selectElement(id, valueToSelect) {    
            let el = document.getElementById(id);
            el.value = valueToSelect;}
    },

    mounted() {
        if(this.updateButton === 'true'){//only when its an update
            //copy specific fields from the record returned from DB
            this.contribution.description = this.FormData.description;
            this.contribution.proposition = this.FormData.proposition;
            //fill textfields with data stored in DB
            this.selectElement("description",this.FormData.description);
            this.selectElement("proposition",this.FormData.proposition);
        }
    },
};
</script>