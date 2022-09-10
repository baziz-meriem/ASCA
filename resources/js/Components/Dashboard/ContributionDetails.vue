<template>
   <div class="form-section mx-10 w-screen">
    <h1 class="text-3xl font-bold uppercase mb-10 text-center">Contribution Details</h1>
        <hr/>
        <div class="display flex align-center justify-center">
            <div>
                <div class="text-gray-700 font-bold border-l-4 border-primcolor  px-4 my-3">
                    Nom et Prénom:
                    <label class="text-secondcolor text-sm px-5 capitalize">{{ user.name }} </label>
                </div>
                <div class="text-gray-700 font-bold border-l-4 border-primcolor px-4 my-3">
                    Email:
                    <label class="text-secondcolor text-sm px-5 capitalize"> {{ user.email }} </label>
                </div>
                <div class="text-gray-700 font-bold border-l-4 border-primcolor px-4 my-3">
                    Numéro de télphone:
                    <label class="text-secondcolor text-sm px-5 "> {{ user.email }}  </label>
                </div>
            </div>
        </div>
        <hr />
        <div class="mt-10"></div>
    <div class="flex my-5">
            <div>
                <div class=" h-16 w-16 border-4 border-secondcolor rounded-full flex justify-center items-center">
                        <div class="h-12 w-12 font-bold text-xl rounded-full flex justify-center items-center bg-lighter-primcolor">
                            <h1>1</h1>
                        </div>
                </div>
            </div>
                <div class="text-lg text-gray-700 font-bold py-1 px-3 m-3 bg-lighter-primcolor w-full">
                    Préoccupation
                </div>
    </div>
        <div class="pl-24 ">
          <div class="flex gap-20 pb-2  "> <div class=" m-3 w-32 text-base"> Nature de la préoccupation</div> 
          <div class=" display-data "> {{ contribution.nature }}</div> </div>
          
        </div>
        <div class=" m-3 text-base pl-24 font-bold"> Lieu concerné</div>
        <div class="bg-white ml-24 rounded-2xl border-2 px-8 py-4 mr-10">
            <div class="flex justify-between gap-10 pb-2  "> <div class=" my-5 w-16 text-base"> Pays</div> <div class=" display-data">{{ contribution.pays }}</div> <div class=" m-3 text-base"> Wilaya</div> <div class=" display-data "> {{ contribution.wilaya }}</div> </div>
            <div class="flex justify-between gap-10 pb-2  "> <div class=" my-5 w-16 text-base"> Commune</div> <div class=" display-data">{{ contribution.commune }}</div> <div class=" m-3 text-base pl-4"> Daira</div> <div class=" display-data "> {{ contribution.daira }}</div> </div>
            <div class="flex gap-10 "> <div class=" my-5 w-28 text-base"> Code Postale</div> <div class=" display-data"> {{ contribution.codePostale }}</div>  </div>
        </div>
        <div class="flex my-5">
            <div>
                <div class=" h-16 w-16 border-4 border-secondcolor rounded-full flex justify-center items-center">
                        <div class="h-12 w-12 font-bold text-xl rounded-full flex justify-center items-center bg-lighter-primcolor">
                            <h1>2</h1>
                        </div>
                </div>
            </div>
                <div class="text-lg text-gray-700 font-bold py-1 px-3 m-3 bg-lighter-primcolor w-full">
                    Propositions 
                </div>
    </div>
        <div class="pl-24 ">
          <div class="flex gap-20  "> 
                <div class="mx-3 my-5 w-34 text-base">Description
                </div> 
                <div class=" display-data mx-8"> 
               {{ contribution.description }}
                </div> 
            </div>
        </div>
    
        <div class="mt-10 display flex align-center justify-center">
            <form @submit="changeState" class="mt-4">
                <select id="status_select">
                    <option value="" hidden>marquer comme</option>
                    <option  value="en attente">en attente </option>
                    <option  value="archivé">archivé</option>
                    <option  value="traité">traité</option>
                </select>
                <button
                    class="px-5 py-2 border mx-5 border-black"
                    type="submit"
                >
                    save
                </button>
                <button
                    class="px-5 py-2 border mx-5 border-black"
                    type="submit"
                >
                    rediriger
                </button>

            </form>
        </div>
   </div>
</template>
<script>
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {  faFile } from "@fortawesome/free-solid-svg-icons";
library.add(
     faFile

);
export default {
    components: {
        FontAwesomeIcon,
    },
    data: function () {
        return {
            contribution: {},
            user: {},
        };
    },
    methods: {
        setData(data) {
            this.contribution = data;
        },
        setUser(user) {
            this.user = user;
        },
        changeState() {
            const status = document.getElementById("status_select").value;
            axios
                .patch(`/api/update/Contribution/${this.$route.params.id}`, {
                    statut: status,
                })
                .then(() => console.log("done"));
        },
    },
    mounted() {
        axios
            .get(`/api/get/Contribution/${this.$route.params.id}`)
            .then((response) => {
                this.setData(response.data[0]);
                axios.get(`/api/users/${response.data[0].user_id}`).then((res) => {
                    this.setUser(res.data);
                });
            });
    },
    
    
    
    
    
    
    
    }
</script>
