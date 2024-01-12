<template>
  <MusicLayout>
    <template #title>
      <div>Apikey</div>
    </template>
    <template #action>
      <Link
        :href="route('apikeys.create')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
      >
        Créer une Apikey
      </Link>
    </template>
    <template #content>
      <div>Vos Api:</div>
      <div v-for="apikey in apikeys" :key="apikey.uuid">
        Le nom de l'api est {{ apikey.name }}, clé api : {{ apikey.key }}
        <Link
          :href="route('apikeys.destroy', { apikey: apikey })"
          method="delete"
          as="button"
          class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-all"
        >
          Supprimer
        </Link>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
  components: {
    MusicLayout,
    Link,
  },
  props: {
    apikeys: Array,
  },
};
</script>
