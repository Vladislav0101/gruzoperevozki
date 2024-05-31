<script setup>
import Header from '@/components/VHeader.vue'

import Preview from '@/components/Preview/PreviewMain.vue'
import Services from '@/components/Services/ServicesMain.vue'
import Prices from '@/components/Prices/PricesMain.vue'
import Advantages from '@/components/Advantages/AdvantagesMain.vue'
import Contacts from '@/components/Contacts/ContactsMain.vue'
</script>

<template>
  <Header />

  <main>
    <Preview />

    <Services />

    <Prices />

    <Advantages />

    <Contacts />
  </main>
</template>

<style lang="scss" scoped>
main {
}
</style>
