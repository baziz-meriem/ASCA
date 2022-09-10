<template>
    <div class="flex-auto">
        <div class="w-full flex gap-10 pt-5">
            <button class="text-xl font-bold pb-2 border-solid border-black" :class="state.page === 1 ? 'border-b-4' : 'border-b-0'" @click="setOverview">Overview</button>
            <button class="text-xl font-bold pb-2 border-solid border-black" :class="state.page === 2 ? 'border-b-4' : 'border-b-0'" @click="setSettings">Settings</button> 
            <button class="text-xl font-bold pb-2 border-solid border-black" :class="state.page === 3 ? 'border-b-4' : 'border-b-0'" @click="setMore">More</button> 
        </div>
        <PartenaireTable v-if="state.page === 1" />
        <h1 v-if="state.page === 2">settings</h1>
        <h1 v-if="state.page === 3">more</h1>
    </div>
</template>
<script>
import PartenaireTable from "./PartenaireTable.vue"
import { reactive } from 'vue'
/* add font awesome icon component */

export default {
    components: {
        PartenaireTable
    },
    
    setup() {
        const state = reactive({
            page: 1,
        })

        function setOverview() {
         state.page = 1;
        }
        function setSettings() {
         state.page = 2
        }
        function setMore() {
         state.page = 3
        }

        return {
        state,
        setOverview,
        setSettings,
        setMore
        }
    }
};
</script>
    