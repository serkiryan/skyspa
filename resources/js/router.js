import VueRouter from 'vue-router';

import Contacts from './components/Contacts';
import Add from './components/Add';
import Edit from './components/Edit';
import Delete from './components/Delete';
export default new VueRouter({
  routes: [
    {
      name: 'contacts',
      path: '/contacts',
      component: Contacts,
      props: true
    },
    {
      name: 'all',
      path: '/contacts/all',
      component: Contacts,
      props: true
    },
    {
      name: 'add',
      path: '/contacts/add',
      component: Add,
      props: true
    },
    {
      name: 'store',
      path: '/contacts/store',
      props: true
    },
    {
      name: 'edit',
      path: '/contacts/edit/:contact_id',
      component: Edit,
      props: true
    },
    {
      name: 'save',
      path: '/contacts/save',
      props: true
    },
    {
      name: 'delete',
      path: '/contacts/delete/:contact_id',
      component: Delete,
      props: true
    },
    {
      name: 'remove',
      path: '/contacts/remove/:contact_id',
      props: true
    }
  ],
  mode: 'history'
});
