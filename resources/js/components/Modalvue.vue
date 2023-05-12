<template>
  <div>
    <button @click="openModal">Abrir Modal</button>

    <div v-if="isModalOpen" class="modal">
      <h2>{{ modalTitle }}</h2>
      <p>{{ modalContent }}</p>
      <button @click="closeModal">Fechar Modal</button>
    </div>
  </div>
</template>

<script>
import { mapState, mapMutations } from 'vuex';

export default {
  computed: {
    ...mapState(['isModalOpen', 'modalTitle', 'modalContent'])
  },
  methods: {
    ...mapMutations(['openModal', 'closeModal'])
  }
}
</script>

<style>
.modal {
  background-color: #f5f5f5;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top: 20px;
}
</style>
