<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// Props recibidas desde el backend
defineProps({
  nombre: String
});

// Lista de películas (simulada)
const peliculas = ref([
  { id: 1, titulo: 'Película 1', descripcion: 'Descripción 1', imagen: '' },
  { id: 2, titulo: 'Película 2', descripcion: 'Descripción 2', imagen: '' }
]);

// Formulario para agregar/editar películas
const form = useForm({
  id: null,
  titulo: '',
  descripcion: '',
  imagen: ''
});

// Estado para controlar si estamos editando
const editando = ref(false);

// Función para agregar película
const agregar = () => {
  if (editando.value) {
    // Editamos
    const index = peliculas.value.findIndex(p => p.id === form.id);
    if (index !== -1) {
      peliculas.value[index] = { ...form };
    }
    editando.value = false;
  } else {
    // Agregamos nueva
    const nuevaId = peliculas.value.length
      ? Math.max(...peliculas.value.map(p => p.id)) + 1
      : 1;
    peliculas.value.push({ ...form, id: nuevaId });
  }
  form.reset();
};

// Función para cargar datos en el formulario para editar
const editar = (pelicula: any) => {
  form.id = pelicula.id;
  form.titulo = pelicula.titulo;
  form.descripcion = pelicula.descripcion;
  form.imagen = pelicula.imagen;
  editando.value = true;
};

// Función para eliminar película
const eliminar = (id: number) => {
  peliculas.value = peliculas.value.filter(p => p.id !== id);
};

// Logout
import { router } from '@inertiajs/vue3';
const logout = () => router.post(route('desarrollador.logout'));
</script>

<template>
  <Head title="Panel del Desarrollador" />

  <div class="min-h-screen bg-black text-white p-6">
    <div class="max-w-4xl mx-auto bg-neutral-900 p-8 rounded-xl shadow-xl">
      <h1 class="text-3xl text-center text-red-500 font-bold mb-6">
        Bienvenido, {{ nombre }}
      </h1>

      <p class="text-neutral-300 mb-4">
        Aquí puedes agregar, editar o eliminar películas.
      </p>

      <hr class="border-neutral-700 my-6" />

      <!-- Formulario Agregar/Editar -->
      <div class="mb-6">
        <h2 class="text-xl font-bold mb-2">{{ editando ? 'Editar Película' : 'Agregar Película' }}</h2>
        <input v-model="form.titulo" placeholder="Título" class="w-full mb-2 p-2 rounded bg-neutral-800 border border-neutral-700" />
        <textarea v-model="form.descripcion" placeholder="Descripción" class="w-full mb-2 p-2 rounded bg-neutral-800 border border-neutral-700"></textarea>
        <input v-model="form.imagen" placeholder="URL de imagen" class="w-full mb-2 p-2 rounded bg-neutral-800 border border-neutral-700" />
        <button @click="agregar" class="bg-red-600 hover:bg-red-700 py-2 px-4 rounded font-semibold">
          {{ editando ? 'Guardar Cambios' : 'Agregar Película' }}
        </button>
        <button v-if="editando" @click="form.reset(); editando=false" class="ml-2 bg-gray-600 hover:bg-gray-700 py-2 px-4 rounded font-semibold">
          Cancelar
        </button>
      </div>

      <!-- Lista de películas -->
      <div>
        <h2 class="text-xl font-bold mb-2">Películas existentes</h2>
        <ul>
          <li v-for="pelicula in peliculas" :key="pelicula.id" class="mb-2 p-2 bg-neutral-800 rounded flex justify-between items-center">
            <div>
              <p class="font-bold">{{ pelicula.titulo }}</p>
              <p class="text-sm">{{ pelicula.descripcion }}</p>
              <img v-if="pelicula.imagen" :src="pelicula.imagen" class="w-32 mt-1 rounded" />
            </div>
            <div class="flex gap-2">
              <button @click="editar(pelicula)" class="bg-yellow-500 hover:bg-yellow-600 py-1 px-2 rounded font-semibold text-black">
                Editar
              </button>
              <button @click="eliminar(pelicula.id)" class="bg-red-700 hover:bg-red-800 py-1 px-2 rounded font-semibold">
                Borrar
              </button>
            </div>
          </li>
        </ul>
      </div>

      <hr class="border-neutral-700 my-6" />

      <button @click="logout" class="bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded font-semibold">
        Cerrar sesión
      </button>
    </div>
  </div>
</template>
