<template>
  <SidebarProvider>
    <div class="flex">

      <!-- Sidebar -->
      <AppSidebar class="w-64 bg-gray-800 text-white" />

      <!-- Contenu principal -->
      <main class="flex-1 p-6">
        <SidebarTrigger />

        <div class="container mx-auto mt-5 p-4">
          <div class="flex justify-between items-center mb-4">
            <div>
              <button @click="changeLanguage('en')" class="text-gray-500 hover:text-blue-700">En</button>
              <button @click="changeLanguage('fr')" class="text-gray-500 hover:text-blue-700">Fr</button>
            </div>
            <h1 class="text-center font-bold uppercase text-2xl">{{ t('📰 Liste des Articles') }}</h1>
            <button @click="openAddModal" class="px-4 py-2 bg-blue-500 text-white rounded-md">
              + {{ t('Ajouter Article') }}
            </button>
          </div>


          <!-- Table Articles -->
          <div v-if="articles.length" class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-center">
              <thead class="bg-gray-800 text-white">
                <tr>
                  <th class="p-2 border border-gray-300">#</th>
                  <th class="p-2 border border-gray-300">{{ t('Titre') }}</th>
                  <th class="p-2 border border-gray-300">{{ t('Contenu') }}</th>
                  <th class="p-2 border border-gray-300">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="article in articles" :key="article.id" class="odd:bg-gray-100 even:bg-white hover:bg-gray-200">
                  <td class="p-2 border border-gray-300">{{ article.id }}</td>
                  <td class="p-2 border border-gray-300 font-bold">{{ article.title }}</td>
                  <td class="p-2 border border-gray-300">{{ article.content }}</td>
                  <td class="p-2 border border-gray-300 flex justify-center space-x-3">
                    <button @click="openEditModal(article)" class="text-yellow-500 hover:text-yellow-700">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button @click="confirmDelete(article.id)" class="text-red-500 hover:text-red-700">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <p v-else class="text-center text-gray-500 text-lg">{{ t('Chargement des articles...') }}</p>
        </div>
      </main>
    </div>
  </SidebarProvider>

  <!-- Modal Confirmation Suppression -->
  <Dialog v-model:open="isConfirmDeleteOpen">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>{{ t('Confirmer la suppression') }}</DialogTitle>
        <DialogDescription>{{ t('Voulez-vous vraiment supprimer cet article ? Cette action est irréversible.') }}</DialogDescription>
      </DialogHeader>

      <DialogFooter>
        <button @click="deleteArticle" class="px-4 py-2 bg-red-500 text-white rounded-md">{{ t('Supprimer') }}</button>
        <button @click="isConfirmDeleteOpen = false" class="px-4 py-2 bg-gray-500 text-white rounded-md">{{ t('Annuler') }}</button>
      </DialogFooter>
    </DialogContent>
  </Dialog>
    <!-- message de controller -->
    <Dialog v-model:open="isNotificationVisible" class="bg-white rounded-lg p-6 shadow-xl">
    <DialogContent class="p-4">
        <DialogHeader class="text-gray-700 mt-4 text-sm">
        <DialogTitle class="text-lg font-semibold">Notification :</DialogTitle>
        </DialogHeader>
        <DialogDescription  class="bg-green-500 text-white rounded-lg p-4">
        {{ notificationMessage }}
        </DialogDescription>
    </DialogContent>
    </Dialog>

</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';
import { SidebarProvider, SidebarTrigger } from "../Components/ui/sidebar";
import AppSidebar from "../Components/AppSidebar.vue";
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogDescription, DialogFooter } from "../Components/ui/dialog";
import {NavigationMenu,
  NavigationMenuContent,
  NavigationMenuIndicator,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
  NavigationMenuViewport, } from "../Components/ui/navigation-menu"

const { t, locale } = useI18n();
const articles = ref([]);
const isConfirmDeleteOpen = ref(false);
const articleToDelete = ref(null);
const isNotificationVisible = ref(false);
const notificationMessage = ref("");

const fetchArticles = async () => {
  const response = await axios.get('/articles');
  articles.value = response.data.data;
};

const changeLanguage = (lang) => { locale.value = lang; };

const confirmDelete = (id) => {
  articleToDelete.value = id;
  isConfirmDeleteOpen.value = true;
};

const deleteArticle = async () => {
  try {
    const response = await axios.delete(`/articles/${articleToDelete.value}`);
    isConfirmDeleteOpen.value = false;
    fetchArticles();

    // Afficher la notification avec le message du backend
    notificationMessage.value = response.data.message;
    console.log(notificationMessage.value)
    isNotificationVisible.value = true;
    console.log(isNotificationVisible.value)

    // Masquer la notification après 3 secondes
    setTimeout(() => { isNotificationVisible.value = false; }, 2000);
  } catch (error) {
    console.error("Erreur lors de la suppression de l'article", error);
  }
};

onMounted(fetchArticles);
</script>
