<script setup>
import Header from '@/components/Header/HeaderMain.vue'

import Services from '@/components/Services/ServicesMain.vue'
import Prices from '@/components/Prices/PricesMain.vue'
import Advantages from '@/components/Advantages/AdvantagesMain.vue'
import Contacts from '@/components/Contacts/ContactsMain.vue'
</script>

<template>
  <Header />

  <main>
    <Services />

    <Prices />

    <Advantages />

    <hr :class="$style.dividerAdvantagesContacts" />

    <Contacts />
  </main>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

main {
  .dividerAdvantagesContacts {
    background-color: $color-wet-asphalt;
    border: 0;
    height: 5px;
    width: 100%;

    @media screen and (max-width: $desktop-point) {
      height: 3px;
    }
  }
}
</style>
