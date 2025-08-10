<template>
  <div>
    <nav>
      <div class="logo">
        <img src="/images/logo-twolines.png" alt="Company Logo" />
      </div>
      <div class="menu">
        <router-link to="/">Dashboard</router-link> | 
        <router-link to="/content">Content</router-link> | 
        <button @click="logout">Logout</button>
      </div>
    </nav>
    <router-view />
  </div>
</template>

<script>
import axios from 'axios';

export default {
  methods: {
    logout() {
      axios.post('/logout')
        .then(() => {
          window.location.href = '/login';
        })
        .catch(err => {
          console.error('Logout failed', err);
        });
    }
  },
  mounted() {
    // Set CSRF token for axios from the meta tag in the main blade file
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  }
}
</script>