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
      <input type="search" name="search" id="search" v-model="search" />
      Search : {{ search }}

      <div class="grid grid-cols-4 gap-4">
        <Track
          v-for="track in filteredTracks"
          :key="track.uuid"
          :track="track"
          :active="currentTrack === track.uuid"
          @played="play"
        />
      </div>
    </template>
  </MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import { Link } from "@inertiajs/vue3";
import Track from "@/Components/Track/Track.vue";

export default {
  components: {
    MusicLayout,
    Link,
    Track,
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
      const url = "/storage/" + track.music;

      if (!this.currentTrack) {
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
      this.audio.addEventListener("ended", () => {
        this.currentTrack = null;
      });
    },
  },
};
</script>
