<template>
    <section class="text-secondcolor">
        <div class="container px-5 py-16 mx-auto">
            <h1
                class="title text-3xl md:text-4xl font-extrabold text-center relative p-5 mb-10"
            >
                NOS SERVICES
            </h1>

            <div class="flex flex-wrap justify-center">
                <div class="lg:w-1/3 py-5 md:px-10 mx-auto">
                    <div
                        class="h-full rounded-lg overflow-hidden text-center relative"
                    >
                        <img
                            alt="signalement"
                            src="https://picsum.photos/seed/picsum/200/200"
                            class="rounded-full inline-flex items-center mx-10 border-2 border-orangeColor"
                        />
                        <h1 class="sm:text-2xl text-xl font-extrabold my-6">
                            Signalement
                        </h1>
                        <p class="leading-relaxed mb-3">
                            Photo booth fam kinfolk cold-pressed sriracha
                            leggings jianbing microdosing tousled waistcoat.
                        </p>
                        <a
                            class="inline-flex items-center text-sm text-orangeColor border-2 rounded-md border-orangeColor px-8 py-2"
                            >Signaler
                        </a>
                        <div
                            class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4"
                        ></div>
                    </div>
                </div>
                <div class="lg:w-1/3 py-5 md:px-10">
                    <div
                        class="h-full rounded-lg overflow-hidden text-center relative"
                    >
                        <div>
                            <img
                                alt="Adhesion"
                                src="https://picsum.photos/seed/picsum/200/200"
                                class="rounded-full inline-flex items-center mx-10 border-2 border-primcolor"
                            />
                        </div>
                        <h1 class="sm:text-2xl text-xl font-extrabold my-6">
                            Adhesion
                        </h1>
                        <p class="leading-relaxed mb-3">
                            Photo booth fam kinfolk cold-pressed sriracha
                            leggings jianbing microdosing tousled waistcoat.
                        </p>

                        <a
                            class="inline-flex items-center text-sm border-2 rounded-md border-primcolor px-8 py-2 text-green-600"
                            >Adherer
                        </a>
                        <div
                            class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4"
                        ></div>
                    </div>
                </div>
                <div class="lg:w-1/3 py-5 md:px-10 mx-auto">
                    <div
                        class="h-full rounded-lg overflow-hidden text-center relative"
                    >
                        <img
                            alt="Evenements"
                            src="https://picsum.photos/seed/picsum/200/200"
                            class="rounded-full inline-flex items-center mx-10 border-2 border-yellowColor"
                        />
                        <h1
                            class="sm:text-2xl text-xl font-extrabold text-secondcolor my-6"
                        >
                            Evenement
                        </h1>
                        <p class="leading-relaxed mb-3">
                            Photo booth fam kinfolk cold-pressed sriracha
                            leggings jianbing microdosing tousled waistcoat.
                        </p>
                        <a
                            class="inline-flex items-center text-sm text-yellowColor border-2 rounded-md border-yellowColor px-8 py-2"
                            >Voir Evenement
                        </a>
                        <div
                            class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.title:after {
    content: "";
    position: absolute;
    bottom: 0;
    height: 10px;
    width: 70px;
    left: 0px;
    right: 0;
    margin: 0 auto;
    background: #75afaf;
    border-radius: 5px;
}
</style>
