import { createI18n } from 'vue-i18n';

const i18n = createI18n({
  legacy: false, 
  locale: 'fr',  
  fallbackLocale: 'en',
  messages: {
    en: {
      '📰 Liste des Articles': '📰 Articles list',
      'Titre': 'Title',
      'Contenu': 'Content',
      'Chargement des articles...': 'Loading articles...',
      'Ajouter Article' : 'Add Article',
      'Remplissez les informations de l\'article.': 'Fill in the article information.',
      'Modifier' : 'Edit',
      'Ajouter' : 'Add',
      'Annuler': 'Close',
      'Confirmer la suppression':'Confirm deletion', 
      'Voulez-vous vraiment supprimer cet article ? Cette action est irréversible.' : 'Do you really want to delete this article? This action is irreversible',
      'Supprimer' : 'Delete'
    },
    fr: {
      '📰 Liste des Articles': '📰 Liste des articles',
      'Titre': 'Titre',
      'Contenu': 'Contenu',
      'Chargement des articles...': 'Chargement des articles...',
      'Ajouter Article' : 'Ajouter Article',
      'Remplissez les informations de l\'article.': 'Remplissez les informations de l\'article.',
      'Modifier' : 'Modifier',
      'Ajouter' : 'Ajouter',
      'Annuler': 'Annuler',
      'Confirmer la suppression': 'Confirmer la suppression',
      'Voulez-vous vraiment supprimer cet article ? Cette action est irréversible.': 'Voulez-vous vraiment supprimer cet article ? Cette action est irréversible.',
      'Supprimer': 'Supprimer'
    },
  },
});

export default i18n;
