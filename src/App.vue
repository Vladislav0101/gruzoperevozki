<script setup>
import Header from '@/components/VHeader.vue'
import Services from '@/components/Services/ServicesMain.vue'
import Prices from '@/components/Prices/PricesMain.vue'
import Advantages from '@/components/Advantages/AdvantagesMain.vue'
</script>

<template>
  <Header />

  <main>
    <Services />

    <Prices />

    <Advantages />
  </main>
</template>

<style lang="scss" scoped>
main {
}
</style>
