<template>
  <v-data-table
    :headers="headers"
    :items="desserts"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
</template>

<script>
  export default {
    data () {
      return {
        headers: [
          {
            text: 'Başlık',
            align: 'start',
            sortable: false,
            value: 'title',
          },
          { text: 'Tarih', value: 'date' },
          { text: 'Durum', value: 'status' },
        ],
        desserts: [
          {
            title: 'Kitap Okuma ',
            date: new Date(),
            status: 24
          },
          {
            title: 'Ice cream sandwich',
            date: 9.0,
            status: 37
          },
          {
            title: 'Eclair',
            date: 16.0,
            status: 23
          },
          {
            title: 'Cupcake',
            date: 3.7,
            status: 67
          },
        ],
      }
    },
  }
</script>