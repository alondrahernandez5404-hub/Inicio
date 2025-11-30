<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

// Definir todos los campos necesarios para validar los 3 perfiles falsos
const form = useForm({
    nombre_completo: '',
    clave: '',
    telefono: '',
    cp: '',
    pais: '',
    password: '',
});

// Función que envía el formulario al backend
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
                <!-- Nombre Completo -->
                <div>
                    <label class="block mb-1">Nombre Completo</label>
                    <input
                        v-model="form.nombre_completo"
                        type="text"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700"
                        required
                    />
                    <div v-if="form.errors.nombre_completo" class="text-red-400 text-sm">
                        {{ form.errors.nombre_completo }}
                    </div>
                </div>

                <!-- Clave de desarrollador -->
                <div>
                    <label class="block mb-1">Clave de Desarrollador</label>
                    <input
                        v-model="form.clave"
                        type="text"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700"
                        required
                    />
                    <div v-if="form.errors.clave" class="text-red-400 text-sm">
                        {{ form.errors.clave }}
                    </div>
                </div>

                <!-- Teléfono -->
                <div>
                    <label class="block mb-1">Teléfono</label>
                    <input
                        v-model="form.telefono"
                        type="text"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700"
                        required
                    />
                    <div v-if="form.errors.telefono" class="text-red-400 text-sm">
                        {{ form.errors.telefono }}
                    </div>
                </div>

                <!-- Código Postal -->
                <div>
                    <label class="block mb-1">Código Postal</label>
                    <input
                        v-model="form.cp"
                        type="text"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700"
                        required
                    />
                    <div v-if="form.errors.cp" class="text-red-400 text-sm">
                        {{ form.errors.cp }}
                    </div>
                </div>

                <!-- País -->
                <div>
                    <label class="block mb-1">País</label>
                    <input
                        v-model="form.pais"
                        type="text"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700"
                        required
                    />
                    <div v-if="form.errors.pais" class="text-red-400 text-sm">
                        {{ form.errors.pais }}
                    </div>
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="block mb-1">Contraseña</label>
                    <input
                        v-model="form.password"
                        type="password"
                        class="w-full p-2 rounded bg-neutral-800 text-white border border-neutral-700"
                        required
                    />
                    <div v-if="form.errors.password" class="text-red-400 text-sm">
                        {{ form.errors.password }}
                    </div>
                </div>

                <!-- Botón de envío -->
                <button
                    class="w-full bg-red-600 hover:bg-red-700 py-2 rounded font-semibold transition"
                    :disabled="form.processing"
                >
                    <span v-if="form.processing">Validando...</span>
                    <span v-else>Entrar</span>
                </button>
            </form>
        </div>
    </div>
</template>
