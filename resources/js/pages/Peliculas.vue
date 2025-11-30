<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { Head, router } from '@inertiajs/vue3'
import axios from 'axios'

// UI Components (ya los tienes instalados)
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Card, CardContent } from '@/components/ui/card'

// Datos del formulario
const form = ref({
    titulo: '',
    tipo: '',
    clasificacion: '',
    pais: '',
    duracion: '',
    actores: '',
    nominaciones: '',
    plataforma: '',
})

// Lista de películas
const peliculas = ref([])

// Para edición
const editId = ref<number | null>(null)
const cargando = ref(true)

// ====================
//   CARGAR PELÍCULAS
// ====================
const cargarPeliculas = async () => {
    cargando.value = true
    const respuesta = await axios.get('/api/peliculas')
    peliculas.value = respuesta.data
    cargando.value = false
}

// ========================
//   GUARDAR / ACTUALIZAR
// ========================
const enviarFormulario = async () => {
    if (editId.value === null) {
        // crear
        await axios.post('/api/peliculas', form.value)
    } else {
        // actualizar
        await axios.put(`/api/peliculas/${editId.value}`, form.value)
    }

    limpiarFormulario()
    cargarPeliculas()
}

// ====================
//   EDITAR
// ====================
const editar = (pelicula: any) => {
    editId.value = pelicula.id
    form.value = { ...pelicula }
}

// ====================
//   ELIMINAR
// ====================
const eliminar = async (id: number) => {
    if (!confirm('¿Eliminar esta película?')) return
    await axios.delete(`/api/peliculas/${id}`)
    cargarPeliculas()
}

// ====================
//   LIMPIAR
// ====================
const limpiarFormulario = () => {
    editId.value = null
    form.value = {
        titulo: '',
        tipo: '',
        clasificacion: '',
        pais: '',
        duracion: '',
        actores: '',
        nominaciones: '',
        plataforma: '',
    }
}

onMounted(() => {
    cargarPeliculas()
})
</script>




<template>
    <Head title="Gestión de Películas" />

    <div class="p-6 max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">🎬 Gestión de Películas</h1>

        <!-- FORMULARIO -->
        <Card class="mb-8">
            <CardContent class="p-6 space-y-4">

                <h2 class="text-xl font-semibold mb-2">
                    {{ editId ? "Editar Película" : "Agregar Película" }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <Label>Título</Label>
                        <Input v-model="form.titulo" />
                    </div>

                    <div>
                        <Label>Tipo</Label>
                        <Input v-model="form.tipo" placeholder="slasher, zombies, etc" />
                    </div>

                    <div>
                        <Label>Clasificación</Label>
                        <Input v-model="form.clasificacion" />
                    </div>

                    <div>
                        <Label>País</Label>
                        <Input v-model="form.pais" />
                    </div>

                    <div>
                        <Label>Duración</Label>
                        <Input v-model="form.duracion" placeholder="Ej: 1h 45m" />
                    </div>

                    <div>
                        <Label>Actores</Label>
                        <Input v-model="form.actores" placeholder="Separados por comas" />
                    </div>

                    <div>
                        <Label>Nominaciones</Label>
                        <Input v-model="form.nominaciones" />
                    </div>

                    <div>
                        <Label>Plataforma</Label>
                        <Input v-model="form.plataforma" placeholder="Netflix, etc" />
                    </div>
                </div>

                <div class="flex gap-3 mt-4">
                    <Button @click="enviarFormulario">
                        {{ editId ? "Actualizar" : "Guardar" }}
                    </Button>

                    <Button variant="ghost" @click="limpiarFormulario">
                        Limpiar
                    </Button>
                </div>

            </CardContent>
        </Card>

        <!-- TABLA -->
        <h2 class="text-2xl font-semibold mb-3">📄 Lista de Películas</h2>

        <div v-if="cargando" class="text-gray-400">Cargando...</div>

        <table v-else class="w-full border-collapse border border-gray-600">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="border px-2 py-1">ID</th>
                    <th class="border px-2 py-1">Título</th>
                    <th class="border px-2 py-1">Tipo</th>
                    <th class="border px-2 py-1">País</th>
                    <th class="border px-2 py-1">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="p in peliculas" :key="p.id" class="bg-gray-900">
                    <td class="border px-2 py-1">{{ p.id }}</td>
                    <td class="border px-2 py-1">{{ p.titulo }}</td>
                    <td class="border px-2 py-1">{{ p.tipo }}</td>
                    <td class="border px-2 py-1">{{ p.pais }}</td>
                    <td class="border px-2 py-1 flex gap-2">
                        <Button size="sm" @click="editar(p)">Editar</Button>
                        <Button size="sm" variant="destructive" @click="eliminar(p.id)">
                            Eliminar
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>
