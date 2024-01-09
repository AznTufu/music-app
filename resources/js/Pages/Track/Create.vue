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

    <template #content>
      <form @submit.prevent="submit">
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Titre
          </label>
          <input
              id="title"
              v-model="form.title"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              :class="{ 'border-red-500': form.errors.title }"
              type="text"
              placeholder="Title"
          >
          <p class="text-red-500 text-xs italic"> {{ form.errors.title }}</p>
        </div>

        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="artist">
            Artiste
          </label>
          <input
              id="artist"
              v-model="form.artist"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              :class="{ 'border-red-500': form.errors.artist }"
              type="text"
              placeholder="Artist"
          >
          <p class="text-red-500 text-xs italic"> {{ form.errors.artist }}</p>
        </div>

        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
            Miniature
          </label>
          <input
              id="image"
              @input="form.image = $event.target.files[0]"
              :class="{ 'border-red-500': form.errors.image }"
              type="file"
          >
          <p class="text-red-500 text-xs italic"> {{ form.errors.image }}</p>
        </div>

        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="music">
            Musique
          </label>
          <input
              id="music"
              @input="form.music = $event.target.files[0]"
              :class="{ 'border-red-500': form.errors.music }"
              type="file"
          >
          <p class="text-red-500 text-xs italic"> {{ form.errors.music }}</p>
        </div>
        
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="display">
            Afficher
          </label>
          <select 
            id="display"
            v-model="form.display"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            :class="{ 'border-red-500': form.errors.display }"
            type="select"
          >
            <option :value="true">Oui</option>
            <option :value="false">Non</option>
          </select>
          <p class="text-red-500 text-xs italic"> {{ form.errors.display }}</p>
        </div>

        <input 
          type="submit" 
          value="Créer la musique"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
        >
      </form>
      {{ form.errors }}
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
  data() {
    return {
      form: this.$inertia.form({
        title: "",
        artist: "",
        image: null,
        music: null,
        display: true,
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(route("tracks.store"));
    },
  },
};
</script>
