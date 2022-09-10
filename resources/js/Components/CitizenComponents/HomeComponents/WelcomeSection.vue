<template>
    <div class=" mx-10 md:mx-40 lg:mx-50 xl:mx-60 p-5 my-20 relative bg-greyColor  rounded-3xl ">
            <div class="upercase  text-2xl lg:text-3xl text-center font-semibold">
                Bienvenu !
            </div>
            <div class="text-center py-5 text-sm  md:text-base lg:text-lg">
                <label
                    >Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500sLorem
                    Ipsum is simply dummy text of the printing and typesetting industry. 

                </label>
                <div >
                    <button @click="goAdherer" class="mt-4 ml-4 text-sm  md:text-base   dark:text-primcolor border-2 rounded-md border-primcolor lg:px-10 lg:py-3 px-8 py-2 text-primcolor">  Adherer  </button>
                </div>
            </div>
    </div>

</template>
<script>
export default {
    methods:{
        goAdherer(){
            this.$router.push('/Adherer');
        }
    }
}
</script>
