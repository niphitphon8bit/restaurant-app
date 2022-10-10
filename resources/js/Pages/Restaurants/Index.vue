<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GMapMap from "@/Components/GoogleMaps.vue";
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import BreezeButton from '@/Components/PrimaryButton.vue';
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    restaurants: {},
});
const form = useForm();
</script>

<template>

  <Head title="Restaurants" />

<BreezeAuthenticatedLayout>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <div class="mb-2">
                            <!-- <Link :href="route('restaurants.create')">
                                <BreezeButton>Add Blog</BreezeButton></Link
                            > -->
                        </div>
                        <GMapMap :msg="restaurants"></GMapMap>
                        <div
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </BreezeAuthenticatedLayout>
</template>