<template>
    <div>
      <h1>Modifier l'article</h1>
      <form @submit.prevent="updateArticle">
        <input v-model="article.title" placeholder="Titre">
        <textarea v-model="article.content" placeholder="Contenu"></textarea>
        <input v-model="article.category" placeholder="Catégorie">
        <input v-model="article.image" placeholder="Image">
        <button type="submit">Mettre à jour</button>
      </form>
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
    },
    methods: {
      updateArticle() {
        const articleId = this.$route.params.id;
        axios.put(`/api/articles/${articleId}`, this.article)
          .then(response => {
            // Rediriger vers la liste des articles ou faire quelque chose d'autre
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  }
  </script>