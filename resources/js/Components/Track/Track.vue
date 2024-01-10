<template>
  <div
    class="max-w-sm rounded overflow-hidden shadow-lg cursor-pointer"
    :class="{ 'border-2 border-blue-500': active }"
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
    <button
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
      @click="handleClick"
    >
      Lire
    </button>
    <div class="flex w-full justify-between">
      <Link
        :href="route('tracks.edit', { track: track })"
        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-all"
      >
        Modifier
      </Link>
      <Link
        :href="route('tracks.destroy', { track: track })"
        method="delete"
        as="button"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-all"
      >
        Supprimer
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
  components: {
    Link,
  },
  emits: ["played"],
  props: {
    track: Object,
    active: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    handleClick() {
      this.$emit("played", this.track);
    },
  },
};
</script>
