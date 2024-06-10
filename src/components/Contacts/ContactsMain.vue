<script setup>
import VTypography from '@/components/Common/VTypography.vue'
import VUnderline from '@/components/Common/VUnderline.vue'
import Form from '@/components/Contacts/Form.vue'
</script>

<template>
  <div id="contacts" :class="$style.contactsBox">
    <div :class="$style.container">
      <div :class="$style.title">
        <VTypography size="s50" weight="medium">ОСТАЛИСЬ ВОПРОСЫ?</VTypography>
        <VUnderline />
        <VTypography :class="$style.callUs" size="s40" weight="extraLight" color="orange">
          СВЯЖИТЕСЬ С НАМИ
        </VTypography>
      </div>

      <div :class="$style.formBox">
        <Form />

        <div :class="$style.contacts">
          <div :class="$style.phone">
            <a href="tel:+375291234567">
              <VTypography>+375 (29) 123-45-67</VTypography>
            </a>
          </div>
          <div :class="$style.mail">
            <a href="mailto:transports-logistics@mail.ru">
              <VTypography>transports-logistics@mail.ru</VTypography>
            </a>
          </div>

          <img src="../../assets/images/car.svg" alt="delivery" />
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" module>
@import url('@/assets/common.scss');

.contactsBox {
  position: relative;

  .container {
    display: grid;
    gap: 60px;
    padding-top: 80px;
    padding-bottom: 80px;

    .title {
      margin: auto;
      text-align: center;
      width: max-content;

      .callUs {
        margin-top: 15px;
      }
    }

    .formBox {
      display: grid;
      grid-template-columns: 50% 30%;
      justify-content: space-between;
      gap: 30px;

      .contacts {
        img {
          bottom: 0;
          position: absolute;
          right: 0;
          width: 40%;
        }
      }
    }
  }
}
</style>
