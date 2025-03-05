import { createI18n } from 'vue-i18n';

const i18n = createI18n({
  legacy: false, // Activation du mode Composition API
  locale: 'fr',  // Langue par défaut
  fallbackLocale: 'en',
  messages: {
    en: {
      '📰 Liste des Articles': '📰 Articles list',
      'Titre': 'Title',
      'Contenu': 'Content',
      'Chargement des articles...': 'Loading articles...',
    },
    fr: {
      '📰 Liste des Articles': '📰 Liste des articles',
      'Titre': 'Titre',
      'Contenu': 'Contenu',
      'Chargement des articles...': 'Chargement des articles...',
    },
  },
});

export default i18n;
