<template>
  <div class="container mx-auto mt-5 p-4">
    <!-- Boutons pour changer la langue -->
    <button @click="changeLanguage('en')" class="text-gray-500 hover:text-blue-700">En</button>
    <button @click="changeLanguage('fr')" class="text-gray-500 hover:text-blue-700">Fr</button>
    <h1 class="text-center mb-4 font-bold uppercase text-2xl">{{ t('📰 Liste des Articles') }}</h1>

    <div v-if="articles.length" class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-300 text-center">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="p-2 border border-gray-300">#</th>
            <th class="p-2 border border-gray-300">{{ t('Titre') }}</th>
            <th class="p-2 border border-gray-300">{{ t('Contenu') }}</th>
            <th class="p-2 border border-gray-300">{{ t('Actions') }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(article) in articles" :key="article.id" class="odd:bg-gray-100 even:bg-white hover:bg-gray-200">
            <td class="p-2 border border-gray-300">{{ article.id }}</td>
            <td class="p-2 border border-gray-300 font-bold">{{ article.title }}</td>
            <td class="p-2 border border-gray-300">{{ article.content }}</td>
            <td class="p-2 border border-gray-300 flex justify-center space-x-3">
              <a class="text-blue-500 hover:text-blue-700">
                <i class="fas fa-eye"></i>
              </a>
              <a href="#" class="text-yellow-500 hover:text-yellow-700">
                <i class="fas fa-edit"></i>
              </a>
              <a href="#" class="text-red-500 hover:text-red-700">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <p v-else class="text-center text-gray-500 text-lg">{{ t('Chargement des articles...') }}</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';

const { t, locale } = useI18n(); // Accès à la fonction de traduction et à la locale
const articles = ref([]);

const fetchArticles = async () => {
  const response = await axios.get('/articles');
  articles.value = response.data.data;
};

const changeLanguage = (lang) => {
  locale.value = lang; // Modification de la locale
};

onMounted(fetchArticles);
</script>
