<template>
    <div>
      <h1>Créer un nouvel article</h1>
      <form @submit.prevent="createArticle">
        <input v-model="article.title" placeholder="Titre">
        <textarea v-model="article.content" placeholder="Contenu"></textarea>
        <input v-model="article.category" placeholder="Catégorie">
        <input v-model="article.image" placeholder="Image">
        <button type="submit">Créer</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        article: {
          title: '',
          content: '',
          category: '',
          image: ''
        }
      }
    },
    methods: {
      createArticle() {
        axios.post('/api/articles', this.article)
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