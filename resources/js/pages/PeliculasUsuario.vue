<template>
  <div class="p-6 bg-gray-100 min-h-screen">

    <h1 class="text-3xl font-bold mb-6 text-center">Películas de Terror</h1>

    <div class="space-y-6">

      <!-- Tarjeta -->
      <div 
        v-for="p in peliculas" 
        :key="p.id"
        class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition
               flex flex-col md:flex-row md:justify-between md:items-start gap-6"
      >

        <!-- IZQUIERDA: Información -->
        <div class="flex-1 md:pr-6">

          <h2 class="text-2xl font-bold text-red-600 mb-3">
            {{ p.titulo }}
          </h2>

          <p class="text-gray-700 mb-4">
            {{ p.descripcion }}
          </p>

          <div class="text-sm text-gray-600 space-y-1">
            <p><strong>Tipo:</strong> {{ p.tipo }}</p>
            <p><strong>Clasificación:</strong> {{ p.clasificacion }}</p>
            <p><strong>País:</strong> {{ p.pais }}</p>
            <p><strong>Duración:</strong> {{ p.duracion }}</p>
            <p><strong>Actores:</strong> {{ p.actores }}</p>
            <p><strong>Nominaciones:</strong> {{ p.nominaciones }}</p>
            <p><strong>Plataforma:</strong> {{ p.plataforma }}</p>
          </div>

        </div>

        <!-- DERECHA: Imagen -->
        <div class="md:w-1/3 flex justify-center md:justify-end">
          <img
            v-if="p.imagen"
            :src="p.imagen"
            alt="Poster"
            class="rounded-lg w-full md:w-64 shadow-lg object-cover"
          />
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
defineProps({
  peliculas: Array
})
</script>
