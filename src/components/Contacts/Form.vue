<script setup>
import { onMounted, ref } from 'vue'
// import { SMTPClient } from 'emailjs'

import VButton from '@/components/Common/VButton.vue'

const name = ref()
const phone = ref()
const description = ref()

onMounted(() => {
  // const client = new SMTPClient({
  //   user: 'gidrobort',
  //   password: 'Zorka.design.030801',
  //   host: 'smtp.gmail.com',
  //   ssl: true
  // })
  // client.send(
  //   {
  //     text: 'i hope this work',
  //     from: 'zorka.dsgn@gmail.com',
  //     to: 'bogulevsckij@yandex.by',
  //     subject: 'testing emailjs'
  //   },
  //   (err, message) => {
  //     console.log(err || message)
  //   }
  // )
})
</script>

<template>
  <form action="../../php/mail.php" method="post" :class="$style.box">
    <div :class="$style.mainInfo">
      <input v-model="name" name="name" type="text" placeholder="Имя" />
      <input v-model="phone" name="phone" type="text" placeholder="Номер телефона" />
    </div>

    <div :class="$style.description">
      <textarea
        v-model="description"
        name="message"
        cols="30"
        rows="10"
        placeholder="Что нам важно знать о вашем заказе?"
      />
    </div>

    <div>
      <VButton is-submit-button>Перезвоните мне</VButton>
    </div>
  </form>
</template>

<style lang="scss" module>
@import '@/assets/common.scss';

.box {
  display: flex;
  flex-direction: column;
  gap: 30px;
  max-width: 600px;

  .mainInfo {
    display: grid;
    gap: 30px;
    grid-template-columns: 1fr 1fr;

    input {
      border: 2px solid $color-light-grey;
      font-size: 22px;
      padding: 10px 25px 10px;
      height: 60px;
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
