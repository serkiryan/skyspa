<template>
  <div>
    <h5 class="bg-success text-white p-2">Управление Контактами</h5>
    <router-link :to="{ name: 'add'}" class="btn btn-sm btn-success">Добавить</router-link>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Имя</th>
          <th scope="col">Телефон</th>
          <th scope="col">Изменить</th>
          <th scope="col">Удалить</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="contact in contacts" :key="contact.id">
          <td>{{contact.name}}</td>
          <td>{{contact.phone}}</td>
          <td><router-link :to="{ name: 'edit', params: { contact_id: contact.id }}" class="btn btn-sm btn-success">Изменить</router-link></td>
          <td><router-link :to="{ name: 'delete', params: { contact_id: contact.id }}" class="btn btn-sm btn-danger">Удалить</router-link></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';
import route from '../route';
    export default {
      data(){
        return{
          contacts: []
        }
      },
      methods: {
        getContacts(){
          axios.get(route('all'))
          .then((response) => {
            this.contacts = response.data.contacts;
          });
        }
      },
      mounted() {
        this.getContacts();
      }
    }
</script>
