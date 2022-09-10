<template>
    <div class="form-section">
        <div class="flex gap-36">
            <select
                id="underline_select" :class="v$.niveau.$error === true? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor': '' "
                name="niveau"
                class="form-select"
                v-model="state.niveau">
                <option value="">Sélectionnez le Niveau d'Etudes</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">Algeria</option>
                <option value="DE">Germany</option>
            </select>

            <select
                id="underline_select" :class=" v$.filiere.$error === true ? 'select-fields-errors focus:outline-none focus:ring-0 focus:border-orangeColor': ''"
                name="filiere"
                class="form-select"
                v-model="state.filiere"
            >
                <option value="">Sélectionnez la Filière</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">Algeria</option>
                <option value="DE">Germany</option>
            </select>
        </div>
        <div class="flex gap-36 w-75 h-50 mb-8">
            <span
                class="text-orangeColor w-full pl-2 text-sm"
                v-if="v$.nom.$error"
            >
                {{ v$.nom.$errors[0].$message }}
            </span>
            <span
                class="text-orangeColor w-full pl-2 text-sm"
                v-if="v$.prenom.$error"
            >
                {{ v$.prenom.$errors[0].$message }}
            </span>
        </div>

        <div class="flex mt-8 mb-4">
            <div class="flex items-center mr-10">
                <label for="inline-checkbox" class="mr-16 text-lg font-bold"
                    >Secteur</label
                >
                <input
                    id="inline-checkbox"
                    type="checkbox"
                    value="Publique"
                    v-model="state.secteur"
                    class="form-check"
                    @change="setOptions($event)"
                   
                />
                <label
                    for="inline-checkbox"
                    class="ml-2 text-base font-semibold"
                    
                    >Publique</label
                >
            </div>

            <div class="flex items-center">
                <input
                    id="inline-2-checkbox"
                    type="checkbox"
                    value="Privé"
                    v-model="state.secteur"
                    class="form-check" 
                    @change="setOptions($event)" 
                />
                <label
                    for="inline-2-checkbox"
                    class="ml-2 text-base font-semibold"
                    >Privé</label
                >
            </div>
        </div>
        <label class="block my-3 text-base font-bold" for="large_size"
            >Joindre CV</label
        >
        <input
            class="block mb-5 w-full text-base text-gray-900 bg-transparent cursor-pointer focus:outline-none"
            id="default_size"
            type="file"
        />
        <div class="text-right">
            <button
                class="text-sm text-primcolor dark:text-orangeColor border-2 rounded-md border-primcolor hover:bg-primcolor hover:text-white px-5 py-2 mt-5"
                
                @click ="nextForm()"
            > 
                Submit
            </button>
        </div>
    </div>
   
</template>

<script>
import { reactive } from "vue";
import useVuelidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";

export default {
    data:function(){
      return{
       
      }
    },
    setup() {
        const state = reactive({
            secteur : "Publique",
            v$: useVuelidate(),
            niveau: "",
            filiere: "",
        });
        const rules = {
            niveau: { required },
            niveau: { required },
        };
        const v$ = useVuelidate(rules, state);
        return { state, v$ };
    },

    emits: ["next","scroll"],
    methods: {
        setOptions(e) {
            this.state.secteur= e.target.value;  
},
        nextForm(state) {
            this.v$.$validate(); // checks all inputs
            if (!this.v$.$error) {
                // if ANY fail validation
                this.$emit("scroll");
                this.$emit("next");
            } else {
                this.$emit("scroll");
            }
        },
    },
    created() {
     
     axios.get('http://127.0.0.1:8000/api/getContribution/'+this.$route.params.id)
     .then(response =>{ this.state = response.data; console.log(this.state)
      
    })
     .catch(error => console.log(error) )
    
    }

};
</script>
