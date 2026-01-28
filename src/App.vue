<template>
  <div id="content" class="app-content">
    <div class="app-navigation">
        <ul class="with-icon">
            <li :class="{ active: view === 'templates' }">
                <a href="#" @click.prevent="view = 'templates'">
                    <span class="icon-params"><FileDocumentMultipleIcon :size="20" /></span>
                    Vorlagen
                </a>
            </li>
            <li :class="{ active: view === 'workflows' }">
                <a href="#" @click.prevent="view = 'workflows'">
                    <span class="icon-params"><SitemapIcon :size="20" /></span>
                    Workflows
                </a>
            </li>
        </ul>
    </div>

    <div id="app-content">
        <div v-if="view === 'templates'" class="view-container">
            <div class="header">
                 <h2>Dokumentvorlagen</h2>
                 <button class="primary" @click="showCreate = true">Neue Vorlage</button>
            </div>
             <p class="description">Verwalten Sie hier Vorlagen für Serienbriefe und Formulare.</p>
             <div v-if="showCreate" class="create-form">
                <h3>Neue Vorlage</h3>
                <form @submit.prevent>
                    <div class="form-group"><label>Name</label><input class="form-control"></div>
                    <div class="form-actions"><button class="primary">Speichern</button><button @click="showCreate=false">Abbrechen</button></div>
                </form>
             </div>
             <!-- List placeholder -->
             <p>Keine Vorlagen vorhanden.</p>
        </div>

        <div v-if="view === 'workflows'" class="view-container">
            <h2>Genehmigungs-Workflows</h2>
            <p>Konfigurieren Sie Freigabeprozesse.</p>
        </div>
    </div>
  </div>
</template>

<script>
import FileDocumentMultipleIcon from 'vue-material-design-icons/FileDocumentMultiple.vue'
import SitemapIcon from 'vue-material-design-icons/Sitemap.vue'

export default {
  name: 'DocumentsApp',
  components: { FileDocumentMultipleIcon, SitemapIcon },
  data() {
      return {
          view: 'templates',
          showCreate: false
      }
  }
}
</script>

<style scoped>
.app-content { display: flex; height: 100vh; overflow: hidden; }
.app-navigation { width: 300px; border-right: 1px solid var(--color-border); padding-top: 10px; background: var(--color-main-background); }
#app-content { flex-grow: 1; padding: 20px; overflow-y: auto; }
.with-icon { list-style: none; padding: 0; margin: 0; }
.with-icon a { display: flex; align-items: center; padding: 10px 15px; text-decoration: none; color: var(--color-main-text); opacity: 0.7; }
.with-icon li.active a { opacity: 1; font-weight: bold; background: var(--color-background-hover); }
.icon-params { margin-right: 10px; display: flex; }

.header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--color-border); }
.create-form { background: var(--color-background-hover); padding: 15px; border-radius: 5px; margin-bottom: 20px; }
.form-group { margin-bottom: 10px; }
.form-control { width: 100%; padding: 5px; }
button.primary { background-color: var(--color-primary); color: var(--color-primary-text); border: none; padding: 8px 12px; border-radius: 3px; cursor: pointer; }
button { margin-right: 5px; cursor: pointer; }
</style>
