<script setup>
import { ref } from 'vue'

import VButton from '@/components/Common/VButton.vue'

const name = ref()
const phone = ref()
const description = ref()

const resetForm = () => {
  name.value = ''
  phone.value = ''
  description.value = ''
}

// Отправка данных на сервер
function send(event, php) {
  console.log('Отправка запроса')
  event.preventDefault ? event.preventDefault() : (event.returnValue = false)
  var req = new XMLHttpRequest()
  req.open('POST', php, true)
  req.onload = function () {
    if (req.status >= 200 && req.status < 400) {
      // Если сообщение отправлено
      alert('Сообщение отправлено. Спасибо, что выбрали именно нас!')
      // Если не удалось связаться с php файлом
    } else {
      alert('Ошибка сервера. Номер: ' + req.status)
    }
  }

  // Если не удалось отправить запрос. Стоит блок на хостинге
  req.onerror = function () {
    alert('Ошибка отправки запроса')
  }
  req.send(new FormData(event.target))

  resetForm()
}
</script>

<template>
  <form
    enctype="multipart/form-data"
    method="post"
    @submit="send($event, '../../php/mail.php')"
    :class="$style.box"
  >
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
      <VButton :class="$style.buttonBox" is-submit-button>Перезвоните мне</VButton>
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

  button {
    font-size: 24px;
  }
}

@media screen and (max-width: $desktop-point) {
  .box {
    gap: 15px;

    .mainInfo {
      gap: 15px;

      input {
        height: 40px;
        padding: 5px 10px;
      }
    }

    .description {
      textarea {
        height: 150px;
        padding: 5px 10px;
      }
    }

    button {
      font-size: 20px;
    }
  }
}

@media screen and (max-width: 1100px) {
  .box {
    .mainInfo input {
      font-size: 16px;
    }

    .description {
      textarea {
        font-size: 16px;
      }
    }

    button {
      font-size: 18px;
    }
  }
}

@media screen and (max-width: $tablet-point) {
  .box {
    .mainInfo {
      grid-template-columns: 1fr;
    }

    .buttonBox {
      width: 100%;
    }
  }
}

@media screen and (max-width: 600px) {
  .box {
    .mainInfo {
      grid-template-columns: 1fr 1fr;

      input {
        font-size: 14px;
      }
    }

    .description {
      textarea {
        font-size: 14px;
      }
    }

    .buttonBox {
      width: max-content;
    }

    button {
      font-size: 16px;
    }
  }
}
</style>
