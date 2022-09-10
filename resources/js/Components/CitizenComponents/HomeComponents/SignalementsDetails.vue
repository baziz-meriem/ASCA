<template>
    <div class="form-section mx-10 w-screen">
        <h1 class="text-3xl font-bold uppercase mb-10">Signalement Details</h1>
        <hr />

        <div class="border-l-4 border-primcolor px-4 my-3">
            Nom et Prénom:
            <label class="text-gray-500 text-sm px-5">{{ user.name }} </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Email:
            <label class="text-gray-500 text-sm px-5">{{ user.email }} </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Numéro de télphone:
            <label class="text-gray-500 text-sm px-5">{{ user.email }} </label>
        </div>

        <hr />
        <div class="mt-10"></div>

        <div class="border-l-4 border-primcolor px-4 my-3">
            Pays:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.pays }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Wilaya:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.wilaya }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Daiara:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.daira }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Commune:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.commune }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Code Postal:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.codePostale }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Deapssement:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.depassement }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            description du depassement:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.depass_description }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Conduit:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.conduit }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Status:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.statut }}
            </label>
        </div>
        <div class="border-l-4 border-primcolor px-4 my-3">
            Nature:
            <label class="text-gray-500 text-sm px-5"
                >{{ signalement.nature }}
            </label>
        </div>

        <div class="mt-10">
            <router-link :to="'/Citizen/Editsignalements/' + signalement.id"
                ><button
                    class="px-5 py-2 border mr-5 border-black"
                    @click="editSignalement"
                >
                    Edit Signalement
                </button></router-link
            >

            <button
                class="px-5 py-2 border mx-5 border-black"
                type="submit"
                @click="deleteSignalement"
            >
                Delete Signalement
            </button>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        axios
            .get(`/api/signalement/${this.$route.params.id}`)
            .then((response) => {
                this.setData(response.data);
                axios.get(`/api/users/${response.data.user_id}`).then((res) => {
                    this.setUser(res.data);
                });
            });
    },
    data: function () {
        return {
            signalement: [],
            user: [],
        };
    },
    methods: {
        setData(data) {
            this.signalement = data;
        },
        setUser(user) {
            this.user = user;
        },
        deleteSignalement() {
            axios
                .delete(`/api/signalement/${this.$route.params.id}`, {})
                .then((re) => this.$router.push("/Citizen"));
        },
    },
};
</script>
