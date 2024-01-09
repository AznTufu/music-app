<template>
  <MusicLayout>
      <template #title>
          <div>Musique</div>
      </template>
      <template #action>
          <Link
              :href="route('tracks.create')"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
          >
              Créer une musique
          </Link>
      </template>
      <template #content>
          <input 
              type="search" 
              name="search" 
              id="search"
              v-model="search"
          >
          Search : {{ search }}
          
          <div class="grid grid-cols-4 gap-4">
              <div
                v-for="track in filteredTracks"
                :key="track.uuid"
                class="max-w-sm rounded overflow-hidden shadow-lg cursor-pointer"
                :class="{'border-2 border-blue-500': currentTrack === track.uuid}"
                @click="play(track)"
              >
              <div class="w-full h-1/2">
              <img class="w-full h-full" :src="`/storage/${track.image}`" />
              </div>
              <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">{{ track.title }}</div>
              <small class="text-gray-700 text-base">
                  {{ track.artist }}
              </small>
              </div>
              </div>
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
  data() {
      return {
          search: "",
          audio: null,
          currentTrack: null,
      };
  },
  computed: {
      filteredTracks() {
          return this.tracks.filter((track) => {
              return track.title.toLowerCase().includes(this.search.toLowerCase());
          });
      },
  },
  methods: {
    play(track) {
      const url = '/storage/' + track.music;

      if(!this.currentTrack) {
        this.audio = new Audio(url);
        this.audio.play();
      } else if (this.currentTrack !== track.uuid) {
        this.audio.pause();
        this.audio.src = url;
        this.audio.play();
      } else if (!this.audio.paused) {
        this.audio.pause();
      } else {
        this.audio.play();
      }

      this.currentTrack = track.uuid;
    }
  },
};
</script>