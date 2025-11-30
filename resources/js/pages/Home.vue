<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const userForm = useForm({ nombre:'', correo:'', pais:'' });
const devForm = useForm({ nombre_completo:'', clave:'', telefono:'', cp:'', pais:'', password:'' });

const showUserModal = ref(false);
const showDevModal = ref(false);

const submitUser = () => userForm.post('/registro-publico');
const submitDev = () => devForm.post(route('desarrollador.validar'));
</script>

<template>
  <Head title="Horror World" />

  <div class="home-container">
    <div class="content-left">
      <!-- Título HOLA / PEQUEÑO / PSICOPATA -->
      <h1 class="title flicker">
        <span class="glow-text">HOLA</span><br>
        <span class="glow-text">PEQUEÑO</span><br>
        <span class="glow-text smoke-text" data-text="PSICÓPATA">PSICÓPATA</span>
      </h1>

      <!-- Botón INGRESAR centrado al título -->
      <div class="btn-wrapper">
        <button @click="showUserModal = true" class="btn-red flicker-btn">
          INGRESAR
        </button>
      </div>
    </div>

    <!-- Link desarrollador -->
    <div class="dev-link" @click="showDevModal = true">¿Eres desarrollador?</div>

    <!-- Modal Usuario -->
    <div v-if="showUserModal" class="modal-bg flex items-center justify-center">
      <div class="modal">
        <span class="close-btn" @click="showUserModal = false">✖</span>
        <h2 class="modal-title horror-text">REGISTRO DE MONSTRUOS</h2>
        <form @submit.prevent="submitUser" class="space-y-4">
          <div>
            <label class="horror-label horror-text">Nombre:</label>
            <input v-model="userForm.nombre" type="text" required class="input-field" />
          </div>
          <div>
            <label class="horror-label horror-text">Correo electrónico:</label>
            <input v-model="userForm.correo" type="email" required pattern=".+@gmail\.com" class="input-field" />
          </div>
          <div>
            <label class="horror-label horror-text">País:</label>
            <select v-model="userForm.pais" required class="input-field select-normal">
              <option disabled value="">Selecciona tu país</option>
              <option>México</option>
              <option>Estados Unidos</option>
              <option>España</option>
              <option>Francia</option>
              <option>Japón</option>
              <option>Brasil</option>
              <option>Argentina</option>
              <option>Colombia</option>
              <option>Canadá</option>
              <option>Italia</option>
              <option>Alemania</option>
              <option>Reino Unido</option>
              <option>Australia</option>
              <option>China</option>
              <option>India</option>
              <option>Rusia</option>
              <option>Sudáfrica</option>
              <option>Egipto</option>
              <option>Corea del Sur</option>
              <option>Nueva Zelanda</option>
            </select>
          </div>
          <button class="btn-red w-full mt-6">Entrar</button>
        </form>
      </div>
    </div>

    <!-- Modal Desarrollador -->
    <div v-if="showDevModal" class="modal-bg flex items-center justify-center">
      <div class="modal">
        <span class="close-btn" @click="showDevModal = false">✖</span>
        <h2 class="modal-title horror-text">INGRESO COMO DESARROLLADOR</h2>
        <form @submit.prevent="submitDev" class="space-y-4">
          <div>
            <label class="horror-label horror-text">Nombre Completo:</label>
            <input v-model="devForm.nombre_completo" type="text" required class="input-field" />
          </div>
          <div>
            <label class="horror-label horror-text">Clave:</label>
            <input v-model="devForm.clave" type="text" required class="input-field" />
          </div>
          <div>
            <label class="horror-label horror-text">Teléfono:</label>
            <input v-model="devForm.telefono" type="text" required class="input-field" />
          </div>
          <div>
            <label class="horror-label horror-text">Código Postal:</label>
            <input v-model="devForm.cp" type="text" required class="input-field" />
          </div>
          <div>
            <label class="horror-label horror-text">País:</label>
            <input v-model="devForm.pais" type="text" required class="input-field" />
          </div>
          <div>
            <label class="horror-label horror-text">Contraseña:</label>
            <input v-model="devForm.password" type="password" required class="input-field" />
          </div>
          <button class="btn-red w-full mt-6">Acceder</button>
        </form>
      </div>
    </div>
  </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Nosifer&display=swap');

.home-container {
  min-height: 100vh;
  position: relative;
  color: white;
  background-image: url('https://images.pexels.com/photos/14064395/pexels-photo-14064395.jpeg');
  background-size: cover;
  background-position: center;
  overflow: hidden;
}
.home-container::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.7);
  z-index: 1;
}

.content-left {
  position: relative;
  z-index: 2;
  padding: 50px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.title {
  font-size: 5rem;
  font-weight: bold;
  line-height: 1.2;
  text-align: left;
}

.glow-text {
  color: #ff0000;
  text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 20px #ff0000, 0 0 40px #ff0000, 0 0 60px #ff0000;
}

.smoke-text::after {
  content: attr(data-text);
  position: absolute;
  top:0; left:0;
  width:100%;
  color:#ff0000;
  opacity:0.3;
  filter: blur(8px);
  animation: smoke 4s infinite;
}

@keyframes smoke {
  0% { transform: translate(0,0) scale(1); opacity:0.3; }
  25% { transform: translate(0,-10px) scale(1.05); opacity:0.2; }
  50% { transform: translate(0,-20px) scale(1.1); opacity:0.1; }
  75% { transform: translate(0,-30px) scale(1.05); opacity:0.05; }
  100% { transform: translate(0,-40px) scale(1); opacity:0; }
}

.flicker {
  animation: flickerAnim 1.5s infinite;
}
.flicker-btn {
  animation: flickerBtn 2s infinite alternate;
}
@keyframes flickerAnim {
  0%,19%,21%,23%,25%,54%,56%,100% { opacity: 1; }
  20%,22%,24%,55% { opacity: 0.3; }
}
@keyframes flickerBtn {
  0% { opacity: 1; }
  50% { opacity: 0.7; }
  100% { opacity: 1; }
}

.btn-wrapper {
  display:flex;
  justify-content:center;
  width:30%;
  margin-top:4px;
}

.btn-red {
  background: linear-gradient(45deg, #8B0000, #FF0000);
  border: 2px solid #550000;
  color: #fff;
  cursor: pointer;
  box-shadow: 0 0 15px red;
  transition: all 0.3s;
  font-size: 1.8rem;
  padding: 0.4rem 0.8rem;
}

.btn-red:hover {
  background: linear-gradient(45deg, #FF0000, #8B0000);
  box-shadow: 0 0 25px red, 0 0 50px darkred;
  transform: scale(1.05);
}

.dev-link {
  position: fixed;
  bottom: 1.25rem;
  right: 1.25rem;
  z-index: 10;
  color: rgba(255,255,255,0.7);
  cursor: pointer;
  font-size: 0.9rem;
}

/* Modales */
.modal-bg {
  position: fixed;
  top:0; left:0;
  width:100%; height:100%;
  background: rgba(0,0,0,0.6);
  display:flex; justify-content:center; align-items:center;
  z-index:30;
}
.modal {
  background: #1b1b1b;
  padding: 25px;
  width: 400px;
  border-radius: 12px;
  color:white;
  box-shadow:0 0 20px red;
  backdrop-filter: blur(10px);
  font-family:'Nosifer', cursive;
  letter-spacing:2px;
}
.modal-title { 
  text-align:center; 
  font-size:1.5rem; 
  margin-bottom:15px; 
  color:#ff0000;
  text-shadow: 0 0 1px #ff0000, 0 0 2px #ff0000, 0 0 4px #ff0000; /* Neon suave */
}
.input-field { 
  width:100%; 
  padding:0.5rem; 
  border-radius:6px; 
  background:#2c2c2c; 
  color:white; 
  border:1px solid #444; 
  font-family: Arial, sans-serif; /* Fuente normal para escribir */
  text-shadow: none; /* Sin neon */
}
.select-normal { font-family: sans-serif; }
.horror-label { 
  font-family: 'Nosifer', cursive; 
  text-shadow: 0 0 1px #ff0000, 0 0 2px #ff0000, 0 0 4px #ff0000; /* Neon suave */
}
.close-btn { cursor:pointer; float:right; font-size:1.2rem; color:red; }
</style>
