<template>
  <div>
    <h5 class="bg-success text-white p-2">Add</h5>
    <input v-model="name">
    <input v-model="phone">
    <button v-on:click="saveContact()">Сохранить</button>
    <button v-on:click="cancel()">Отменить</button>
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
          contact_id: this.$route.params.contact_id
        }
      },
      methods: {
        saveContact(){
          if (this.name && this.phone) {
            axios.post(route('save'),{
              name: this.name,
              phone: this.phone,
              contact_id: this.contact_id
            })
            .then((response) => {
              this.data = response.data;
              this.$router.push({ name: 'all'})
            });
          }

          this.errors = [];

          if (!this.name) {
            this.errors.push('Требуется указать имя.');
          }
          if (!this.phone) {
            this.errors.push('Требуется указать номер телефона.');
          }
        },
        cancel(){
            this.$router.push({ name: 'contacts'});
        },
        getContact(){
          axios.get(route('edit', this.contact_id))
          .then((response) => {
            this.name = response.data.contact.name;
            this.phone = response.data.contact.phone;
          });
        }
      },
      mounted() {
        this.getContact();
      }
    }
</script>
