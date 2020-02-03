<template>
  <div>
    <h5 class="bg-success text-white p-2">Удаление</h5>
    <p>{{name}}</p>
    <p>{{phone}}</p>
    <button v-on:click="removeContact()">Удалить</button>
    <button v-on:click="cancel()">Отменить</button>
    
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
        removeContact(){
          axios.get(route('remove', this.contact_id))
          .then((response) => {
            this.data = response.data;
            this.$router.push({ name: 'contacts'});
          });
        },
        cancel(){
            this.$router.push({ name: 'contacts'});
        },
        getContact(){
          axios.get(route('delete', this.contact_id))
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
