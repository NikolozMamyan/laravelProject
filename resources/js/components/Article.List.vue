<template>
  <div>
    <h1>Liste des articles</h1>
    <ul>
      <li v-for="article in articles" :key="article.id">
        {{ article.title }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      articles: []
    }
  },
  mounted() {
    axios.get('/api/articles')
      .then(response => {
        this.articles = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  }
}
</script>