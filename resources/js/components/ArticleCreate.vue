<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Créer un nouvel article</h1>
    <form @submit.prevent="createArticle" class="space-y-4">
      <input 
        v-model="article.title" 
        placeholder="Titre" 
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
      <textarea 
        v-model="article.content" 
        placeholder="Contenu" 
        class="w-full h-32 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      ></textarea>
      <input 
        v-model="article.category" 
        placeholder="Catégorie" 
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
      <input 
        v-model="article.image" 
        placeholder="Image" 
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
      <button 
        type="submit" 
        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
        Créer
      </button>
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
      axios.post('/api/articles/create', this.article)
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
