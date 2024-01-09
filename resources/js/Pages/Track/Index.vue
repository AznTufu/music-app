<template>
  <MusicLayout>
    <template #title>
      <div>Musique</div>
    </template>

    <template #action>
      <Link 
        :href="route('tracks.create')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
      > Créer une musique </Link>
    </template>

    <template #content>
      <div>
        <ul>
          <li
            v-for="(track, i) in tracks"
            :key="track.uuid"
            :class="[i % 2 ? 'text-red-500' : 'text-blue-500']"
          >
            {{ track.title }}
          </li>
        </ul>
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
    tracks: Array,
  },
};
</script>
