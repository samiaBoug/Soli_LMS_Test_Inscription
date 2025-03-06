<template>
    <div class="container mt-5">
      <h1 class="text-center mb-5 fw-bold text-uppercase">📰 Liste des Articles</h1>
  
      <div v-if="articles.length" class="row justify-content-center">
        <div v-for="article in articles" :key="article.id" class="col-lg-4 col-md-6 col-sm-12">
          <div class="card article-card mb-4 shadow-lg">
            <div class="card-body">
              <h3 class="card-title text-primary fw-bold">{{ article.title }}</h3>
              <p class="card-text text-muted">{{ article.content }}</p>
              <a href="/article" class="btn btn-custom">Voir les détails</a>
            </div>
          </div>
        </div>
      </div>
  
      <p v-else class="text-center text-muted fs-4">Chargement des articles...</p>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const articles = ref([]);
  
  onMounted(async () => {
    try {
      const response = await axios.get('/articles');
      articles.value = response.data.data;
    } catch (error) {
      console.error("Erreur Axios:", error);
    }
  });
  </script>
  
  <style scoped>
  /* Style général */
  .container {
    max-width: 1200px;
  }
  
  /* Cartes */
  .article-card {
    border-radius: 12px;
    padding: 20px;
    transition: all 0.3s ease-in-out;
  }
  .article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
  }
  
  /* Texte */
  .card-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
  }
  .card-text {
    font-size: 1rem;
    line-height: 1.6;
  }
  
  /* Bouton personnalisé */
  .btn-custom {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
    text-decoration: none;
    display: inline-block;
  }
  .btn-custom:hover {
    background-color: #0056b3;
    color: #fff;
    transform: scale(1.05);
  }
  </style>
  