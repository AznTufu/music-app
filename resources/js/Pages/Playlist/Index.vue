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
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>titre</th>
              <th>nombre de musique</th>
              <th>Crée le</th>
              <th>actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(playlist, i) in playlists"
              :key="playlist.uuid" 
            >
              <td class="py-2"> {{ i + 1 }} </td>
              <td class="py-2"> {{ playlist.title }} </td>
              <td class="py-2"> {{ playlist.tracks_count }} </td>
              <td class="py-2"> {{ $moment(playlist.created_at).format('DD/MM/YYYY hh:mm:ss' ) }} </td>
              <td class="py-2">
                <Link
                  :href="route('playlists.show',{ playlist: playlist})"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all"
                >
                voir
                </Link>
              </td>
            </tr>
          </tbody>
        </table>
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
      playlists: Array,
    },
  };
  </script>
  