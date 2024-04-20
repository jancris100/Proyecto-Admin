<!-- resources/js/components/Form1.vue -->
<template>
    <div>
      <h1>Formulario 1</h1>
      <form @submit.prevent="submitForm">
        <!-- Campos y contenido del formulario 1 -->
        <label for="field1">Campo 1:</label>
        <input type="text" id="field1" v-model="formData.field1" />

        <label for="field2">Campo 2:</label>
        <input type="text" id="field2" v-model="formData.field2" />

        <button type="submit">Enviar Formulario 1</button>
      </form>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        formData: {
          field1: '',
          field2: '',
        },
      };
    },
    methods: {
      submitForm() {
        // Lógica para manejar el envío del formulario 1
        console.log('Formulario 1 enviado:', this.formData);
      },
    },
  };
  </script>
