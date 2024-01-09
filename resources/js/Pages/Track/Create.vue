<template>
  <MusicLayout>
    <template #title> Créer une musique </template>

    <template #action>
      <Link
        :href="route('tracks.index')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
      >
        Retour
      </Link>
    </template>

    <template #content> </template>
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
