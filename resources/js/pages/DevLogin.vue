<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    clave: '',
    password: '',
});
const submit = () => form.post(route('desarrollador.validar'));
</script>

<template>
    <Head title="Login Desarrollador" />

    <div class="min-h-screen flex items-center justify-center bg-black text-white">
        <div class="bg-neutral-900 p-8 rounded-xl shadow-2xl w-full max-w-md">
            <h1 class="text-center text-2xl mb-6 font-bold text-red-500">
                Área del Desarrollador
            </h1>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block mb-1">Clave de desarrollador</label>
                    <input v-model="form.clave" type="password"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700" />
                    <div v-if="form.errors.clave" class="text-red-400 text-sm">{{ form.errors.clave }}</div>
                </div>

                <div>
                    <label class="block mb-1">Contraseña</label>
                    <input v-model="form.password" type="password"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700" />
                    <div v-if="form.errors.password" class="text-red-400 text-sm">{{ form.errors.password }}</div>
                </div>

                <button
                    class="w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold transition">
                    Entrar
                </button>
            </form>
        </div>
    </div>
</template>
