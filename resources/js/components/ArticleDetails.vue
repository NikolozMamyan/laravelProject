<template>
    <div>
      <h1>{{ article.title }}</h1>
      <p>{{ article.content }}</p>
      <p>Catégorie : {{ article.category }}</p>
      <img :src="article.image" :alt="article.title">
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        article: {}
      }
    },
    mounted() {
      const articleId = this.$route.params.id;
      axios.get(`/api/articles/${articleId}`)
        .then(response => {
          this.article = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
  </script>