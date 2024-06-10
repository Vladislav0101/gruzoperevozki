<script setup>
import VButton from '@/components/Common/VButton.vue'
import { ref } from 'vue'

const name = ref()
const phone = ref()
const description = ref()
</script>

<template>
  <div :class="$style.box">
    <div :class="$style.mainInfo">
      <input v-model="name" type="text" placeholder="Имя" />
      <input v-model="phone" type="text" placeholder="Номер телефона" />
    </div>

    <div :class="$style.description">
      <textarea
        v-model="description"
        cols="30"
        rows="10"
        placeholder="Что нам важно знать о вашем заказе?"
      />
    </div>

    <div>
      <VButton>Перезвоните мне</VButton>
    </div>
  </div>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.box {
  display: grid;
  gap: 40px;
  max-width: 600px;

  .mainInfo {
    display: grid;
    gap: 30px;
    grid-template-columns: 1fr 1fr;

    input {
      border: 2px solid $color-light-grey;
      font-size: 22px;
      padding: 10px 25px 10px;
      width: 100%;

      &::placeholder {
        color: $color-wet-asphalt;
      }

      &:focus {
        outline-color: $color-orange;
      }
    }
  }

  .description {
    textarea {
      border: 2px solid $color-light-grey;
      font-size: 22px;
      height: 200px;
      padding: 10px 25px 10px;
      resize: none;
      width: 100%;

      &::placeholder {
        color: $color-wet-asphalt;
      }

      &:focus {
        outline-color: $color-orange;
      }
    }
  }
}
</style>
