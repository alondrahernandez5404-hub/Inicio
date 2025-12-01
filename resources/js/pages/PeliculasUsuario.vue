<template>
  <div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Películas</h1>

    <div v-for="p in peliculas" :key="p.id" class="mb-4 p-4 bg-white rounded shadow">
      
      <h2 class="text-xl font-semibold">{{ p.titulo }}</h2>

      <p><strong>Tipo:</strong> {{ p.tipo }}</p>
      <p><strong>Clasificación:</strong> {{ p.clasificacion }}</p>
      <p><strong>País:</strong> {{ p.pais }}</p>
      <p><strong>Duración:</strong> {{ p.duracion }}</p>
      <p><strong>Actores:</strong> {{ p.actores }}</p>
      <p><strong>Nominaciones:</strong> {{ p.nominaciones }}</p>
      <p><strong>Plataforma:</strong> {{ p.plataforma }}</p>

    </div>
  </div>
</template>

<script setup>
defineProps({
  peliculas: Array
})
</script>
