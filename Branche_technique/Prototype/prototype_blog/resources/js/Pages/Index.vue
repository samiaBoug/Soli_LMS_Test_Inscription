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
            <!-- Bouton Ajouter -->
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

  <!-- Modal Ajouter Article -->
  <Dialog v-model:open="isAddModalOpen">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>{{ t('Ajouter Article') }}</DialogTitle>
      </DialogHeader>
      <input v-model="newArticle.title" type="text" placeholder="Titre" class="w-full border rounded p-2" />
      <textarea v-model="newArticle.content" placeholder="Contenu" class="w-full border rounded p-2"></textarea>
      <DialogFooter>
        <button @click="addArticle" class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ t('Ajouter') }}</button>
        <button @click="isAddModalOpen = false" class="px-4 py-2 bg-gray-500 text-white rounded-md">{{ t('Annuler') }}</button>
      </DialogFooter>
    </DialogContent>
  </Dialog>

  <!-- Modal Modifier Article -->
  <Dialog v-model:open="isEditModalOpen">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>{{ t('Modifier Article') }}</DialogTitle>
      </DialogHeader>
      <input v-model="editArticle.title" type="text" class="w-full border rounded p-2" />
      <textarea v-model="editArticle.content" class="w-full border rounded p-2"></textarea>
      <DialogFooter>
        <button @click="updateArticle" class="px-4 py-2 bg-yellow-500 text-white rounded-md">{{ t('Modifier') }}</button>
        <button @click="isEditModalOpen = false" class="px-4 py-2 bg-gray-500 text-white rounded-md">{{ t('Annuler') }}</button>
      </DialogFooter>
    </DialogContent>
  </Dialog>

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
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useI18n } from 'vue-i18n';
import { SidebarProvider, SidebarTrigger } from "../Components/ui/sidebar";
import AppSidebar from "../Components/AppSidebar.vue";
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogDescription, DialogFooter } from "../Components/ui/dialog";

const { t, locale } = useI18n();
const articles = ref([]);
const newArticle = ref({ title: '', content: '' });
const editArticle = ref(null);
const isAddModalOpen = ref(false);
const isEditModalOpen = ref(false);
const isConfirmDeleteOpen = ref(false);
const articleToDelete = ref(null);

const fetchArticles = async () => {
  const response = await axios.get('/articles');
  articles.value = response.data.data;
};
const changeLanguage = (lang) => { locale.value = lang; };
const openAddModal = () => { isAddModalOpen.value = true; };
const openEditModal = (article) => { editArticle.value = { ...article }; isEditModalOpen.value = true; };
const addArticle = async () => { await axios.post('/articles', newArticle.value); isAddModalOpen.value = false; fetchArticles(); };
const updateArticle = async () => { await axios.put(`/articles/${editArticle.value.id}`, editArticle.value); isEditModalOpen.value = false; fetchArticles(); };
const confirmDelete = (id) => { articleToDelete.value = id; isConfirmDeleteOpen.value = true; };
const deleteArticle = async () => { await axios.delete(`/articles/${articleToDelete.value}`); isConfirmDeleteOpen.value = false; fetchArticles(); };

onMounted(fetchArticles);
</script>
