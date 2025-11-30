<script setup>
import { Head, router } from '@inertiajs/vue3';

defineProps({
    nombre: String
});

const logout = () => {
    router.post(route('desarrollador.logout'));
};
</script>

<template>
    <Head title="Panel del Desarrollador" />

    <div class="min-h-screen bg-black text-white p-6">
        <div class="max-w-2xl mx-auto bg-neutral-900 p-8 rounded-xl shadow-xl">
            <h1 class="text-3xl text-center text-red-500 font-bold mb-6">
                Bienvenido, {{ nombre }}
            </h1>

            <p class="text-neutral-300 mb-4">
                Aquí puedes agregar/editar películas (pendiente de implementar).
            </p>

            <hr class="border-neutral-700 my-6" />

            <button
                class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded font-semibold transition"
                @click="logout"
            >
                Cerrar sesión
            </button>
        </div>
    </div>
</template>
