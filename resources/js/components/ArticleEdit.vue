<template>
  <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Modifier l'article</h1>
    <form @submit.prevent="updateArticle" class="space-y-4">
      <input 
        v-model="article.title" 
        placeholder="Titre" 
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
      >
      <textarea 
        v-model="article.content" 
        placeholder="Contenu" 
        class="w-full h-32 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
      ></textarea>
      <input 
        v-model="article.category" 
        placeholder="Catégorie" 
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
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
        Mettre à jour
      </button>
    </form>
    <div v-if="message" class="mt-4 text-center">
      <p :class="{'text-green-500': success, 'text-red-500': !success}">
        {{ message }}
      </p>
    </div>
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
      },
      message: '',
      success: false
    }
  },
  created() {
    // Charger l'article à modifier
    const articleId = this.$route.params.id; // Assurez-vous que l'ID de l'article est passé dans l'URL
    this.fetchArticle(articleId);
  },
  methods: {
    async fetchArticle(articleId) {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/articles/${articleId}/edit`);
        this.article = response.data.article;
      } catch (error) {
        console.error('Erreur lors du chargement de l\'article:', error);
      }
    },
    async updateArticle() {
      try {
        const articleId = this.$route.params.id;
        const response = await axios.put(`http://127.0.0.1:8000/articles/${articleId}`, this.article);
        this.message = 'Article mis à jour avec succès!';
        this.success = true;
      } catch (error) {
        this.message = 'Erreur lors de la mise à jour de l\'article.';
        this.success = false;
        console.error('Erreur lors de la mise à jour de l\'article:', error);
      }
    }
  }
}
</script>

<style scoped>
.text-green-500 {
  color: #38a169;
}
.text-red-500 {
  color: #e53e3e;
}
</style>
