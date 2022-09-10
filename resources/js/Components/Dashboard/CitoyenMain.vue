<template>
    <div class="flex-auto">
        <div class="w-full flex gap-10 pt-5">
            <button class="text-xl font-bold pb-2 border-solid border-black" :class="state.overview ? 'border-b-4' : 'border-b-0'" @click="setOverview">Overview</button>
            <button class="text-xl font-bold pb-2 border-solid border-black" :class="!state.overview ? 'border-b-4' : 'border-b-0'" @click="setSettings">Settings</button> 
        </div>
        <CitoyenTable v-if="state.overview" />
        <h1 v-if="!state.overview">settings</h1>
    </div>
</template>
<script>
import CitoyenTable from "./CitoyenTable.vue";
import { reactive } from 'vue'
/* add font awesome icon component */

export default {
    components: {
        CitoyenTable
    },
    
    setup() {
        const state = reactive({
        overview: true,
        })

        function setOverview() {
         state.overview = true;
        }
        function setSettings() {
         state.overview = false;
        }

        return {
        state,
        setOverview,
        setSettings
        }
    }
};
</script>
    