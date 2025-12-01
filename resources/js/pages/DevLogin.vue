<script setup>
import { Head, useForm, router } from '@inertiajs/vue3'

const form = useForm({
    clave: '',
    password: ''
})

const submit = () => {
    form.post(route('desarrollador.validar'), {
        onSuccess: (page) => {
            // Redirige usando la URL devuelta por el backend
            if (page.props.redirect) {
                router.visit(page.props.redirect)
            }
        }
    })
}
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
                    <label class="block mb-1">Clave</label>
                    <input v-model="form.clave" type="text"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700" />
                </div>

                <div>
                    <label class="block mb-1">Contraseña</label>
                    <input v-model="form.password" type="password"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700" />
                </div>

                <button
                    class="w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold transition"
                    :disabled="form.processing">
                    <span v-if="form.processing">Validando...</span>
                    <span v-else>Acceder</span>
                </button>

                <!-- Botón de prueba -->
                <button @click="alert('Click funciona!')" type="button" class="bg-blue-600 p-2 mt-4 w-full rounded text-white">
                    TEST CLICK
                </button>
            </form>
        </div>
    </div>
</template>
