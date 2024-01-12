<template>
  <MusicLayout>
    <template #title> Créer le nom de l'api </template>

    <template #action>
      <Link
        :href="route('apikeys.index')"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
      >
        Retour
      </Link>
    </template>

    <template #content>
      <form @submit.prevent="submit">
        <div class="mb-3">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Nom
          </label>
          <input
              id="name"
              v-model="form.name"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              :class="{ 'border-red-500': form.errors.name }"
              type="text"
              placeholder="Nom"
          >
          <p class="text-red-500 text-xs italic"> {{ form.errors.name }}</p>
        </div>

        <input 
          type="submit" 
          value="Créer la clé Api"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
        >
      </form>
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
        name: "",
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(route("apikeys.store"));
    },
  },
};
</script>
