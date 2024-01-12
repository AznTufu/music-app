<template>
    <MusicLayout>
      <template #title>
        <div>
            Playlists
        </div>
      </template>
      <template #action>
        <Link
          :href="route('playlists.create')"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
        >
          Créer une playlist
        </Link>
      </template>
      <template #content>
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
  };
  </script>
  