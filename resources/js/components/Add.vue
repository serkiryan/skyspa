<template>
  <div>
    <h5 class="bg-success text-white p-2">Новый контакт</h5>
    <input v-model="name" type="text" placeholder="name">
    <input v-model="phone" type="number" placeholder="phone number">
    <button v-on:click="setContact()">Создать</button>
    <p v-if="errors.length">
    <b>Пожалуйста исправьте указанные ошибки:</b>
    <ul>
      <li v-for="error in errors" v-bind:key="error">{{ error }}</li>
    </ul>
  </p>
  </div>
</template>

<script>
import axios from 'axios';
import route from '../route';
    export default {
      data(){
        return{
          errors: [],
          name: '',
          phone: '',
          user_id
        }
      },
      methods: {
        setContact(){
          if (this.name && this.phone) {
            axios.post(route('store'),{
              name: this.name,
              phone: this.phone,
              user_id: user_id
            })
            .then((response) => {
              this.data = response.data;
              this.$router.push({ name: 'contacts'})
            });
          }

          this.errors = [];

          if (!this.name) {
            this.errors.push('Требуется указать имя.');
          }
          if (!this.phone) {
            this.errors.push('Требуется указать номер телефона.');
          }
        }
      },
      mounted() {
        
      }
    }
</script>
