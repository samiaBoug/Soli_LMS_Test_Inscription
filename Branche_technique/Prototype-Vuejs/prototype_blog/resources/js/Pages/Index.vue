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
                  <th class="p-2 border border-gray-300">{{ t('Commentaires') }}</th>
                  <th class="p-2 border border-gray-300">{{ t('Tags') }}</th>
                  <th class="p-2 border border-gray-300">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr 
                  v-for="article in articles" 
                  :key="article.id" 
                  class="odd:bg-gray-100 even:bg-white hover:bg-gray-200"
                >
                  <td class="p-2 border border-gray-300">{{ article.id }}</td>
                  <td class="p-2 border border-gray-300 font-bold">{{ article.title }}</td>
                  <td class="p-2 border border-gray-300">{{ article.content }}</td>
                  <td class="p-2 border border-gray-300">
                    <ul>
                      <li v-for="comment in article.comments" :key="comment.id">
                        {{ comment.content }}
                      </li>
                    </ul>
                  </td>
                  <td class="p-2 border border-gray-300">
                    <ul>
                      <li v-for="tag in article.tags" :key="tag.id">
                        {{ tag.name }}
                      </li>
                    </ul>
                  </td>
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
          <p v-else class="text-center text-gray-500 text-lg">
            {{ t('Chargement des articles...') }}
          </p>
        </div>
      </main>
    </div>
  </SidebarProvider>

  <!-- Modal Confirmation Suppression -->
  <Dialog v-model:open="isConfirmDeleteOpen">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>{{ t('Confirmer la suppression') }}</DialogTitle>
        <DialogDescription>
          {{ t('Voulez-vous vraiment supprimer cet article ? Cette action est irréversible.') }}
        </DialogDescription>
      </DialogHeader>
      <DialogFooter>
        <button @click="deleteArticle" class="px-4 py-2 bg-red-500 text-white rounded-md">
          {{ t('Supprimer') }}
        </button>
        <button @click="isConfirmDeleteOpen = false" class="px-4 py-2 bg-gray-500 text-white rounded-md">
          {{ t('Annuler') }}
        </button>
      </DialogFooter>
    </DialogContent>
  </Dialog>

  <!-- Modal Ajouter article -->
  <Dialog v-model:open="isAddOpen">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>{{ t('Ajouter Article') }}</DialogTitle>
        <DialogDescription>
          {{ t("Remplissez les informations de l'article.") }}
        </DialogDescription>
      </DialogHeader>
      <form @submit.prevent="addArticle">
        <label>{{ t('Titre') }}</label>
        <input v-model="newArticle.title" type="text" class="w-full p-2 border rounded">

        <label>{{ t('Contenu') }}</label>
        <textarea v-model="newArticle.content" class="w-full p-2 border rounded"></textarea>

        <label>{{ t('Tags') }}</label>
        <input v-model="newArticle.tags" type="text" class="w-full p-2 border rounded">

        <label>{{ t('Catégories') }}</label>
        <select v-model="newArticle.category_id" class="w-full p-2 border rounded">
          <option 
            v-for="categorie in categories" 
            :key="categorie.id" 
            :value="categorie.id"
          >
            {{ categorie.name }}
          </option>
        </select>

        <DialogFooter>
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
            {{ t('Ajouter') }}
          </button>
          <button @click="isAddOpen = false" type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md">
            {{ t('Annuler') }}
          </button>
        </DialogFooter>
      </form>
    </DialogContent>
  </Dialog>

  <!-- Modal Modifier article -->
  <Dialog v-model:open="isEditOpen">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>{{ t('Modifier Article') }}</DialogTitle>
        <DialogDescription>
          {{ t("Modifiez les informations de l'article.") }}
        </DialogDescription>
      </DialogHeader>
      <form @submit.prevent="updateArticle">
        <label>{{ t('Titre') }}</label>
        <input v-model="editArticle.title" type="text" class="w-full p-2 border rounded">

        <label>{{ t('Contenu') }}</label>
        <textarea v-model="editArticle.content" class="w-full p-2 border rounded"></textarea>

        <label>{{ t('Tags') }}</label>
        <input v-model="editArticle.tags" type="text" class="w-full p-2 border rounded">

        <label>{{ t('Catégories') }}</label>
        <select v-model="editArticle.category_id" class="w-full p-2 border rounded">
          <option 
            v-for="categorie in categories" 
            :key="categorie.id" 
            :value="categorie.id"
          >
            {{ categorie.name }}
          </option>
        </select>

        <DialogFooter>
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
            {{ t('Modifier') }}
          </button>
          <button @click="isEditOpen = false" type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md">
            {{ t('Annuler') }}
          </button>
        </DialogFooter>
      </form>
    </DialogContent>
  </Dialog>

  <!-- Message de confirmation -->
  <Dialog v-model:open="isNotificationVisible">
    <DialogContent>
      <DialogHeader>
        <DialogTitle class="text-lg font-semibold">
          {{ t('Notification') }}
        </DialogTitle>
      </DialogHeader>
      <DialogDescription class="bg-green-500 text-white rounded-lg p-4 text-center">
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

const { t, locale } = useI18n();

// États et données
const articles = ref([]);
const categories = ref([]);
const isConfirmDeleteOpen = ref(false);
const isAddOpen = ref(false);
const isEditOpen = ref(false);
const isNotificationVisible = ref(false);
const notificationMessage = ref("");
const articleToDelete = ref(null);

const newArticle = ref({
  title: "",
  content: "",
  tags: "",
  category_id: null,
});

const editArticle = ref({
  id: null,
  title: "",
  content: "",
  tags: "",
  category_id: null,
});

// Chargement des articles
const fetchArticles = async () => {
  try {
    const response = await axios.get('/articles');
    articles.value = response.data.data;
  } catch (error) {
    console.error("Erreur lors du chargement des articles", error);
  }
};

// Chargement des catégories
const fetchCategories = async () => {
  try {
    const response = await axios.get('/categories');
    categories.value = response.data;
  } catch (error) {
    console.error("Erreur lors du chargement des catégories", error);
  }
};

const changeLanguage = (lang) => {
  locale.value = lang;
};

// Confirmation de suppression
const confirmDelete = (id) => {
  articleToDelete.value = id;
  isConfirmDeleteOpen.value = true;
};

// Suppression d'un article
const deleteArticle = async () => {
  try {
    await axios.delete(`/articles/${articleToDelete.value}`);
    isConfirmDeleteOpen.value = false;
    fetchArticles();
    notificationMessage.value = t("L'article a été supprimé avec succès");
    isNotificationVisible.value = true;
    setTimeout(() => (isNotificationVisible.value = false), 2000);
  } catch (error) {
    console.error("Erreur lors de la suppression de l'article", error);
  }
};

// Ouvrir la modal d'ajout
const openAddModal = () => {
  isAddOpen.value = true;
  newArticle.value = {
    title: "",
    content: "",
    tags: "",
    category_id: null,
  };
};

// Ajout d'un article
const addArticle = async () => {
  try {
    const response = await axios.post('/articles', newArticle.value);
    articles.value.push(response.data.data);
    isAddOpen.value = false;
    notificationMessage.value = t("L'article a été ajouté avec succès");
    isNotificationVisible.value = true;
    setTimeout(() => (isNotificationVisible.value = false), 2000);
  } catch (error) {
    console.error("Erreur lors de l'ajout de l'article", error);
  }
};

// Ouvrir la modal d'édition
const openEditModal = (article) => {
  isEditOpen.value = true;
  editArticle.value = { ...article };
};

// Modification d'un article
const updateArticle = async () => {
  try {
    await axios.put(`/articles/${editArticle.value.id}`, editArticle.value);
    const index = articles.value.findIndex(a => a.id === editArticle.value.id);
    if (index !== -1) {
      articles.value[index] = { ...editArticle.value };
    }
    isEditOpen.value = false;
    notificationMessage.value = t("L'article a été modifié avec succès");
    isNotificationVisible.value = true;
    setTimeout(() => (isNotificationVisible.value = false), 2000);
  } catch (error) {
    console.error("Erreur lors de la modification de l'article", error);
  }
};

onMounted(() => {
  fetchArticles();
  fetchCategories();
});
</script>
